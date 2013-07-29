<table class="resultsTable">
    <thead>
        <tr>
            <th>Software</th>
            <th>R&auml;ume</th>
        </tr>
    </thead>
    <tbody>
{foreach from=$components item=component}
        <tr>
            <td>{$component->getName()}</td>
            <td>{implode(', ', array(1, 2))}</td>
        </tr>
{/foreach}
    </tbody>
</table>