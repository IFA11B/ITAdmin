<!DOCTYPE html>
<html>
    <head>
        <title>{block name=title}{/block} - IT Verwaltung</title>
        
        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="style/style.css"/>
        <link rel="stylesheet" type="text/css" href="./js/jquery-ui-1.10.3.custom/css/black-tie/jquery-ui-1.10.3.custom.css"/>
        {block name=css}{/block}
        
        <!-- JavaScripts -->
        <script type="text/javascript" src="./js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="./js/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script>
        <script type="text/javascript" src="./js/general.js"></script>
        <script type="text/javascript" src="./js/formFunctions.js"></script>
        
        <!-- <script type="text/javascript" src="./js/componentDetails.js"></script>-->
       <script type="text/javascript" src="./js/chooseMain.js"></script>
        
        {block name=js}{/block}
    </head>
    <body>
        <div id="wrapper">
        	<div id="detailsBlock">
        	</div>
        	<div id="listBlock">
        	</div>
        
            <div id="head">
            	<div id="headlogo"> <img class="headlogo" src="images/Logo.png" alt="Logo B3 Fürth"/></div>
            	<div id="headtitle">IT-Systembetreuung</div>
            </div>
            <div id="main">
                		{block name=navbar}{/block}
                    </ul>
                </div>
                <div id="content">
                    {block name=content}{/block}
                </div>
            </div>
            <div id="foot">
            
            </div>
        </div>
    </body>
</html>