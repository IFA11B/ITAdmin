 {if $suppliers != false}
{foreach from=$suppliers item=supplier}
<table class="resultsTable liststyleTable" style="width:100%">
<form id="{$supplier->getId()}" action="" method="post">
	    <thead>
        	<tr>
	            <th colspan="2">{$supplier->getCompanyname()}</th>
	            <th>&nbsp;</th>
	            <td class="link"><a class="edit" onclick="toggleInput('{$supplier->getId()}','edit')">&auml;ndern</a>&nbsp;|&nbsp;<a onclick="delete('{$supplier->getId()}')">l&ouml;schen</a></td>
	    	 </tr>
    	</thead>
	    <tbody>
	        <tr>
	        	<td>&nbsp;</td>
	            <td>Strasse</td> 
	            <td class="toggleInput" colspan="2">{$supplier->getStreet()}</td>
	        </tr>
	        <tr>
	       		<td>&nbsp;</td>
	            <td>PLZ</td> 
	            <td class="toggleInput" colspan="2">{$supplier->getZipcode()}</td>
	        </tr>
	        <tr>
	        	<td>&nbsp;</td>
	            <td>Ort</td> 
	            <td class="toggleInput" colspan="2">{$supplier->getCity()}</td>
	        </tr>
	        <tr>
	       	 	<td>&nbsp;</td>
	            <td>Tel</td> 
	            <td class="toggleInput" colspan="2">{$supplier->getPhone()}</td>
	        </tr>
	        <tr>
	       	 	<td>&nbsp;</td>
	            <td>Mobil</td> 
	            <td class="toggleInput" colspan="2">{$supplier->getMobile()}</td>
	        </tr>
	        <tr>
	        	<td>&nbsp;</td>
	            <td>Fax</td> 
	            <td class="toggleInput" colspan="2">{$supplier->getFax()}</td>
	        </tr>
	        <tr>
	        	<td>&nbsp;</td>
	            <td>E-mail</td> 
	            <td class="toggleInput" colspan="2">{$supplier->getEmail()}</td>            
	        </tr>
	   </tbody>
</form>
</table>
{/foreach}
{/if}