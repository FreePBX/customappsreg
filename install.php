<?php
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }

// Check for old Destinations table
$db = \FreePBX::Database();

$sql = "SELECT * FROM `custom_destinations` LIMIT 1";
try {
	$res = $db->query($sql);
	// If we made it here, the table exists, and needs to be converted.
	\FreePBX::Customappsreg()->convertDestDatabase();
} catch (Exception $e) {
	if ($e->getCode() != "42S02") { // 42S02 == table doesn't exist. Which is correct
		// We don't know what it is, let someone else deal with it.
		throw $e;
	}
}


