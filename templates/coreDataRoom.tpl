
<div class="clear"></div>

<table class="resultsTable">
    <thead>
        <tr>
            <th style="width: 25%;">Raumnummer</th>
            <th style="width: 15%;">Anz. Komponenten</th>
            <th style="width: 45%;">Notiz</th>
            <th style="width: 15%;">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    {if $rooms != false}
		{foreach from=$rooms item=room}
	        <tr>
	        	<form id="{$room->getId()}" action="" method="post">
		            <td>{$room->getName()}</td>
		            <td>{$room->getId()}</td>
		            <td class="notice{$room}">{$room->getNote()}</td>
		            <td class="link"><a onclick="toggleInput('{$room->getName()}','edit')">Notiz &auml;ndern</a></td>
	            </form>
	        </tr>
		{/foreach}
	{/if}
    </tbody>
</table>