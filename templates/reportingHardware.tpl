
<div style="float: left; margin-right: 20px;">
    <div style="float: left;">Filter:</div>
    <div class="styled-select" style="margin-top: 5px">
        <select id="filterType">
            <option value="room">Raum</option>
            <option value="component">Komponente</option>
        </select>
    </div>
</div>

<div style="float: left;">
    <input type="text" id="filterValue" />
</div>

<div class="clear"></div>

<table class="resultsTable">
    <thead>
        <tr>
            <th style="width: 10%;">Raumnummer</th>
            <th style="width: 40%;">Komponente</th>
            <th style="width: 35%;">Notiz</th>
            <th style="width: 15%;">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
		{foreach from=$components item=component}
        <tr>
            <td>{$component->getRoom()}</td>
            <td>{$component->getComponentType()}, {$component->getId()}_{$component->getName()}</td>
            <td class="notice{$component.room}">{$component.Room.Note}</td>
            <td class="link"><a onclick="toggleInput('{$component.room}','edit')">Notiz &auml;ndern</a></td>
        </tr>
		{/foreach}
    </tbody>
</table>