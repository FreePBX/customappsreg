<?php
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }
$ce = \FreePBX::Customappsreg();
$helptext = _("Custom Extensions provides you with a facility to register any custom extensions or feature codes that you have created in a custom file and FreePBX doesn't otherwise know about them. This allows the Extension Registry to be aware of your own extensions so that it can detect conflicts or report back information about your custom extensions to other modules that may make use of the information. You should not put extensions that you create in the Misc Apps Module as those are not custom.");
$view = isset($_REQUEST['view'])?$_REQUEST['view']:'';
switch ($view) {
	case 'form':
		$content = load_view(__DIR__.'/views/customextens/form.php',array('ce'=> $ce));
		$bootnav = load_view(__DIR__.'/views/customextens/bootnav.php', array('view' => $view));
	break;

	default:
		$content = load_view(__DIR__.'/views/customextens/grid.php');
		$bootnav = '';
	break;
}
?>
<div class="container-fluid">
	<h1><?php echo _('Custom Destinations')?></h1>
	<div class="well well-info">
		<?php echo $helptext?>
	</div>
	<div class = "display full-border">
		<div class="row">
			<div class="col-sm-9">
				<div class="fpbx-container">
					<div class="display full-border">
						<?php echo $content ?>
					</div>
				</div>
			</div>
			<?php echo $bootnav ?>
		</div>
	</div>
</div>
