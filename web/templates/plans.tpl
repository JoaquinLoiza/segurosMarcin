{include "header.tpl"}
<div class="cont_plans">
    {if !empty($plans[0]->categoria)}
        <h1>{$plans[0]->categoria}</h1>
    {/if}
    <ul>
        {foreach from=$plans item=plan}
        {$id=$plan->id_planes}
        <li>
            <a href="showCoverage/{$id}">{$plan->plan}</a>
        </li>
        {/foreach}
    </ul>
</div>
{include "footer.tpl"}