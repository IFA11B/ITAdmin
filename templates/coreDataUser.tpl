
{foreach from=$users item=user}
	<table class="resultsTable">
	    <thead>
	        <tr>
	            <th colspan="2">{$user.Name}</th>
	        </tr>
	    </thead>
	    <tbody>
	    	{foreach from=$user.modules item=module}
	        <tr>
	            <td>{$module.name}</td>
	            <td><input type="checkbox" name="{$module.name}" {if $module.right == "true"}checked="checked"{/if} value=""></td>
	        </tr>
	        {/foreach}
	    </tbody>
	</table>
{/foreach}