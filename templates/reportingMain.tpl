{extends file="layout.tpl"}

{block name=title}{$pageTitle}{/block}

{block name=css}
    <link rel="stylesheet" href="./style/reportingMain.css" />
{/block}

{block name=js}
    <script type="text/javascript" src="./js/spin.min.js"></script>
    <script type="text/javascript" src="./js/jquery.spin.js"></script>
    <script type="text/javascript" src="./js/reportingMain.js"></script>
{/block}

{block name=content}
    <!-- Network -->
    <div id="network">
        <div class="header">
            <div class="headerTitle contentHeading">Netzwerk</div>
            <div class="headerArrow">
                <img src="./images/chevron-right.png" alt="&#8680;" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="repContent"></div>
    </div>
    <div class="clear"></div>
    
    <!-- Software -->
    <div id="software">
        <div class="header">
            <div class="headerTitle contentHeading">Software</div>
            <div class="headerArrow">
                <img src="./images/chevron-right.png" alt="&#8680;" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="repContent"></div>
    </div>
    <div class="clear"></div>
    
    <!-- Hardware -->
    <div id="hardware">
        <div class="header">
            <div class="headerTitle contentHeading">Hardware</div>
            <div class="headerArrow">
                <img src="./images/chevron-right.png" alt="&#8680;" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="repContent"></div>
    </div>
    <div class="clear"></div>
{/block}