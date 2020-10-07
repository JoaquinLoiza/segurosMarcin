{include 'header.tpl'}
{include "navAbm.tpl"}
<div class="col-sm-12 col-md-8">
    <form action="saveEditCategory" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_categoria" value="{$category->id_categoria}">
    <span>Categoria</span>
    <div>
        <input type="text" name="categoria" value="{$category->categoria}">
    </div>
    <span>Url imagen</span>
    <div>
        <input type="file" name="input_name">
    </div>
    <button class="btn btn-primary" type="submit">Guardar</button>
    </form>
</div>
</div>
</div>
{include 'footer.tpl'}