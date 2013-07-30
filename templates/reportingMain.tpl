
{block name=css}
    <link rel="stylesheet" href="./style/reporting.css" />
{/block}

{block name=js}
    <script type="text/javascript" src="./js/spin.min.js"></script>
    <script type="text/javascript" src="./js/jquery.spin.js"></script>
    <script type="text/javascript" src="./js/reportingMain.js"></script>
{/block}

{block name=content}
    <!-- Network -->
    <div id="network">
        <div class="header contentHeading fullWidth">
            <div class="headerTitle">Netzwerk</div>
            <div class="headerArrow">
                <img src="./images/chevron-right.png" alt="&#8680;" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="repContent"></div>
    </div>
    <div class="clear"></div>
    
    <div id="software">
        <div class="header contentHeading fullWidth">
            <div class="headerTitle">Software</div>
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
        <div class="header contentHeading fullWidth">
            <div class="headerTitle">Hardware</div>
            <div class="headerArrow">
                <img src="./images/chevron-right.png" alt="&#8680;" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="repContent"></div>
    </div>
    <div class="clear"></div>
{/block}