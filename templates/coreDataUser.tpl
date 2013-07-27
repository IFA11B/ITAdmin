
{foreach from=$users item=tpl_user}
	<table class="resultsTable">
		<form id="{$tpl_user->getId()}" action="" method="post">
		    <thead>
		        <tr>
		            <th colspan="2">{$tpl_user->getName()}</th>
		            <td colspan="3"></td>
		            <td><td class="link"><a onclick="toggleInput('{$tpl_user->getId()}','edit')">&auml;ndern</a>&nbsp;|&nbsp;<a onclick="delete('{$tpl_user->getId()}')">l&ouml;schen</a></td></td>
		        </tr>
		    </thead>
		    <tbody>
		    	{foreach from=$modules item=module}
		        <tr>
		            	<td>{$module->getTitle()}</td>
		            	<td><input type="checkbox" {if $tpl_user->canReadModule($module)}checked="checked"{/if}  value="{$module->getName()}"></td>
		        </tr>
		        {/foreach}
		    </tbody>
		 </form>
	</table>
{/foreach}