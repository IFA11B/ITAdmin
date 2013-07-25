{extends file="layout.tpl"}
{block name=title}Login{/block}
{block name=content}
<div class="contentHeading smallcontent">Anmeldung</div>
<form id="login" method="POST">
    <div id="loginFields">
        <div class="formrow"><div class="inputlabel"> Username:</div><input type="text" name="user"></div>
        <div class="formrow"><div class="inputlabel">Password:</div><input type="password" name="password"></div>
    </div>
    <input type="submit" class="button pushRight" name="login" value=">">
</form>
{/block}