<?php 
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }
$allDests = \FreePBX::Customappsreg()->getAllCustomDests();
?> 

<div class="rnav"><ul>
<li><a href="config.php?display=customdests&action=addnew"><?php echo _('Add Custom Destination'); ?></a></li>

<?php 
foreach ($allDests as $row) {
	$descr = $row['description'].' ('.$row['extdisplay'].')';
	echo "<li><a href='config.php?display=customdests&extdisplay=".$row['extdisplay']."'>$descr</a></li>";
}
?>
</ul></div>

<?php

if (isset($_REQUEST['extdisplay']) && isset($allDests[$_REQUEST['extdisplay']])) {
	$current = $allDests[$_REQUEST['extdisplay']];
	$usage_list = framework_display_destination_usage($current['extdisplay']);
} else {
	$current = array("extdisplay" => "", "description" => "", "notes" => "", "destret" => false);
	$usage_list = false;
}

$dest    = $current['extdisplay'];
$desc    = $current['description'];
$notes   = $current['notes'];
$destret = $current['destret'];

if ($dest) {
	echo "<h2>"._("Edit: ")."$desc</h2>\n";
} else {
	echo "<h2>"._("Add Custom Destination")."</h2>\n";
}

$helptext = _("Custom Destinations allows you to register your custom destinations that point to custom dialplans and will also 'publish' these destinations as available destinations to other modules. This is an advanced feature and should only be used by knowledgeable users. If you are getting warnings or errors in the notification panel about CUSTOM destinations that are correct, you should include them here. The 'Unknown Destinations' chooser will allow you to choose and insert any such destinations that the registry is not aware of into the Custom Destination field.");
echo $helptext;
?>

<form name="editCustomDest" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<input type="hidden" name="display" value="customdests">
<input type="hidden" name="old_custom_dest" value="<?php echo $dest; ?>">
<table>
  <tr>
    <td colspan="2"><h5><?php  echo ($dest ? _("Edit Custom Destination") : _("Add Custom Destination")) ?><hr></h5></td>
  </tr>
  <tr>
    <td>
      <a href="#" class="info"><?php echo _("Custom Destination")?>:
	<span>
	<?php 
	echo _("This is the Custom Destination to be published. It should be formatted exactly as you would put it in a goto statement, with context, exten, priority all included. An example might look like:<br />mycustom-app,s,1");
	if ($usage_list) {
		echo "<br />"._("READONLY WARNING: Because this destination is being used by other module objects it can not be edited. You must remove those dependencies in order to edit this destination, or create a new destination to use");
	}
	?>
	</span>
      </a>
    </td>
<?php if ($usage_list) { ?>
    <td><b><?php echo htmlentities($custom_dest); ?></b></td>
<?php } else { ?>
    <td><input size="30" type="text" name="extdisplay" id="extdisplay" value="<?php echo $dest; ?>"></td>
<?php } ?>
  </tr>
<?php if (!$usage_list) { ?>
  <tr>
    <td>
      <a href=# class="info"><?php echo _("Destination Quick Pick")?>
	<span>
	<?php echo _("Choose un-identified destinations on your system to add to the Custom Destination Registry. This will insert the chosen entry into the Custom Destination box above.")?>
	</span>
      </a>
    </td>
    <td>
      <select onChange="insertDest();" id="insdest">
	<option value=""><?php echo _("(pick destination)")?></option>
	<?php
		$results = customappsreg_customdests_getunknown();
		foreach ($results as $thisdest) {
			echo "<option value='$thisdest'>$thisdest</option>\n";
		}
	?>
      </select>
    </td>
  </tr>
<?php }  // endif (!$usage_list) ?>

  <tr>
    <td>
      <a href="#" class="info"><?php echo _("Description")?>:<span><?php echo _("Brief Description that will be published to modules when showing destinations. Example: My Weather App")?></span></a>
    </td>
    <td><input size="30" type="text" name="description" value="<?php  echo $desc; ?>"></td>
  </tr>

  <tr>
    <td valign="top"><a href="#" class="info"><?php echo _("Notes")?>:<span><?php echo _("More detailed notes about this destination to help document it. This field is not used elsewhere.")?></span></a></td>
    <td><textarea name="notes" cols="23" rows="6"><?php echo $notes; ?></textarea></td> 
  </tr>

  <tr>
    <td valign="top"><a href="#" class="info"><?php echo _("Return")?>:<span><?php echo _("Does this destination end with 'Return'? If so, you can then select a subsequent destination after this call flow is complete.")?></span></a></td>
<?php if ($current['destret']) {
	$checked = "checked";
	$style = "";
} else {
	$checked = "";
	$style = "display: none";
} ?>
    <td><input type="checkbox" name="destret" id="destret" <?php echo $checked; ?>></td>
  </tr>

  <tr style='<?php echo $style; ?>' id='hasreturn'>
    <td colspan=2><?php echo drawselects($current['dest'],0,false,false); ?></td>
  </tr>

  <tr>
    <td colspan="2"><br>
    <?php if ($dest) { ?>
      <button type="submit" name="action" value="edit"><?php echo _("Submit Changes"); ?></button>
      <button type="submit" name="action" value="delete"><?php echo _("Delete"); ?></button>
    <?php } else { ?>
      <button type="submit" name="action" value="add"><?php echo _("Submit Changes")?></button>
    <?php } ?>
    </td>		
  </tr>
<?php if ($dest && $usage_list) { ?>
  <tr>
    <td colspan="2">
      <a href="#" class="info"><?php echo $usage_list['text']?>:<span><?php echo $usage_list['tooltip']?></span></a>
    </td>
  </tr>
<?php } ?>
</table>

</form>
			
<script language="javascript">
<!--

function insertDest() {

	dest = document.getElementById('insdest').value;
	customDest=document.getElementById('extdisplay');

	if (dest != '') {
		customDest.value = dest;
	}

	// reset element
	document.getElementById('insdest').value = '';
}

function checkCustomDest(theForm) {

	var msgInvalidCustomDest = "<?php echo _('Invalid Destination, must not be blank, must be formatted as: context,exten,pri'); ?>";
	var msgInvalidDescription = "<?php echo _('Invalid description specified, must not be blank'); ?>";

	// Make sure the custom dest is in the form "context,exten,pri"
	var re = /[^,]+,[^,]+,[^,]+/;

	// form validation
	defaultEmptyOK = false;	

	if (isEmpty(theForm.extdisplay.value) || !re.test(theForm.extdisplay.value)) {
		return warnInvalid(theForm.extdisplay, msgInvalidCustomDest);
	}
	if (isEmpty(theForm.description.value)) {
		return warnInvalid(theForm.description, msgInvalidDescription);
	}

	return true;
}
//-->
</script>
