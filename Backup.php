<?php
namespace FreePBX\modules\Customappsreg;
use FreePBX\modules\Backup as Base;
class Backup Extends Base\BackupBase{
  public function runBackup($id,$transaction){
    $configs = [
        'extensions' => $this->FreePBX->Customappsreg->getAllCustomExtens(),
        'destinations' => $this->FreePBX->Customappsreg->getAll('dests'),
    ];
    $this->addConfigs($configs);
  }
}