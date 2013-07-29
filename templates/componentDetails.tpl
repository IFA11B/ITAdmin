<div class="repContent">
 <form id="Detail{$component->getid()}" method="post">
    <input name="comId" type="hidden" value="{$component->getId()}">
    <input name="saving" type="hidden" value="1">
	<div class="contentHeading">Komponenten Details</div>
	<table>
        {foreach $component->getFields() as $attribute}
            <tr>
                <td style="text-align: right;">{$attribute.name}:<input type="hidden" name="properties[]" value="{$attribute.internal}"></td>
                <td name="{$attribute.internal}" class="toggleInput" style="text-align: left;">{$attribute.value}</td>
            </tr>
        {/foreach}
	</table>
    <div class="pushRight">
	<a class="edit" onclick="toggleInput({$component->getId()}, 'edit', '{$smarty.get.module}', '{$smarty.get.page}')">bearbeiten</a> 
    </div>
</form>
</div>