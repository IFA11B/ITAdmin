{extends file="layout.tpl"}

{block name=title}{$pageTitle}{/block}

{block name=css}
    <link rel="stylesheet" href="./style/style.css" />
{/block}

{block name=js}
    <script type="text/javascript" src="./js/spin.min.js"></script>
    <script type="text/javascript" src="./js/jquery.spin.js"></script>
    <script type="text/javascript" src="./js/maintenanceMain.js"></script>
{/block}

{block name=content}
    <!-- Change -->
    <div id="change">
        <div class="header contentHeading">
            <div class="headerTitle">Austausch</div>
            <div class="headerArrow">
                <img src="./images/chevron-right.png" alt="&#8680;" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="repContent"></div>
    </div>
    <div class="clear"></div>
    
    <!-- Mount -->
    <div id="mount">
        <div class="header contentHeading">
            <div class="headerTitle">Einbau</div>
            <div class="headerArrow">
                <img src="./images/chevron-right.png" alt="&#8680;" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="repContent"></div>
    </div>
    <div class="clear"></div>
    
    <!-- Remove -->
    <div id="remove">
        <div class="header contentHeading">
            <div class="headerTitle">Ausbau</div>
            <div class="headerArrow">
                <img src="./images/chevron-right.png" alt="&#8680;" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="repContent"></div>
    </div>
    <div class="clear"></div>
{/block}