<!DOCTYPE html>
<html>
    <head>
        <title>{block name=title}{/block} - IT Verwaltung</title>
        
        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="style/style.css">
        {block name=css}{/block}
        
        <!-- JavaScripts -->
        <script type="text/javascript" src="./js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="./js/general.js"></script>
        {block name=js}{/block}
    </head>
    <body>
        <div id="wrapper">
            <div id="head">
            	<div id="headlogo"> <img class="headlogo" src="images/Logo.png" alt="Logo B3 F�rth"/></div>
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