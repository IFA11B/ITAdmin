
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
{if $rooms != false && !isset($smarty.post.addNew)}
{foreach from=$rooms item=room}
	<form id="Room{$room->getId()}" method="post">
	<input type="hidden" name="save" value="{$room->getId()}">
		<table>
		    <tbody>
		        <tr>
		            <td style="width: 25%" name ="Number" class="toggleInput">{$room->getNumber()}</td>
		            <td style="width: 15%" name ="Name" class="toggleInput">{$room->getName()}</td>
		            <td style="width: 45%" name ="Note" class="toggleInput">{$room->getNote()}</td>
		            <td style="width: 15%" class="link"><a class="edit" onclick="toggleInput('{$room->getId()}','edit', 'COREDATA','Room')">&auml;ndern</a>
		            &nbsp;|&nbsp;
		            <a onclick="deleteData('{$room->getId()}','COREDATA','Room')">l&ouml;schen</a></td>
		        </tr>
		    </tbody>
		</table>
	</form>
{/foreach}
{elseif $smarty.post.addNew == 'Room'}
<form id="newRoom" method="post">
	<input type="hidden" name="addRoom" value="true">
		<table>
		    <tbody>
		        <tr>
		            <td style="width: 25%" name="Number" class="toggleInput"><input type="text" name="Number" value=""></td>
		            <td style="width: 15%" name="Name" class="toggleInput"><input type="text" name="Name" value=""></td>
		            <td style="width: 45%" name="Note" class="toggleInput"><input type="text" name="Note" value=""></td>
		            <td style="width: 15%" class="link"><a class="save" onclick="addNew('save', 'COREDATA','Room')">speichern</a>
		        </tr>
		    </tbody>
		</table>
	</form>
{/if}