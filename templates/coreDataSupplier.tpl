 {if $suppliers != false && !isset($smarty.post.addNew)}
{foreach from=$suppliers item=supplier}
<form id="Supplier{$supplier->getId()}" method="post">
<input type="hidden" name="save" value="{$supplier->getId()}">
<table class="resultsTable liststyleTable" style="width:100%">
	    <thead>
        	<tr>
	            <th colspan="2">{$supplier->getCompanyname()}</th>
	            <th>&nbsp;</th>
	            <td class="link"><a class="edit" onclick="toggleInput('{$supplier->getId()}','edit', 'COREDATA','Supplier')">&auml;ndern</a>
	            &nbsp;|&nbsp;
	            <a onclick="deleteData('{$supplier->getId()}','COREDATA','Supplier')">l&ouml;schen</a></td>
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
{elseif $smarty.post.addNew == 'Supplier'}
	<form id="newSupplier" method="post">
	<input type="hidden" name="addSupplier" value="true">
	<table class="resultsTable liststyleTable" style="width:100%">
	    <thead>
        	<tr>
	            <th colspan="2">Neuer Lieferant</th>
	            <th>&nbsp;</th>
	            <td class="link"><a class="save" onclick="addNew('save', 'COREDATA','Supplier')">speichern</a>
	    	 </tr>
    	</thead>
	    <tbody>
	    	<tr>
	        	<td>&nbsp;</td>
	            <td>Name</td> 
	            <td name="Name" class="toggleInput" colspan="2"><input type="text" name="Name" value=""></td>
	        </tr>
	        <tr>
	        	<td>&nbsp;</td>
	            <td>Strasse</td> 
	            <td name="Street" class="toggleInput" colspan="2"><input type="text" name="Street" value=""></td>
	        </tr>
	        <tr>
	       		<td>&nbsp;</td>
	            <td>PLZ</td> 
	            <td name="Zipcode" class="toggleInput" colspan="2"><input type="text" name="Zipcode" value=""></td>
	        </tr>
	        <tr>
	        	<td>&nbsp;</td>
	            <td>Ort</td> 
	            <td name="City" class="toggleInput" colspan="2"><input type="text" name="City" value=""></td>
	        </tr>
	        <tr>
	       	 	<td>&nbsp;</td>
	            <td>Tel</td> 
	            <td name="Phone" class="toggleInput" colspan="2"><input type="text" name="Phone" value=""></td>
	        </tr>
	        <tr>
	       	 	<td>&nbsp;</td>
	            <td>Mobil</td> 
	            <td name="Mobile" class="toggleInput" colspan="2"><input type="text" name="Mobile" value=""></td>
	        </tr>
	        <tr>
	        	<td>&nbsp;</td>
	            <td>Fax</td> 
	            <td name="Fax" class="toggleInput" colspan="2"><input type="text" name="Fax" value=""></td>
	        </tr>
	        <tr>
	        	<td>&nbsp;</td>
	            <td>E-mail</td> 
	            <td name="Email" class="toggleInput" colspan="2"><input type="text" name="Email" value=""></td>            
	        </tr>
	   </tbody>
</table>
</form>

{else}
Keine Lieferanten in der Datenbank.
{/if}