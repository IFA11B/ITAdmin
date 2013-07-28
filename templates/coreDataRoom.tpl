
<div class="clear"></div>

<table class="resultsTable">
    <thead>
        <tr>
            <th style="width: 25%;">Raumnummer</th>
            <th style="width: 15%;">Raumname</th>
            <th style="width: 45%;">Notiz</th>
            <th style="width: 15%;">&nbsp;</th>
        </tr>
    </thead>
</table>
{if $rooms != false}
{foreach from=$rooms item=room}
	<form id="Room{$room->getId()}" method="post">
	<input type="hidden" name="save" value="{$room->getId()}">
		<table>
		    <tbody>
		        <tr>
		            <td name ="Number" class="toggleInput">{$room->getNumber()}</td>
		            <td name ="Name" class="toggleInput">{$room->getName()}</td>
		            <td name ="Note" class="toggleInput">{$room->getNote()}</td>
		            <td class="link"><a class="edit" onclick="toggleInput('{$room->getId()}','edit', 'COREDATA','Room')">&auml;ndern</a>
		            &nbsp;|&nbsp;
		            <a onclick="deleteData('{$room->getId()}','COREDATA','Room')">l&ouml;schen</a></td>
		        </tr>
		    </tbody>
		</table>
	</form>
{/foreach}
{/if}