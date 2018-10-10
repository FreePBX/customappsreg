<?php
namespace FreePBX\modules\Customappsreg;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
  public function runRestore($jobid){
    $configs = reset($this->getConfigs());
    $this->FreePBX->Customappsreg->setMultiConfig($configs['destinations'], 'dests');
    foreach($configs['extensions'] as $extension){
        $this->FreePBX->Customappsreg->editCustomExten($extension['custom_exten'], $extension['custom_exten'], $extension['description'], $extension['notes']);
    }
  }
}