{extends file="layout.tpl"}
{block name=title}Login{/block}
{block name=content}
<form id="login" method="POST">
    <div id="loginFields">
        <div>Username: <input type="text" name="user"></div>
        <div>Password: <input type="password" name="password"></div>
    </div>
    <input type="submit" name="login" value="Login">
</form>
{/block}