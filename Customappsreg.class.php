<?php
// vim: set ai ts=4 sw=4 ft=php:
namespace FreePBX\modules;

class Customappsreg extends \FreePBX_Helpers implements \BMO {

	public function install() {
	}

	public function uninstall() {
	}

	public function backup(){
	}

	public function restore($backup){
	}

	// This is where we handle our POSTs
	public function doConfigPageInit($page) { 
		// Grab the variables we care about.
		$vars = array ("old_custom_dest", "extdisplay", "description", "notes", "destret", "action");
		$postarr = array();
		foreach ($vars as $v) {
			$postarr[$v] = $this->getReq($v);
		}

		// Do we have a dest?
		if (isset($_REQUEST['goto0'])) {
			$postarr['dest'] = $_REQUEST[$_REQUEST['goto0']."0"];
		} else {
			$postarr['dest'] = "";
		}

		if ($page == "customdests") {
			$this->handleDestsPost($postarr);
		} else {
			$this->handleExtenPost($postarr);
		}
	}

	// Why yes, we DO want to generate dialplan, thank you very much!
	public static function myDialplanHooks() {
		return true;
	}

	// This is the wrapper around any custom dests that (may) have a return.
	public function doDialplanHook(&$ext, $engine, $priority) {
		$context = 'customdests';
		$allDests = $this->getAllCustomDests();
		foreach ($allDests as $dest) {
			if (!$dest['destret']) {
				continue;
			}
			print_r($dest);
			$hash = hash('sha256', $dest['extdisplay']);
			$ext->add($context, $hash, '', new \ext_noop('Entering Custom Destination '.$dest['description']));
			$ext->add($context, $hash, '', new \ext_gosub($dest['extdisplay']));
			$ext->add($context, $hash, '', new \ext_noop('Returned from Custom Destination '.$dest['description']));
			$ext->add($context, $hash, '', new \ext_goto($dest['dest']));
		}
	}

	private function handleDestsPost($vars) {
		switch ($vars['action']) {
		case 'delete':
			$this->deleteCustomDest($vars['old_custom_dest']);
			break;
		case 'edit':
			$this->deleteCustomDest($vars['old_custom_dest']);
			$this->addCustomDest($vars['old_custom_dest'], $vars);
			break;
		case 'add':
			$this->addCustomDest($vars['extdisplay'], $vars);
			break;
		default:
			return;
		}
	}

	private function deleteCustomDest($dest) {
		$this->setConfig($dest, false, "dests");
		return true;
	}

	private function addCustomDest($dest, $vars) {
		// Remove any vars that may be hanging around
		unset($vars['action']);
		unset($vars['old_custom-dest']);

		$this->setConfig($dest, $vars, "dests");
	}

	public function getCustomDest($dest) {
		return $this->getConfig($dest, "dests");
	}

	public function getAllCustomDests() {
		$dests = $this->getAll("dests");
		if (!is_array($dests)) {
			return array();
		}
		return $dests;
	}
}


