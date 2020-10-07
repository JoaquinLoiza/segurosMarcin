{include 'header.tpl'}
{if $error}
<div class="alert alert-danger alert_error" role="alert">
  <h4 class="alert-heading">ERROR!</h4>
  <p>{$error}</p>
  <hr>
  <a class="btn btn-danger" href="showABM">OK</a>
</div>
{else}
<div class="alert alert-danger alert_error" role="alert">
  <h4 class="alert-heading">ERROR!</h4>
  <p>Ha ocurrido un error, por favor intentelo nuevamente</p>
  <hr>
  <a class="btn btn-danger" href="showABM">OK</a>
</div>   
{/if}
{include 'footer.tpl'}