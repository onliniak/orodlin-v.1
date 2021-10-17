{strip}
{if $Stephead != "new"}
</div>
<div class="three columns">
	<div class="topmenu"></div>
	<div class="submenu">
		{if $Graphstyle == 'Y' && $Graphic == 'default'}
		<div class="imghead">
			<!--<img src="" alt="img_Statystyki Królestwa" width="95" height="37" />-->
		</div>
		{else}<div class="txtheader">{$smarty.const.STATISTICS}</div>
		{/if}
		<div class="menuleft">
			{if $Graphstyle == 'Y'}
			<i class="mdi mdi-clock" width="25" height="25"></i>
			{/if}
			<b>{$Time}</b>
		</div>
		<div class="menuleft">
			{if $Graphstyle == 'Y'}
			<i class="mdi mdi-calendar-today" width="25" height="25"></i>
			{/if}
			<b>{$Tday}</b> {$smarty.const.SDAY} <b>{$Tage}</b> {$smarty.const.SAGE}.</div>
		<div class="menuleft">
			{if $Graphstyle == 'Y'}
			<i class="mdi mdi-update" width="25" height="25"></i>
			{/if}
			{$smarty.const.RTIME}: <b>{$Thours} {$Tminutes}</b>.
		</div>
		<div class="menuleft">
			{if $Graphstyle == 'Y'}
			<i class="mdi mdi-account-supervisor-circle" width="25" height="25"></i>
			{/if}
			{$smarty.const.REGISTERED_PLAYERS}: <b class="badge">{$Players}</b>
		</div>
		<div class="menuleft">
			{if $Graphstyle == 'Y'}
			<i class="mdi account-circle" width="25" height="25"></i>
			{/if}
			{$smarty.const.PLAYERS_ONLINE}: <span class="badge">{$tela}</span> ({$smarty.const.RECORD}: {$numRecord})
		</div>
	</div>
	<div class="submenu">
		{if $Graphstyle == 'Y' && $Graphic == 'default'}
		<!--<div class="imghead"><img src="" alt="img_Statystyki gry" width="125" height="24" /></div>-->
		{else}
		<div class="txtheader">{$smarty.const.F_STATISTICS}</div>
		{/if}
		{$smarty.const.PLAYERS_LIST}:<br /><br />

		<ul>
			{foreach $foo as $i}
			<li id="podstawowy_opis">
				<!--https://blog.piotrnalepa.pl/2009/06/25/css-dymki-z-podpowiedziami/-->
				<a id="po_najechaniu" href="#">{$i.user}<span class="background_me">
						ID: {$i.id} <br />
						{$i.rank} <br />
						{$i.avatar} <br />
					</span></a> <br />
				<em id="opis_ukryj">{$i.opis}</em>
			</li>
			{/foreach}
		</ul>
		<button onclick="myFunction()">{$smarty.const.SHOW_OPIS}</button>
	</div> <br />
	{if $LastPollMenu != ''} {$smarty.const.LAST_POLL_MENU}<br />
	<a href="polls.php">{$LastPollMenu}</a> <br /><br />
	{/if}
	{$smarty.const.LAST_REGISTERED_PRE} <a href="view.php?view={$LastID}">{$LastName}</a> ({$LastID}).
</div>
</div>
{/if}
</div>
<footer class="twelve columns">
	{$smarty.const.LOADING_TIME}: {$Duration} | {$smarty.const.GZIP_COMP}: {$Compress} | {$smarty.const.PM_TIME} PHP/MySQL: {$Duration-$Sqltime}/{$Sqltime} | {$smarty.const.QUERIES}: {$Numquery} | {$smarty.const.CPU}: {$CPU}
	<br /><a href="http://orodlin.pl">Orodlin</a> Engine, &copy; 2007-2009 <a href="install/authors.txt">{$smarty.const.TEAM}</a> based on <a href="http://vallheru.sourceforge.net/">Vallheru</a>.
	<!--          (C) 2007 Orodlin Team                                         -->
	<!--           game based on Vallheru Engine                                -->

	{/strip}<br /><br />
	<script>
		function myFunction() {
			var x = document.getElementById("opis_ukryj");
			if (x.style.display === "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}
		}
	</script>
</footer>
</body>

</html>