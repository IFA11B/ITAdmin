{extends file="layout.tpl"}
{block name=title}Home{/block}
{block name=content}
	<div class="contentHeading smallcontent">Willkommen</div>
	<div class="simpleText centerText"> Willkommen bei der IT-Systembetreuung der <br/>Martin-Segitz-Schule 
							/ Staatliche Berufsschule III F&uuml;rth <br/><br/>
							Sie sind Angemeldet als [userRole].
	</div>
{/block}

{block name=navbar}
	<div id="navbar">
       <ul>
			<li><a id="Reporting" title="super awesome reporting" class="navbar">Reporting</a></li>
		</ul>
	</div>
{/block}