<table class="resultsTable">
    <thead>
        <tr>
            <th>Raum</th>
            <th>Netzadresse</th>
            <th>Subnetzmaske</th>
            <th>Standard-Gateway</th>
            <th>DNS-Server</th>
        </tr>
    </thead>
    <tbody>
{foreach from=$components item=component}
        <tr>
            <td>{DataManagement::getInstance()->getRoomById($component->getRoom())->getName()}</td>
            <td>{implode(', ', array(1, 2))}</td>
            <td>{implode(', ', array(1, 2))}</td>
            <td>{implode(', ', array(1, 2))}</td>
            <td>{implode(', ', array(1, 2))}</td>
        </tr>
{/foreach}
    </tbody>
</table>