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

	public function processLegacy($pdo, $data, $tables, $unknownTables, $tmpfiledir){
		$tables = array_flip($tables + $unknownTables);
		if (!isset($tables['custom_extensions'])) {
			return $this;
		}
		$ca = $this->FreePBX->Customappsreg;
		$ca->setDatabase($pdo);
		$configs = [
			'extensions' => $ca->getAllCustomExtens(),
			'destinations' => $ca->getAll('dests'),
		];
		$ca->resetDatabase();
		foreach ($configs['extensions'] as $extension) {
			$ca->editCustomExten($extension['custom_exten'], $extension['custom_exten'], $extension['description'], $extension['notes']);
		}
		$this->transformLegacyKV($pdo, 'customappsreg', $this->FreePBX)
		->transformNamespacedKV($pdo, 'customappsreg', $this->FreePBX);
	}
}
