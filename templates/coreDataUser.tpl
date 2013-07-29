 {if $users != false}
{foreach from=$users item=tpl_user}
<form id="User{$tpl_user->getId()}"  method="post">
<input type="hidden" name="save" value="id">
	<table class="resultsTable liststyleTable">
		    <thead>
		        <tr>
		            <th colspan="2">{$tpl_user->getName()}</th>
		            <td colspan="3"></td>
		            <!-- <td><td class="link"><a class="edit" onclick="toggleCheckbox('{$tpl_user->getId()}','edit', 'COREDATA','User')">&auml;ndern</a>&nbsp;|&nbsp;<a onclick="deleteData('{$tpl_user->getId()}', 'COREDATA','User')">l&ouml;schen</a></td></td>-->
		        </tr>
		    </thead>
		    <tbody>
		    	{foreach from=$modules item=module}
		        <tr>
		            	<td>{$module->getTitle()}</td>
		            	<td><input type="checkbox" name="{$module->getName()}" disabled="disabled"  value="{$module->getName()}" {if $tpl_user->canReadModule($module)}checked="checked"{/if}></td>
		        </tr>
		        {/foreach}
		    </tbody>
	</table>
	</form>
{/foreach}
{/if}