{strip}
<div class="six columns">
	<a><img class="u-max-full-width" src="images/locations/grid.jpg" /></a>
	{if $Action == "" && $Step == "" && $Quest == 'N'}
	<br />{$Labinfo} <a href="grid.php?action=explore">{$Ayes}.</a>
	{/if}

	{if ($Chance == "1" || $Chance == "2" || $Chance == "4" || $Chance == "5" || $Chance == "7" || $Chance == "8" || $Chance == "9" || $Chance == 11) && $Quest == 'N'}
	<br />{$Action2}
	{/if}

	{if $Chance == "3" && $Quest == 'N'}
	<br />{$Action2} <b>{$Goldgain}</b> {$Action3}
	{/if}

	{if $Chance == "6" && $Quest == 'N'}
	<br />{$Action2} <b>{$Mithgain}</b> {$Action3}
	{/if}

	{if $Action == "explore" && ($Chance
	< 10 || $Chance==11) && $Quest=='N' } <br /><br />... <a href="grid.php?action=explore">{$Aexp}</a> {$Tnext} {$Energyleft} {$Enpts}.)
	{/if}

	{/strip}