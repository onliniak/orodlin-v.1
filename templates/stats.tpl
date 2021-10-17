{strip}
<div class="nine columns">{$Statsinfo}
	<br /><br />
	<img class="u-max-full-width" src="{$Avatar}" />
</div>
{if $Action == "gender"}
<form method="post" action="stats.php?action=gender&amp;step=gender">
	<select name="gender">
		<option value="M">{$Genderm}</option>
		<option value="F">{$Genderf}</option>
	</select><br />
	<input type="submit" value="{$Aselect}" /></form>
{/if}
<div class="six columns">
	<center><b>{$Tstats}</b></center>
	<div class="row">
		<div class="one-half column">
			<b>{$Tap}: </b>
			{$Ap}
			<b>{$Trace}: </b>{$Race}
			<b>{$Tclass}: </b>
			{$Clas} <b>{$Tdeity}: </b>
			{$Deity}
			<b>{$Tgender}: </b>
			{$Gender}
			<b>{$Tmana}: </b>
			{$Mana} {$Rest}
			<b>{$Tpw}: </b>
			{$PW}
		</div>
		<div class="one-half column">
			{section name=stats1 loop=$Tstats2}
			<b>{$Tstats2[stats1]}: </b>
			{$Stats[stats1]} {$Curstats[stats1]}
			{/section}
			{$Crime} <br />
			<b><a href="fightlogs.php">{$Tfights}</a>: </b>
			{$Total}
			<b>{$Tlast}: </b>
			{$Lastkilled}
			<b>{$Tlast2}: </b>
			{$Lastkilledby}

			{if $Ant_d}
			{$Ant_d}
			{/if}
			{if $Ant_n}
			{$Ant_n}
			{/if}

			{if $Ant_i}
			{$Ant_i}
			{/if}

			{if $Resurect}
			{$Resurect}
			{/if}
			{if $Blessfor}
			<b>{$Blessfor} </b>
			{$Pray} <b>{$Blessval}</b>
			{/if}
		</div>

		<center><b>{$Tability}</b></center>
		<div class="one-half column">

			<b>{$Tsmith}: </b>
			{$Smith}
			<b>{$Talchemy}: </b>
			{$Alchemy}
			<b>{$Tlumber}: </b>
			{$Fletcher}
			<b>{$Tjeweller}: </b>
			{$Jeweller}
			<b>{$Thutnictwo}: </b>
			{$Hutnictwo}
			<b>{$Tmining}: </b>
			{$Mining}
			<b>{$Tlumberjack}: </b>
			{$Lumberjack}
			<b>{$Therbalist}: </b>
			{$Herbalist}
			<b>{$Tbreeding}: </b>
			{$Breeding}
		</div>
		<div class="one-half column">
			<b>{$Tfight}: </b>
			{$Attack}
			<b>{$Tshoot}: </b>
			{$Shoot}
			<b>{$Tcast}: </b>
			{$Magic}
			<b>{$Tdodge}: </b>
			{$Miss}
			<b>{$Tleader}: </b>
			{$Leadership}
		</div>
		<div class="column">
			<center><b>{$Tinfo}</b></center>
			<b>{$Trank}: </b>
			{$Rank}
			<b>{$Tloc}: </b>
			{$Location}
			<b>{$Tage}: </b>
			{$Age}
			<b>{$Tlogins}: </b>
			{$Logins}
			<b>{$Tip}: </b>
			{$Ip}
			<b>{$Temail}: </b>
			{$Email}
			{$GG}
			<b>{$Tclan}: </b>
			{$Tribe}
			{$Triberank}
			<b>{$Reputation}: </b>
			{$Rep}
		</div>
	</div>
	</fieldset>
	</td>
	</tr>
	</table>
	{/strip}