<?php
// vim: set ai ts=4 sw=4 ft=php:
namespace FreePBX\modules;

class Customappsreg extends \FreePBX_Helpers implements \BMO {

	private $allDests = false;

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
			//$this->handleExtenPost($postarr);
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
			$fakedest = "cd".$dest['index'];
			$ext->add($context, $fakedest, '', new \ext_noop('Entering Custom Destination '.$dest['description']));
			$ext->add($context, $fakedest, '', new \ext_gosub($dest['extdisplay']));
			$ext->add($context, $fakedest, '', new \ext_noop('Returned from Custom Destination '.$dest['description']));
			$ext->add($context, $fakedest, '', new \ext_goto($dest['dest']));
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
		if ($this->allDests === false) {
			$this->allDests = $this->getAll("dests");
			if (!is_array($this->allDests)) {
				$this->allDests = array();
			}
			// Add an add-hoc index to it. This is kinda hacky.
			$i = 0;
			foreach ($this->allDests as &$d) {
				$d['index'] = $i++;
			}
		}
		return $this->allDests;
	}

	public function getUnknownDests() {

		$results = array();

		// Is always an array
		$all_probs = framework_list_problem_destinations();

		foreach ($all_probs as $prob) {
			if ($problem['status'] != "CUSTOM") {
				continue;
			}

			if (substr($problem['dest'], 0, 11) == "customdests") {
				// Assume we know what we're doing
				continue;
			}

			// Otherwise
			$results[$problem['dest']] = true;
		}
		return array_keys($results);
	}

}


