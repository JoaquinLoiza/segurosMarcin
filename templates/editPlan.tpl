{include 'header.tpl'}
{include "navAbm.tpl"}
<div class="col-sm-12 col-md-8">
    <form action="saveEditPlan" method="POST">
    <input type="hidden" name="id_planes" value="{$plan->id_planes}">
    <span>Nombre plan</span>
    <div>
        <input type="text" name="plan" value="{$plan->plan}">
    </div>
    <span>Cobertura</span>
    <div>
        <input type="text" name="cobertura" value="{$plan->cobertura}">
    </div>
    <span>Descripción</span>
    <div class="col-10">
    <textarea name="descripcion" class="form-control" rows="10">{$plan->descripcion}</textarea>
    </div>
    <button class="btn btn-primary" type="submit">Guardar</button>
    </form>
</div>
</div>
</div>
{include 'footer.tpl'}