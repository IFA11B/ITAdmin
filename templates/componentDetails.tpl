
 <form id="Details{$component->getid()}" method="post">
    <input name="comId" type="hidden" value="{$component->getId()}">
    <input name="saving" type="hidden" value="1">
	<div class="contentHeading">Komponenten Details</div>
	<table>
        {foreach $component->getFields() as $attribute}
            <tr>
                <td>{$attribute.name}:<input type="hidden" name="properties[]" value="{$attribute.internal}"></td>
                <td name="{$attribute.internal}" class="toggleInput">{$attribute.value}</td>
            </tr>
        {/foreach}
	</table>

	<!-- <a class="edit pushRight" onclick="toggleInput()">bearbeiten</a> -->
</form>