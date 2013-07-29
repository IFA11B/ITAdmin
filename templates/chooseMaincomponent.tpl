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
		    <input type="text" id="filterValue" data-listtype="maincomponent" data-modulename="" data-updateid="" />
		</div>
		
		<div class="clear"></div>
		
		<table class="resultsTable">
		    <thead>
		        <tr>
		            <th>Komponente</th>
		            <th>Art</th>
		            <th>Gew&auml;hrleistung bis</th>
		            <th>Notiz</th>
		            <th>Raum</th>
                    <th></th>
		        </tr>
		    </thead>
			<tbody>
			{foreach from=$listResult item=component}
			        <tr>
			            <td>{$component->getId()}_{$component->getName()}</td>
                        <td>{$component->getComponentType()}</td>
			            <td>{$component->getWarrantyDuration()}</td>
			            <td>{$component->getNote()}</td>
			            <td>{DataManagement::getInstance()->getRoomById($component->getRoom())->getName()}</td>
			            <td><a class="submitChoice" onclick="submitChoice({$component->getId()}, $('#filterValue').attr('data-updateid'))">ausw&auml;hlen</a></td>
			        </tr>
			{/foreach}
			</tbody>
		</table>
	</div>
</div>