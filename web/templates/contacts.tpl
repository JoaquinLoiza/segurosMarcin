{include "header.tpl" }
<div class="container mt-4 col-5">
<div class="card">
    <h5 class="card-header bg-dark info-color white-text text-center py-4">
        <strong>Contactenos</strong>
    </h5>
    <div class="card-body px-lg-5 pt-0">
        <form class="text-center" style="color: #757575;" method="POST" action="home">
            <div class="md-form mt-3">
                <input type="text" id="materialContactFormName" class="form-control">
                <label for="materialContactFormName">Nombre</label>
            </div>
            <div class="md-form">
                <input type="email" id="materialContactFormEmail" class="form-control">
                <label for="materialContactFormEmail">E-mail</label>
            </div>
            <div class="md-form">
                <textarea id="materialContactFormMessage" class="form-control md-textarea" rows="3"></textarea>
                <label for="materialContactFormMessage">Mensaje</label>
            </div>
            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Enviar</button>
        </form>
    </div>
  </div>
</div>
{include "footer.tpl"}