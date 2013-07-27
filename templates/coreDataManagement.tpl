

{block name=css}
    <link rel="stylesheet" href="./style/reporting.css" />
{/block}

{block name=js}
    <script type="text/javascript" src="./js/spin.min.js"></script>
    <script type="text/javascript" src="./js/jquery.spin.js"></script>
    <script type="text/javascript" src="./js/coreDataMain.js"></script>
{/block}

{block name=content}
    <!-- supplier -->
    <div id="supplier">
        <div class="header contentHeading fullWidth">
            <div class="headerTitle">Lieferanten</div>
            <div class="headerArrow">
                <img src="./images/chevron-right.png" alt="&#8680;" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="repContent"></div>
    </div>
    <div class="clear"></div>
    
    <!-- rooms -->
    <div id="room">
        <div class="header contentHeading fullWidth">
            <div class="headerTitle">R&auml;me</div>
            <div class="headerArrow">
                <img src="./images/chevron-right.png" alt="&#8680;" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="repContent"></div>
    </div>
    <div class="clear"></div>
    
    <!-- user -->
    <div id="user">
        <div class="header contentHeading fullWidth">
            <div class="headerTitle">Benutzer</div>
            <div class="headerArrow">
                <img src="./images/chevron-right.png" alt="&#8680;" />
            </div>
        </div>
        <div class="clear"></div>
        <div class="repContent"></div>
    </div>
    <div class="clear"></div>
{/block}