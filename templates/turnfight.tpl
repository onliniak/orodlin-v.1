{strip}
<div class="six columns">
<br /><br /><br />{$Fround}: {$Round}{$Roundlimit}<br />
{$Actionpts}: {$Points}<br />
{$Manapts}: {$Mana}<br />
{$Lifepts}: {$HP}<br />
{$Exhausted}: {$Exhaust} / {$Cond}<br />
{if $Quiver != ""}
    {$Quiver}: {$Arramount}<br />
{/if}
<form method="post" action="{$Adres}">
{$Dattack}
{$Nattack}
{$Aattack}
{/strip}