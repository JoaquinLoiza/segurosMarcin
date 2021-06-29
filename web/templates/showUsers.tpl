{include "header.tpl"}
{include "navAbm.tpl"}
<div class="col-sm-12 col-md-5">
    <table class="table table-dark text-ligth rounded">
        <thead>
            <tr>
                <th>Usuarios</th>
                <th>Administrador</th>
                <th>Eliminar</th>
            </tr>
        </thead>
    <tbody>
    {foreach from=$users item=user }
        <tr>
            <td class="col-6">{$user->email}</td>
            <td class="col-3">
            {if $user->administrador == 1}
                <a type="button" class="btn btn-success btn-block btn-sm" href="confirmRole/{$user->email}/{$user->administrador}">SI</a>
            {else if $user->administrador == 0}
                <a type="button" class="btn btn-danger btn-block btn-sm" href="confirmRole/{$user->email}/{$user->administrador}">NO</a>         
            {/if}
            </td>
            <td class="col-3">
                <a type="button" class="btn btn-danger btn-block btn-sm" href="deleteUser/{$user->id_usuario}">Eliminar</a>
            </td>
        </tr>   
    {/foreach}
    </tbody>
    </table>
</div>
</div>
</div>
{include "footer.tpl"}
