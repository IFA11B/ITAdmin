<table class="resultsTable">
    <thead>
        <tr>
            <th>Raum</th>
            <th>Netzadresse</th>
            <th>Subnetz</th>
            <th>Standard-Gateway</th>
        </tr>
    </thead>
    <tbody>
{foreach from=$components item=component}
        <tr>
            <td>{DataManagement::getInstance()->getRoomById($component->getRoom())->getName()}</td>
            <td>{$component->getIpAddress()}</td>
            <td>{$component->getSubnet()}</td>
            <td>{$component->getGateway()}</td>
        </tr>
{/foreach}
    </tbody>
</table>