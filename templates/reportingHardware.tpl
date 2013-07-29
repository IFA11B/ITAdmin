<!-- 
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
 -->
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
{if isset($componentByRoom.{$room->getId()})}
	{foreach from=$componentByRoom.{$room->getId()} item=singleComponent}
		<form id="Hardware{$singleComponent->getId()}" method="post">
			<input type="hidden" name="save" value="{$singleComponent->getId()}">
			<table>
				<tbody>
			        <tr>
			            <td style="width: 10%;">{$room->getNumber()}_{$room->getName()}</td>
			            <td  style="width: 40%;">
                         <a onclick="openDetails('REPORTING','{$singleComponent->getId()}')">
                                {$singleComponent->getComponentType()}, {$singleComponent->getId()}_
                                {$singleComponent->getName()}
                         </a></td>
			            <td style="width: 35%;" name="Note" class="toggleInput">{$singleComponent->getNote()}</td>
			            <td class="link"><a class ="edit smallLink" onclick="toggleInput('{$singleComponent->getId()}','edit', 'REPORTING','Hardware')">Notiz &auml;ndern</a></td>
				     </tr>
				</tbody>
			</table>
		</form>     
	{/foreach}
{else}
	<form id="Hardware{$singleComponent->getId()}" method="post">
			<input type="hidden" name="save" value="{$singleComponent->getId()}">
			<table>
				<tbody>
			        <tr>
			            <td style="width: 10%;">{$room->getNumber()}_{$room->getName()}</td>
			            <td style="width: 40%;"> - </td>
			            <td style="width: 35%;" name="Note" class="toggleInput"> - </td>
			            <td style="width: 15%;" class="link">&nbsp;</td>
				     </tr>
				</tbody>
			</table>
	</form>     
{/if}
{/foreach}
