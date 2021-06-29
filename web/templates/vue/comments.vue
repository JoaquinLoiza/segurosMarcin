{literal}
<section id="appComments">
    
    <div class="col-md-6 offset-md-3 mt-4">
        <div v-if="comments != null" class="bg-light pl-3 pr-3 mb-4 rounded border border-danger text-dark">
            <h2 class="pt-2">Promedio: {{average}}</h2>
            <div class="progress mb-2">
                <div id="progress" class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuemin="1" aria-valuemax="5"></div>
            </div>
            <p>En un total de {{total}} comentarios</p>
        </div>
        <div v-else-if="comments == null">
            <p class="text-muted">Este plan aún no posee opiniones de los usuarios</p>
        </div>
        <div v-for="comment in comments" class="mb-4 bg-light rounded border border-danger">
            <div class="d-flex justify-content-between form-group pl-3 pt-3 pb-2 bg-secondary rounded-top">
                <div>
                    <p><i class="material-icons">person </i> {{comment.usuario}}</p>
                </div>
                <div class="pr-3">
                    <p v-if="comment.puntaje == 1">⭐</p>
                    <p v-else-if="comment.puntaje == 2">⭐⭐</p>
                    <p v-else-if="comment.puntaje == 3">⭐⭐⭐</p>
                    <p v-else-if="comment.puntaje == 4">⭐⭐⭐⭐</p>
                    <p v-else-if="comment.puntaje == 5">⭐⭐⭐⭐⭐</p>
                </div>
            </div>
            <div class="d-flex justify-content-between form-group text-dark pl-3 pb-3">
                {{comment.comentario}}
                <div v-if="admin == 1" class="form-group">
                    <button v-on:click="deleteComm(comment.id_comentario)" class="btn btn-danger mr-4">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</section>
{/literal}