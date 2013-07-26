<table class="resultsTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Strasse</th>
            <th>PLZ</th>
            <th>Ort</th>
            <th>Tel</th>
            <th>Mobil</th>
            <th>Fax</th>
            <th>E-mail</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
		{foreach from=$suppliers item=supplier}
	        <tr>
	            <td>{$supplier.Name}</td>
	            <td>{$supplier.Street}</td>
	            <td>{$supplier.Postal}</td>
	            <td>{$supplier.Location}</td>
	            <td>{$supplier.Phone}</td>
	            <td>{$supplier.Mobile}</td>
	            <td>{$supplier.Fax}</td>
	            <td>{$supplier.Mail}</td>
	            <td class="link"><a onclick="toggleInput('{$supplier.Id}','edit')">&auml;ndern</a><a onclick="delete('{$supplier.Id}')">L&ouml;schen</a></td>
	        </tr>
		{/foreach}
    </tbody>
</table>