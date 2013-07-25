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
			{foreach from=$modules item=module}
 					<li><a id="{$module.name}" title="{$module.descr}" class="navbar">{$module.title}</a></li>
			{/foreach}
		</ul>
	</div>
{/block}