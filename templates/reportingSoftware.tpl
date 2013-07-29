<table class="resultsTable">
    <thead>
        <tr>
            <th>Software</th>
            <th>R&auml;ume</th>
        </tr>
    </thead>
    <tbody>
{foreach from=$componentNames item=Name}

	
		<table>
				<tbody>
			        <tr>
			            <td style="width: 10%;">{$Name}</td>
			            <td  style="width: 40%;">
			            {foreach from=$roomByComponent item=room}
			            {$room}
			            {/foreach}
			            </td>
			         </tr>
				</tbody>
			</table>
	   
	{/foreach}
	
    </tbody>
</table>