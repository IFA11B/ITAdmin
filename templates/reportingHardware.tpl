
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
</table>
{foreach from=$rooms item=room}
	{foreach from=$componentByRoom.{$room->getId()} item=singleComponent}
		<form id="Hardware{$singleComponent->getId()}" method="post">
			<input type="hidden" name="save" value="{$singleComponent->getId()}">
			<table>
				<tbody>
			        <tr>
			            <td>{$room->getNumber()}_{$room->getName()}</td>
			            <td>{$singleComponent->getComponentType()}, {$singleComponent->getId()}_{$singleComponent->getName()}</td>
			            <td name="Note" class="toggleInput">{$singleComponent->getNote()}</td>
			            <td class="link"><a class ="edit" onclick="toggleInput('{$singleComponent->getId()}','edit', 'REPORTING','Hardware')">Notiz &auml;ndern</a></td>
				     </tr>
				</tbody>
			</table>
		</form>     
	{/foreach}
{/foreach}
