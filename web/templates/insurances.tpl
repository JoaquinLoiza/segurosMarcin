{include "header.tpl"}
<h1 class="title_insurances">Nuestros Seguros</h1>
<div class="cont_categories">
    {foreach from=$insurances item=insurance}
    {$id=$insurance->id_categoria}
    {$category=str_replace(" ",'<br />',$insurance->categoria)}
    <a class="cont_category rounded-circle items navbar-brand" style="background-image: url({$insurance->imagen})" href="seePlansCategory/{$id}">{$category}</a>
    {/foreach}
</div>
{include "footer.tpl"}