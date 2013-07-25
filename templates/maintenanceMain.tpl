{extends file="layout.tpl"}

{block name=title}{$pageTitle}{/block}

{block name=js}
    <script type="text/javascript" src="./js/reportingMain.js"></script>
{/block}

{block name=content}
    <!-- Mounting -->
    <div id="mounting">
        <div class="header">
            Einbau
        </div>
        <div class="repContent"></div>
    </div>
    
    <!-- Removing -->
    <div id="removing">
        <div class="header">
            Ausbau
        </div>
        <div class="repContent"></div>
    </div>
    
    <!-- Changing -->
    <div id="changing">
        <div class="header">
            Austausch
        </div>
        <div class="repContent"></div>
    </div>
{/block}