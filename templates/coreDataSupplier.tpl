 {if $suppliers != false}
{foreach from=$suppliers item=supplier}
<form id="supplier{$supplier->getId()}" action="" method="post">
<table class="resultsTable liststyleTable" style="width:100%">
	    <thead>
        	<tr>
	            <th colspan="2">{$supplier->getCompanyname()}</th>
	            <th>&nbsp;</th>
	            <td class="link"><a class="edit" onclick="toggleInput('{$supplier->getId()}','edit', 'COREDATA','supplier')">&auml;ndern</a>&nbsp;|&nbsp;<a onclick="delete('{$supplier->getId()}')">l&ouml;schen</a></td>
	    	 </tr>
    	</thead>
	    <tbody>
	        <tr>
	        	<td>&nbsp;</td>
	            <td>Strasse</td> 
	            <td name ="Street" class="toggleInput" colspan="2">{$supplier->getStreet()}</td>
	        </tr>
	        <tr>
	       		<td>&nbsp;</td>
	            <td>PLZ</td> 
	            <td name ="Zipcode" class="toggleInput" colspan="2">{$supplier->getZipcode()}</td>
	        </tr>
	        <tr>
	        	<td>&nbsp;</td>
	            <td>Ort</td> 
	            <td name ="City" class="toggleInput" colspan="2">{$supplier->getCity()}</td>
	        </tr>
	        <tr>
	       	 	<td>&nbsp;</td>
	            <td>Tel</td> 
	            <td name ="Phone" class="toggleInput" colspan="2">{$supplier->getPhone()}</td>
	        </tr>
	        <tr>
	       	 	<td>&nbsp;</td>
	            <td>Mobil</td> 
	            <td name ="Mobile" class="toggleInput" colspan="2">{$supplier->getMobile()}</td>
	        </tr>
	        <tr>
	        	<td>&nbsp;</td>
	            <td>Fax</td> 
	            <td name ="Fax" class="toggleInput" colspan="2">{$supplier->getFax()}</td>
	        </tr>
	        <tr>
	        	<td>&nbsp;</td>
	            <td>E-mail</td> 
	            <td name ="Email" class="toggleInput" colspan="2">{$supplier->getEmail()}</td>            
	        </tr>
	   </tbody>
</table>
</form>
{/foreach}
{else}
Keine Lieferanten in der Datenbank.
{/if}