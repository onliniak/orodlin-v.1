<!DOCTYPE html>
<html lang="pl-PL">

<head>
	<meta charset="UTF-8">
	<title>{$Gamename} :: {$Pagetitle}</title>
	<link type="text/css" rel="Stylesheet" href="https://cdn.jsdelivr.net/gh/skeleton-framework/skeleton-framework/dist/skeleton.min.css" />
	<link type="text/css" rel="Stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css" />
	<link type="text/css" rel="Stylesheet" href="css/custom.css" />
	<link type="text/css" rel="Stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/css-social-buttons/1.3.0/css/zocial.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap&subset=latin-ext" rel="stylesheet">
	<link rel="alternate" type="application/xml" title="RSS" href="{$Gameadress}/rss.php" />
</head>

<body class="container">
	{strip}
	<div class="row">
		<div class="twelve columns">
			<h1>{$Gamename} :: {$Pagetitle}</h1>
			<img class="u-max-full-width" src="https://dummyimage.com/1980x800/000/fff" alt="Top Image" />
		</div>
	</div>
	<div class="row">
		<div class="three columns">
			<ul id="menu">
				<li><a href="index.php">{$smarty.const.WELCOME}</a></li>
				<li><a href="register.php">{$smarty.const.REGISTER}</a></li>
				<li><a href="index.php?step=rules">{$smarty.const.RULES}</a></li>
				<li><a href="faq.php">{$smarty.const.FAQ}</a></li>
				<li><a href="team.php">{$smarty.const.TEAM}</a></li>
				<li><a class="forum" href="http://luunube.ardoon.ga/">{$smarty.const.FORUMS}</a></li>
				<li><a href="promo.php">{$smarty.const.PROMO}</a></li>
				<li><a href="donate.php">{$smarty.const.DONATE}</a></li>
			</ul>
			<form method="post" id="form_login" action="updates.php">
				<i class="mdi mdi-email" width="25" height="25"></i>
				{$smarty.const.EMAIL}: <input type="text" name="email" size="17" /><br />
				<i class="mdi mdi-key" width="25" height="25"></i>
				{$smarty.const.PASSWORD}: <input type="password" name="pass" size="17" /><br /><br />
				<input type="submit" value="{$smarty.const.LOGIN}" /><br /><br />
				<!-- Zapożyczone z Faerunu -->
				<span class="testowe"
					onclick="document.getElementById('form_login').email.value = 'kozot@mailsoul.com'; document.getElementById('form_login').pass.value = 'K0l0r0w3kRówki'; document.getElementById('form_login').autologin.checked = false; document.getElementById('form_login').submit();">
					-&gt; Konto testowe</span>
				<!--<fieldset>
					<legend>Or use another service</legend>

					<a class="zocial github" href="social.php">Zaloguj się z GitHubem</a><br />
				</fieldset>-->
			</form>
			<div class="lostpasswd">
				<a href="index.php?step=lostpasswd">{$smarty.const.LOST_PASSWORD}</a>
			</div>
			<!-- <div class="imghead"><img src="" alt="img_Statystyki" width="91" height="19" /></div> -->
			<i class="mdi mdi-clock-outline" width="25" height="25"></i>
			{$smarty.const.CURRENT_TIME}: <b>{$Time}</b><br /><br />
			{$smarty.const.VISIT}: <span class="badge">{$Logcount}</span><br />
			{$smarty.const.DAILY}: <span class="badge">{$Logcountday}</span><br /><br />
			{$smarty.const.IN_GAME}: <b><span class="badge">{$Online}</span></b><br />
			{$smarty.const.ACTIVE}: <b><span class="badge">{$Players}</span></b><br />
			{$smarty.const.PLAYERS_EVER}: <b><span class="badge">{$Usersever}</span></b><br />
			<br />
			{$smarty.const.LAST_REGISTERED_PRE} <b>{$LastName}</b> <span class="badge">{$LastID}</span>.<br />
			<br />{$smarty.const.RECORD}: <strong class="badge">{$numRecord}</strong> {$smarty.const.DAY} {$When1} {$smarty.const.HOUR} {$When2}.
			<div class="button"><a href="rss.php" title="RSS 2.0"><img src="" alt="RSS 2.0" /></a></div>
		</div>
		{/strip}