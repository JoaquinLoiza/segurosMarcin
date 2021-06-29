{include 'header.tpl'}
<form method="POST" action="signUp" class="col-md-4 offset-md-4 mt-4">

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Ingrese email">
        </div>

        <div class="form-group">
            <label>Usuario</label>
            <input type="text" name="username" class="form-control" placeholder="Ingrese email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="**********">
        </div>

         <div class="form-group">
            <label>Confirmar Password</label>
            <input type="password" name="password2" class="form-control" placeholder="**********">
        </div>

        {if $error}
        <div class="alert alert-danger">
            {$error}
        </div>
        {/if}
        <input type="submit" class="btn btn-primary"/>
    </form>
{include 'footer.tpl'}