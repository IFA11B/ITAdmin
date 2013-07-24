{extends file="layout.tpl"}

{block name=title}{$pageTitle}{/block}

{block name=js}
    <script type="text/javascript" src="./js/reportingMain.js"></script>
{/block}

{block name=content}
    <!-- Network -->
    <div id="network">
        <div class="header">
            Netzwerk
        </div>
        <div class="repContent"></div>
    </div>
    
    <!-- Software -->
    <div id="software">
        <div class="header">
            Software
        </div>
        <div class="repContent"></div>
    </div>
    
    <!-- Hardware -->
    <div id="hardware">
        <div class="header">
            Hardware
        </div>
        <div class="repContent"></div>
    </div>
{/block}