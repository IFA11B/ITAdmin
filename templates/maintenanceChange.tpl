
<div style="float: left; margin-right: 20px;">
    <div style="float: left;">Filter:</div>
    <div class="styled-select" style="margin-top: 5px">
        <select id="sourceFilterType">
            <option value="room">Raum</option>
            <option value="component">Komponente</option>
        </select>
    </div>
</div>

<div style="float: left;">
    <input type="text" id="sourceFilterValue" />
</div>

<div class="clear"></div>

<table class="resultsTable">
    <thead>
        <tr>
            <th style="width: 10%;">Raumnummer</th>
            <th style="width: 40%;">Komponente</th>
            <th style="width: 35%;">Notiz</th>
            <th style="width: 15%;">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
{foreach from=$components item=component}
        <tr>
                	<td>        
        	<select id="SelectedSource">
            <option value="{$component.ComponentId}"></option>
       		</td>
            <td>{$component.Room.Name}</td>
            <td>{$component.ComponentType}, {$component.ComponentId}_{$component.ComponentName}</td>
            <td>{$component.Room.Note}</td>
            <td class="link"><a href="#">Notiz &auml;ndern</a></td>
        </tr>
{/foreach}
    </tbody>
</table>

<div style="float: left; margin-right: 20px;">
    <div style="float: left;">Filter:</div>
    <div class="styled-select" style="margin-top: 5px">
        <select id="targetFilterType">
            <option value="room">Raum</option>
            <option value="component">Komponente</option>
        </select>
    </div>
</div>

<div style="float: left;">
    <input type="text" id="targetFilterValue" />
</div>

<div class="clear"></div>

<table class="resultsTable">
    <thead>
        <tr>
            <th style="width: 10%;">Raumnummer</th>
            <th style="width: 40%;">Komponente</th>
            <th style="width: 35%;">Notiz</th>
            <th style="width: 15%;">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
{foreach from=$components item=component}
        <tr>
                	<td>        
        	<select id="SelectedTarget">
            <option value="{$component.ComponentId}"></option>
       		</td>
            <td>{$component.Room.Name}</td>
            <td>{$component.ComponentType}, {$component.ComponentId}_{$component.ComponentName}</td>
            <td>{$component.Room.Note}</td>
            <td class="link"><a href="#">Notiz &auml;ndern</a></td>
        </tr>
{/foreach}
    </tbody>
</table>
<div style="float: left;">
    <input type="submit" id="maintain" name="Austauschen" />
</div>