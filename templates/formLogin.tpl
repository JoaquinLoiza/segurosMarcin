{include 'header.tpl'}
<form method="POST" action="verify" class="col-md-4 offset-md-4 mt-4">

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Ingrese email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>

        {if $error}
        <div class="alert alert-danger">
            {$error}
        </div>
        {/if}
        <input type="submit" class="btn btn-primary"/>
        <a class="btn btn-primary ml-5" href="recoverPassword">Olvidé mi contarseña</a>
        </form>
{include 'footer.tpl'}