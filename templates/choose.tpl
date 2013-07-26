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
        <div class="repContent"></div>
    </div>
    <div class="clear"></div>
{/block}