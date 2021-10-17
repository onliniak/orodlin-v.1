{strip}
<!DOCTYPE html>
<html lang="pl-PL">

<head>
	<meta charset="UTF-8">
	<title>{$Gamename} :: {$Title}</title>
	<link type="text/css" rel="Stylesheet" href="https://cdn.jsdelivr.net/gh/skeleton-framework/skeleton-framework/dist/skeleton.min.css" />
	<link type="text/css" rel="Stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css" />
	<link type="text/css" rel="Stylesheet" href="css/custom.css" />
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap&subset=latin-ext" rel="stylesheet">
	{if $Title=='Strażnica'}
	<link type="text/css" rel="stylesheet" href="css/javascript/tabs.css" />
	<link type="text/css" rel="stylesheet" href="css/javascript/slider.css" />
	<link type="text/css" rel="stylesheet" href="css/javascript/dragdrop.css" />
	{/if}
	<link type="image/png" rel="shortcut icon" href="images/misc/favicon.ico" />
	<script src="javascript/lib/jquery.pack.js" type="text/javascript"></script>
	{if $Title=='Strażnica'}
	<script src="javascript/lib/jquery_plugins/jquery.history_remote.pack.js" type="text/javascript"></script>
	<script src="javascript/lib/jquery_plugins/jquery.tabs.pack.js" type="text/javascript"></script>
	<script src="javascript/lib/jquery_plugins/interface.js" type="text/javascript"></script>
	<script src="javascript/lib/jquery_plugins/jquery.form.js" type="text/javascript"></script>
	<script src="javascript/outposts.js" type="text/javascript"></script>
	<script src="javascript/tabs.js" type="text/javascript"></script>
	{/if}
	{if $Title=='Wiadomości' || $Title=='Miejskie Plotki' || $Title=='Redakcja gazety'}
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tail.writer@0.4.1/js/tail.writer-bbcode.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tail.writer@0.4.1/langs/tail.writer-pl.js"></script>
	<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tail.writer@0.4.1/css/tail.writer-white.min.css" />
	{/if}
	{if $Title=='Wiadomości'}
	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function() {
			tail.writer("textarea", {
				"width": "420px"
			});
		});
	</script>
	{/if}
	{if $Title=='Miejskie Plotki' || $Title=='Redakcja gazety'}
	<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function() {
			tail.writer("textarea", {
				/* Your Options */
			});
		});
	</script>
	{/if}

	<meta http-equiv="Content-Type" content="text/html; charset={$Charset}" />
	<!--[if lt IE 7.]>
<script defer type="text/javascript" src="javascript/pngfix.js"></script>
<![endif]-->
	<script type="text/javascript">
		{
			literal
		}

		function showHideImage(id, imgSource) {
			img = document.getElementById(id);
			img.src = (img.src.match(imgSource) == null) ? imgSource : '';
		} {
			/literal}
	</script>
</head>

