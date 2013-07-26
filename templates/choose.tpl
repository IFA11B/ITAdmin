{extends file="layout.tpl"}

{block name=title}{$pageTitle}{/block}

{block name=css}
    <link rel="stylesheet" href="./style/choose.css" />
{/block}

{block name=js}
    <script type="text/javascript" src="./js/spin.min.js"></script>
    <script type="text/javascript" src="./js/jquery.spin.js"></script>
    <script type="text/javascript" src="./js/choose.js"></script>
{/block}

{block name=content}
    <!-- Komponente wählen -->
    <div id="chooseComponent">
        <div class="header contentHeading">
            <div class="headerTitle">Komponente w&auml;hlen</div>
        </div>
        <div class="clear"></div>
        <div class="chooseContent">
		    <div style="float: left; margin-right: 20px;">
			    <div style="float: left;">Filter:</div>
			    <div class="styled-select" style="margin-top: 5px">
			        <select id="filterType">
			            <option value="component">Komponentenart</option>
			            <option value="room">Raum</option>
			        </select>
			    </div>
			</div>
			
			<div style="float: left;">
			    <input type="text" id="filterValue" />
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
				{foreach from=$components item=$component}
				        <tr>
				            <td>{$component.Room.Name}</td>
				            <td>{$component.ComponentType}, {$component.ComponentId}_{$component.ComponentName}</td>
				            <td class="notice{$component.room}">{$component.Room.Note}</td>
				            <td class="link"><a class="editNotice" id="{$component.room}">Notiz &auml;ndern</a></td>
				        </tr>
				{/foreach}
				</tbody>
			</table>
		</div>
    </div>
    <div class="clear"></div>
{/block}