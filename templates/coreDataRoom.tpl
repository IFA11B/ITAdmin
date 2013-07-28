
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
    <tbody>
    {if $rooms != false}
		{foreach from=$rooms item=room}
	        <tr>
	        	<form id="Rooms{$room->getId()}" action="" method="post">
		            <td name ="Number" class="toggleInput">{$room->getNumber()}</td>
		            <td name ="Name" class="toggleInput">{$room->getName()}</td>
		            <td name ="Note" class="toggleInput">{$room->getNote()}</td>
		            <td class="link"><a class="edit" onclick="toggleInput('{$room->getId()}','edit', 'COREDATA','Rooms')">&auml;ndern</a>
		            &nbsp;|&nbsp;
		            <a onclick="deleteData('{$room->getId()}','COREDATA','Rooms')">l&ouml;schen</a></td>
	            </form>
	        </tr>
		{/foreach}
	{/if}
    </tbody>
</table>