<body class="container" onload="window.status='{$Gamename}';
    {if $Title=='Tawerna'}document.getElementById('msg').focus();{/if}
    {if $Title=='Strażnica'}$('#tabcontainer').tabs({ldelim}fxFade: true, fxSpeed: 'fast', remote: true{rdelim});{/if}">
	<div class="row">
		<div class="three columns">
			<div id="top"></div>
			{if $Stephead != "new"}
			<div id="leftbar">
				<div class="topmenu"></div>
				<div class="submenu">
					<div id="stats">
						{if $Graphstyle == "Y" && $Graphic == "default"}
						<!--<div class="imghead"><img src="" alt="img_Statystyki" width="91" height="19" /></div>-->{else}<div class="txtheader">{$smarty.const.N_STATISTICS}</div>{/if}
						<center><b>{$Name}</b>
							<span class="badge">{$Id}</span>
						</center><br />
						{if $Graphstyle == "Y" && $Avatar != ''}
						<a href="account.php?view=avatar">
							<img src="{$Avatar}" alt="" width="{$A_width}px" height="{$A_height}px" /><br />
						</a>
						{/if}
						{if $Graphstyle == "Y"}<i class="mdi mdi-arch" width="25" height="25"></i>{/if}<b>{$smarty.const.LEVEL}:</b> {$Level} <br />
						{if $Graphstyle == "Y"}<i class="mdi mdi-chevron-triple-up" width="25" height="25"></i>{/if}<b>{$smarty.const.EXP_PTS}:</b> {$Exp}/{$Expneed} ({$Percent}%) <br />
						{if $Graphbar == "Y"}
						<img src="includes/graphbar.php?statusbar=exp" height="4" width="{$Expper}%" alt="{$smarty.const.EXP_PTS}" title="{$smarty.const.EXP_PTS}: {$Percent}%"
							style="margin-top: 2px; margin-bottom: 2px; border-style: outset; border-right: 0px;" border="0" /><img src="includes/graphbar2.php" height="4" width="{$Vial}%" alt="img_{$smarty.const.EXP_PTS}"
							title="{$smarty.const.EXP_PTS}: {$Percent}%" style="margin-top: 2px; margin-bottom: 2px; border-style: outset; border-left: 0px;" border="0" /><br />
						{/if}
						<div class="menuleft">{if $Graphstyle == "Y"}<i class="mdi mdi-heart-circle-outline" width="25" height="25"></i>{/if}<b>{$smarty.const.HEALTH_PTS}:</b> {$Health}/{$Maxhealth}</div>
						{if $Graphbar == "Y"}
						<img src="includes/graphbar.php?statusbar=health" height="4" width="{$Barsize}%" alt="{$smarty.const.HEALTH_PTS}" title="{$smarty.const.HEALTH_PTS}: {$Healthper}%"
							style="margin-top: 2px; margin-bottom: 2px; border-style: outset; border-right: 0px;" border="0" /><img src="includes/graphbar2.php" height="4" width="{$Vial2}%" alt="{$smarty.const.HEALTH_PTS}"
							title="{$smarty.const.HEALTH_PTS}: {$Healthper}%" style="margin-top: 2px; margin-bottom: 2px; border-style: outset; border-left: 0px;" border="0" /><br />
						{/if}
						{if $Spells !=''}
						<div class="menuleft">{if $Graphstyle == "Y"}✨{/if}<b>{$smarty.const.MANA_PTS}:</b> {$Mana} </div>
						{if $Graphbar == "Y"}
						<img src="includes/graphbar.php?statusbar=mana" height="4" width="{$Barsize2}%" alt="{$smarty.const.MANA_PTS}" title="{$smarty.const.MANA_PTS}: {$Manaper}%"
							style="margin-top: 2px; margin-bottom: 2px; border-style: outset; border-right: 0px;" border="0" /><img src="includes/graphbar2.php" height="4" width="{$Vial3}%" alt="{$smarty.const.MANA_PTS}"
							title="{$smarty.const.MANA_PTS}: {$Manaper}%" style="margin-top: 2px; margin-bottom: 2px; border-style: outset; border-left: 0px;" border="0" /><br />
						{/if}
						{/if}

						{if $Graphstyle == "Y"}<i class="mdi mdi-sleep" width="25" height="25"></i>{/if}<b>{$smarty.const.ENERGY_PTS}:</b> {$Energy}/{$Maxenergy}/{$Maxenergy*63}<br />
						{if $Graphstyle == "Y"}<i class="mdi mdi-sack" width="25" height="25"></i>{/if}<b>{$smarty.const.GOLD_IN_HAND}:</b> {$Gold} <br />
						{if $Graphstyle == "Y"}<i class="mdi mdi-safe" width="25" height="25"></i>{/if}<b>{$smarty.const.GOLD_IN_BANK}:</b> {$Bank} <br /> </div>
				</div>
				<div class="bottommenu"></div>
				<div class="topmenu"></div>
				<div class="submenu">
					<div id="navigation">
						{if $Graphstyle == "Y" && $Graphic == "default"}
						<!--<div class="imghead"><img src="" alt="img_Nawigacja" width="95" height="21" /></div>-->{else}<div class="txtheader">{$smarty.const.NAVIGATION}</div>{/if}
						<ul>
							<li><a href="stats.php">{$smarty.const.N_STATISTICS}</a></li>
							<li><a href="zloto.php">{$smarty.const.N_ITEMS}</a></li>
							<li><a href="equip.php">{$smarty.const.N_EQUIPMENT}</a></li>
							{$Spells}
						</ul>
						<ul>
							{$Location}
							{$Lbank}
							{$Battle}
							{$Hospital}
							{$Tribe}
						</ul>
						<ul>
							<li><a href="log.php">{$smarty.const.N_LOG}</a> <span class="badge">{$Unreadlog}</span> </li>
							<li><a href="mail.php">{$smarty.const.N_POST}</a> <span class="badge">{$Unreadmail}</span> </li>
							<li><a href="notatnik.php">{$smarty.const.N_NOTES}</a></li>
							<li><a href="forums.php?view=categories">{$smarty.const.N_FORUMS}</a></li>
							{$Tforum}
							<li><a href="chat.php?room=izba">{$smarty.const.N_INN_I}</a> <span class="badge">{$PlayersI}</span></li>
							<li><a href="chat.php?room=piwnica">{$smarty.const.N_INN_P}</a> <span class="badge">{$PlayersP}</span></li>
						</ul>
						{if isset ($ArrLinks[0])}
						<ul>
							{foreach from=$ArrLinks item=i}
							<li><a href="{$i.file}">{$i.text}</a></li>
							{/foreach}
						</ul>
						{/if}
						<ul>
							<li><a target="blank" href="faq.php">{$smarty.const.FAQ}</a></li>
							<li><a href="help.php">{$smarty.const.N_HELP}</a></li>
							<li><a href="team.php?int=1">{$smarty.const.TEAM}</a></li>
							<li><a href="map.php">{$smarty.const.N_MAP}</a></li>
						</ul>
						<ul>
							<li><a href="account.php">{$smarty.const.N_OPTIONS}</a></li>
							<li><a href="logout.php?did={$Id}">{$smarty.const.N_LOGOUT}</a></li>
						</ul>
						{$Special}
					</div>
				</div>
				<div class="bottommenu"></div>
			</div>
			<div id="content">
				{/if}
				{if $Stephead == "new"}
				<div id="newspaper">
					{/if}
				</div>
			</div>
			<div class="background_me">
				{$Title} <a class="help" href="help.php?page={$FileName}"><i class="mdi mdi-help-circle" width="25" height="25"></i></a>
			</div>
			{/strip}