{strip}
<div class="six columns">
{if $Mine == ""}
    {$Minesinfo}<ul{if $Graphstyle == "Y"} class="sword"{/if}>
    <li> <a href="mines.php?mine=copper">{$Acopper}{$Minamount[0]}</a></li>
    <li> <a href="mines.php?mine=zinc">{$Azinc}{$Minamount[1]}</a></li>
    <li> <a href="mines.php?mine=tin">{$Atin}{$Minamount[2]}</a></li>
    <li> <a href="mines.php?mine=iron">{$Airon}{$Minamount[3]}</a></li>
    <li> <a href="mines.php?mine=coal">{$Acoal}{$Minamount[4]}</a></li>
    </ul><br /><br />
    {$Minessearch}
{/if}

{if $Mine != "" && $Step == ""}
    {$Mineinfo}{$Minename}{$Mineinfo2}<br />
    {if $Mine2 == "N"}
        - <a href="mines.php?mine={$Mine}&amp;step=dig">{$Adig}</a><br />
        - <a href="mines.php?mine={$Mine}&amp;step=search">{$Asearch}</a><br />
    {/if}
    {if $Mine2 == "Y"}
        - <a href="mines.php?mine={$Mine}&amp;step=search">{$Asearch}</a><br />
    {/if}
{/if}

{if $Step == "search"}
    {if $Type == ""}
        <form method="post" action="mines.php?mine={$Mine}&amp;step=search&amp;type=small">
            <input type="submit" value="{$Asearch}" /> {$Minerals} {$Smallmith} {$Mithrilcoins} {$Smallgold} {$Goldcoins} 1 {$Searchday}
        </form>
        <form method="post" action="mines.php?mine={$Mine}&amp;step=search&amp;type=medium">
            <input type="submit" value="{$Asearch}" /> {$Minerals} {$Mediummith} {$Mithrilcoins} {$Mediumgold} {$Goldcoins} 2 {$Searchdays}
        </form>
        <form method="post" action="mines.php?mine={$Mine}&amp;step=search&amp;type=large">
            <input type="submit" value="{$Asearch}" /> {$Minerals} {$Largemith} {$Mithrilcoins} {$Largegold} {$Goldcoins} 3 {$Searchdays}
        </form>
    {/if}
    {if $Type != ""}
        {$Message}
    {/if}
{/if}

{if $Step == "dig"}
    <form method="post" action="mines.php?mine={$Mine}&amp;step=dig&amp;dig=Y">
        {$Yousend} {$Minname} <input type="text" name="amount" size="5" />{$Menergy}<br />
        <input type="submit" value="{$Adig}" />
    </form>
    <br />{$Message}
{/if}

{if $Mine != ""}
    <br /><br /><a href="mines.php">{$Aback}</a>
{/if}
{/strip}
