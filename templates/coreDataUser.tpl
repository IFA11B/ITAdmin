
{foreach from=$users item=user}
	<table class="resultsTable">
		<form id="{$user.Id}" action="" method="post">
		    <thead>
		        <tr>
		            <th colspan="2">{$user.Name}</th>
		            <td colspan="3"></td>
		            <td><td class="link"><a onclick="toggleInput('{$user.Id}','edit')">&auml;ndern</a><a onclick="delete('{$user.Id}')">L&ouml;schen</a></td></td>
		        </tr>
		    </thead>
		    <tbody>
		    	{foreach from=$user.modules item=module}
		        <tr>
		            	<td>{$module.name}</td>
		            	<td><input type="checkbox" {if $module.Right == "true"}checked="checked"{/if} value="{$module.Name}" readonly></td>
		        </tr>
		        {/foreach}
		    </tbody>
		 </form>
	</table>
{/foreach}