<?php

$DMXDongles = Array();
foreach(scandir("/dev/") as $fileName)
{
	if (preg_match("/^ttyUSB[0-9]+/", $fileName)) {
		$DMXDongles[$fileName] = $fileName;
	}
}

?>

<script>

function ProgramTIR()
{
	var dongle = $('#Dongle').val();
	var serial = $('#Serial').val();
	var address = $('#Channel').val();

	$.get('plugin.php?plugin=fpp-tir-programmer&page=program_tir.php&nopage=1&dongle='+dongle+'&serial='+serial+'&address='+address)
		.success(function() {
			$.jGrowl('Programming sent.');
		})
		.fail(function() {
			DialogError('FPP TIR Programmer', 'Failed to send programming to flood.');
		});
}

$(function() { $('#Dongle').attr("onchange", ""); });


</script>

<div id="tir" class="settings">
<fieldset>
<legend>TIR Destiny Flood Programmer</legend>

<p>
To program your TIR flood, please input the serial number (available on a sticker on the lens) and the address you wish to set as the first address.

Once programmed the flood should respond by flashing green 3 times if successful.

If the programming is unsuccessful, you will see the TIR flash another color.  If the flood is set to a multiple of 3, it should flash red for a failure.

If you have no response at all, please check your DMX dongle, and the wiring to the flood itself.
</p>

<table>
<tr>
<td><label for="Dongle">DMX Dongle:</label></td>
<td><?php PrintSettingSelect("Dongle", "Dongle", 0, 0, "", $DMXDongles); ?></td>
</tr><tr>
<td><label for="Serial">Serial #:</label></td>
<td><input type="text" name="Serial" id="Serial" /></td>
</tr><tr>
<td><label for="Channel">Channel:</label></td>
<td><input type="text" name="Channel" id="Channel" /></td>
</tr>
</table>

<p>
<input type="submit" class="buttons" value="Program" onClick="ProgramTIR();" />
</p>

</fieldset>
</div>

<br />
