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
			<li><a id="REPORTING" title="super awesome reporting" class="navbar">Reporting</a></li>
			<li><a id="COREDATA" title="well, maybe it's not that bad" class="navbar">Stammdatenverwaltung</a></li>
			<li><a id="ORDER" title="basically... nothing" class="navbar">Bestellung</a></li>
		</ul>
	</div>
{/block}
