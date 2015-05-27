<?php
$items = array();
switch ($view) {
  case 'form':
    $items[] = array('url' => '?display=customdests', 'label' => '<i class="fa fa-list"></i> '._("List Destinations"));
    if(isset($_REQUEST['destid'])){
      $items[] = array('url' => '?display=customdests&view=form', 'label' => '<i class="fa fa-plus"></i> '._("Add Destination"));
    }
  break;

  default:
    # code...
  break;
}

if(!empty($items)){
  echo '<div class="col-sm-3 hidden-xs bootnav">
          <div class="list-group">';
  foreach($items as $item){
    echo '<a href="'.$item['url'].'" class="list-group-item">'.$item['label'].'</a>';
  }
  echo '  </div>
  </div>';
}
