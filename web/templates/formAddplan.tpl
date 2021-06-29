{include "header.tpl"}
{include "navAbm.tpl"}
<div class="col-sm-12 col-md-8">
   <h1>Agrega un plan</h1>
   <form action="insertPlan" method="POST">
   <div>
      <input type="text" placeholder="Plan" name="plan">
      <input type="text" placeholder="Cobertura" name="cobertura">
   </div>
   <span>Categoria</span>
   <div class="col-5">
      <select name="id_categoria_fk" class="form-control">
      {foreach from=$categories item=category }
         <option value="{$category->id_categoria}">{$category->categoria}</option>
      {/foreach}
      </select>
   </div>
      <span>Descripción</span>
   <div class="col-10">
      <textarea name="descripcion" class="form-control" rows="6"></textarea>
   </div>
   <button class="btn btn-primary" type="submit">Agregar</button>
   </form>
   <h2>Todos los planes</h2>
   <ul>
   {foreach from=$plans item=plan}
      <li>{$plan->plan}</li>
   {/foreach}
   </ul>
</div>
</div>
</div>
{include "footer.tpl"}