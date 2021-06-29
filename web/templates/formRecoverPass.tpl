{include 'header.tpl'}
<form action="confirmRecover" method="post" class="col-md-4 offset-md-4 mt-4">
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Ingrese email">
    </div>
    <div class="form-group">
        <p>Se enviará un link para recueprar la contraseña a su dirección de correo</p>
    </div>
    <input type="submit" class="btn btn-primary"/>
</form>
{include 'footer.tpl'}