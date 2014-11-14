<?php

if ( empty($_GET['dongle']) ||
	 empty($_GET['serial']) ||
	 empty($_GET['address']))
{
	echo "ERROR";
	error_log("Dongle/Serial/Channel not set");
	return;
}

$dongle = $_GET['dongle'];
$serial = $_GET['serial'];
$address = $_GET['address'];

echo "Programming TIR with Serial #$serial to address $address using /dev/$dongle.<br />\n";

exec(dirname(__FILE__)."/tirprog/tirprog --device /dev/$dongle --serial $serial --address $address --flashes 4");

?>
