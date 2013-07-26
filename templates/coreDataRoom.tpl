
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
		{foreach from=$rooms item=room}
	        <tr>
	            <td>{$room.Name}</td>
	            <td>{$room.NoHardware}</td>
	            <td class="notice{$room}">{$room.Note}</td>
	            <td class="link"><a onclick="toggleInput('{$room.Name}','edit')">Notiz &auml;ndern</a></td>
	        </tr>
		{/foreach}
    </tbody>
</table>