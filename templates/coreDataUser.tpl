
{foreach from=$users item=user}
	<table class="resultsTable">
		<form id="{$user.Name}" action="" method="post">
		    <thead>
		        <tr>
		            <th colspan="2">{$user.Name}</th>
		            <td colspan="3"></td>
		            <td><a onclick=></a></td>
		        </tr>
		    </thead>
		    <tbody>
		    	{foreach from=$user.modules item=module}
		        <tr>
		            	<td>{$module.name}</td>
		            	<td><input type="checkbox" name="{$module.Name}" {if $module.Right == "true"}checked="checked"{/if} value="" readonly></td>
		        </tr>
		        {/foreach}
		    </tbody>
		 </form>
	</table>
{/foreach}