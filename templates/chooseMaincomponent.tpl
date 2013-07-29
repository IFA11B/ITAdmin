<!-- Komponente wählen -->
<div id="chooseMaincomponent" title="maincomponent">
    <div class="header contentHeading">
        <div class="headerTitle">Hauptkomponente w&auml;hlen</div>
    </div>
    <div class="clear"></div>
    <div class="chooseContent">
	    <div style="float: left; margin-right: 20px;">
		    <div style="float: left;">Filter:</div>
		</div>
		
		<div style="float: left;">
		    <input type="text" id="filterValue" data-listtype="maincomponent" data-modulename="" />
		</div>
		
		<div class="clear"></div>
		
		<table class="resultsTable">
		    <thead>
		        <tr>
		            <th style="width: 40%;">Komponente</th>
		            <th style="width: 10%;">Art</th>
		            <th style="width: 10%;">Gew&auml;hrleistung bis</th>
		            <th style="width: 35%;">Notiz</th>
		            <th style="width: 5%;">Raum</th>
		        </tr>
		    </thead>
			<tbody>
			{foreach from=$listResult item=component}
			        <tr>
			            <td>{$component.ComponentId}_{$component.ComponentName}, {$component.ComponentType}</td>
			            <td>{$component.Warrantyduration}</td>
			            <td>{$component.Note}</td>
			            <td>{$component.Room.Name}</td>
			            <td><a class="submitChoice" onclick="submitChoice({$component.ComponentId})">ausw&auml;hlen</a></td>
			        </tr>
			{/foreach}
			</tbody>
		</table>
	</div>
</div>