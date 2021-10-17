{strip}
<div class="six columns">
	<!-- https://opengameart.org/content/zeta-item-slot-icons -->
	<img src="/orodlin/images/ekwipunek.png" width="192" height="192" border="0" usemap="#map" />

	<map name="map">
		<!-- #$-:Image map file created by GIMP Image Map plug-in -->
		<!-- #$-:GIMP Image Map plug-in by Maurits Rijk -->
		<!-- #$-:Please do not edit lines starting with "#$" -->
		<!-- #$VERSION:2.3 -->
		<!-- #$AUTHOR:Rafael -->
		<area shape="rect" coords="66,0,131,64" alt="Pokaż hełmy" href="?ekwipunek=helm" />
		<area shape="rect" coords="65,66,128,132" alt="Pokaż zbroje/szaty" href="?ekwipunek=zbroja" />
		<area shape="rect" coords="0,66,63,131" alt="Pokaż tarcze" href="?ekwipunek=tarcza" />
		<area shape="rect" coords="129,66,189,131" alt="Pokaż bronie/łuki" href="?ekwipunek=bron" />
		<area shape="rect" coords="65,135,127,191" alt="Pokaż nagolenniki" href="?ekwipunek=buty" />
		<area shape="rect" coords="129,134,187,191" alt="Pokaż pierścienie" href="?ekwipunek=pierscienie" />
		<area shape="rect" coords="0,133,63,191" alt="Pokaż pierścienie" href="?ekwipunek=pierscienie" />
		<area shape="rect" coords="129,4,189,64" alt="Pokaż strzały" href="?ekwipunek=strzaly" />
		<area shape="rect" coords="1,3,65,65" alt="Pokaż mikstury" href="?ekwipunek=mikstury" />
	</map>
	{$Repairequip}
	{$Hide}
	{if $smarty.get.ekwipunek eq helm}
	<br />
	{$Helmet}
	<br />
	{section name=item4 loop=$Bhelmets}
	{$Bhelmets[item4]}
	{/section}
	{/if}

	{if $smarty.get.ekwipunek eq zbroja}
	<br />
	{$Armor}
	<br />
	{section name=item5 loop=$Barmors}
	{$Barmors[item5]}
	{/section}
	{section name=item7 loop=$Bcapes}
	{$Bcapes[item7]}
	{/section}
	{/if}

	{if $smarty.get.ekwipunek eq tarcza}
	<br />
	{$Shield}
	<br />
	{section name=item6 loop=$Bshields}
	{$Bshields[item6]}
	{/section}
	{/if}

	{if $smarty.get.ekwipunek eq bron}
	<br />
	{$Weapon}
	<br />
	{section name=item1 loop=$Bweapons}
	{$Bweapons[item1]}
	{/section}
	{section name=item2 loop=$Bstaffs}
	{$Bstaffs[item2]}
	{/section}
	{/if}

	{if $smarty.get.ekwipunek eq buty}
	<br />
	{$Legs}
	<br />
	{section name=item8 loop=$Blegs}
	{$Blegs[item8]}
	{/section}
	{/if}

	{if $smarty.get.ekwipunek eq pierscienie}
	<br />
	{$Ring1}
	{$Ring2}
	<br />
	{if $Rings1 != ""}
	{$Rings1}
	{section name=rings loop=$Bringid}
	<b>({$Amount}: {$Bringamount[rings]})</b> {$Brings[rings]} (+{$Bringpower[rings]}) [ <a href="equip.php?equip={$Bringid[rings]}">{$Awear}</a> | <a href="equip.php?sell={$Bringid[rings]}">{$Asell}</a> {$Fora} {$Bringcost[rings]} {$Goldcoins}
	]<br />
	{/section}
	(<a href="equip.php?sprzedaj=I">{$Sellallrings}</a>)<br /><br />
	{/if}
	{/if}

	{if $smarty.get.ekwipunek eq strzaly}
	<br />
	{$Arrows}
	<br />
	{if $Arrows1 != ""}
	{$Arrows1}
	{section name=item3 loop=$Barrows}
	{$Barrows[item3]} (+{$Barrpower[item3]}) {$Barrpoison[item3]} ({$Barramount[item3]} {$Tarrows}) [ <a href="equip.php?equip={$Barrid[item3]}">{$Awear}</a> | <a href="equip.php?sell={$Barrid[item3]}">{$Asell}</a> {$Fora} {$Barrcost[item3]}
	{$Goldcoins} ]<br />
	{/section}
	(<a href="equip.php?sprzedaj=R">{$Sellall}</a>)<br /><br />
	{/if}
	{/if}

	{if $smarty.get.ekwipunek eq mikstury}
	<br />
	{$poison}
	<br />
	{if $Potions1 > "0"}
	<br /><u>{$Potions2}</u>:<br />
	{section name=item10 loop=$Pname1}
	<b>({$Amount}: {$Pamount1[item10]} )</b> {$Pname1[item10]} ({$Peffect1[item10]}) {$Ppower1[item10]} {$Paction1[item10]}<br />
	{/section}
	{$Asellall} <br />

	{if (isset($2Potions1))}
	<center>
		<form method="post" action="equip.php?wypijwiele">
			<table>
				<tr>
					<td colspan="2" align="center">Wypij wiele mikstur naraz:
						<select name="potion">
							{section name=item10 loop=$2Pname1}
							<option value="{$2Potionid1[item10]}"> ({$2Amount}: {$2Pamount1[item10]} ) {$2Pname1[item10]} ({$2Peffect1[item10]}) {$2Ppower1[item10]}</option>
							{/section}
						</select></td>
				</tr>
				<tr>
					<td colspan="2" align="center">Ile:
						<input type="text" name="ile" value="1" />
						<input type="submit" value="Wypij" />
					</td>
				</tr>
			</table>
		</form>
		<br /><br />
	</center>
	{/if}
	{$Action}

	{if $Poison > "0"}
	<form method="post" action="equip.php?poison={$Poison}&amp;step=poison"><input type="submit" value="{$Poisonit}" /> <select name="weapon">
			{section name=item loop=$Poisonitem}
			<option value="{$Poisonid[item]}">{$Poisonitem[item]} ({$Tamount}: {$Poisonamount[item]})</option>
			{/section}
		</select>
		<input type="hidden" value="{$Poison}" name="poison" />
	</form>
	{if $Step == "poison"}
	{$Item}
	{/if}
	{/if}
	{/if}
	{/if}

	{/strip}