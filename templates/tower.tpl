{strip}
<div class="six columns">
	{if $Location == 'Altara'}
	<a><img class="u-max-full-width" src="images/locations/zegar-o-zlotych-cyfrach.jpg" /></a>
	{/if}
	{if $Location == 'Ardulith'}
	<a><img class="u-max-full-width" src="images/locations/tower.jpg" /></a>
	{/if}
	<br />{$Text1} <b>{$Tday} {$Tday2} {$Tage}</b> {$Tage2} <b>{$Time}</b>.<br />
	{$Text2} <b>{$Thours} {$Tminutes}</b>.<br />
	{$Text3}.<br /><br />
	{$Text4}.
	{/strip}