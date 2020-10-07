{include 'header.tpl'}
<form method="POST" action="confirmChangePass" class="col-md-4 offset-md-4 mt-4">
        <h3>Confirme el cambio de contraseña de {$email}</h3>

        <input type="hidden" name="email" value="{$email}">
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="**********">
        </div>

         <div class="form-group">
            <label>Confirmar Password</label>
            <input type="password" name="password2" class="form-control" placeholder="**********">
        </div>
        <input type="submit" class="btn btn-primary"/>
    </form>
{include 'footer.tpl'}