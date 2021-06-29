window.addEventListener('DOMContentLoaded', (loadPage));
'use strict';

function loadPage(){
    let app = new Vue({
        el: "#appComments", //id del elemento.
        data: { //dentro de data definimos todas nuestras variables.
            admin: 0,
            comments:[],
            average: 0,
            total:0
        },
        methods: {
            deleteComm: function(id_comment){
                deleteComment(id_comment);
            }    
        }
    });    
    let role = document.getElementById('role').value;
    let idPlan = parseInt(document.getElementById('plan').value);
    let url = "api/plans/"+idPlan+"/comments";
    //Al cargar el sitio se ejecuta esta función.
    getComments();
    
    /*  Boton que envia un nuevo comentario
        luego nos aseguramos que exista el boton en la vista
        y ejecuta el evento.
    */
    let btnSend = document.getElementById('btn-Enviar');
    if(btnSend){
        btnSend.addEventListener('click', sendComment);
    }
    
    //Trae los comentarios que corresponden a un plan  

    function getComments(){
        /*  Si el rol en el value de la eiqueta data es 1
            le asigna el valor 1 a la variable admin.
        */ 
        if( role == 1){
            app.admin=1;
        }
        fetch(url,{
        }).then(function (r) {
            /*  Si el status de la respuesta es 204, el plan no tiene comentarios
                y se le asigna el valor null a la variable comments.
            */
            if (r.status == 204){
                app.comments=null;
            }
            else if (!r.ok) {
                showAlert("error", "Oops..", "No se pudieron traer los datos del servidor");
            }else {
                return r.json();
            }
        }).then(function (json) {
        if(json != undefined){
            app.comments=json;
            calculateAverage(json);
        }  
        }).catch(function(e){
            console.log(e);
        });
    }

    //Publica un nuevo comentario con el metodo post via api rest.
    
    function sendComment(){
        event.preventDefault();
        let score = document.getElementById('puntaje');
        let content = document.getElementById('comentario');
        let idUser =  document.getElementById('id_usuario_fk');

        //Comprobar que no sean vacios los campos.
        if (content.value === ""){
            showAlert("info", "", "Debe realizar un comentario para confirmar el envio");    
            return false;
        }
        else if (score.value === ""){
            showAlert("info", "", "Debe seleccionar un puntaje para enviar el comentario");    
            return false;
        }
        else if (isNaN(idUser.value)){
            showAlert("warning", "", "Solo los ususarios registrados pueden realizar comentarios");    
            return false;
        }
        //Objeto con los datos a enviar.
        let comment = {
            "comentario":content.value,
            "puntaje": parseInt(score.value),
            "id_usuario_fk":  parseInt(idUser.value)
        };

        fetch(url,{
            "method":"POST",
            "headers":{"Content-Type": "application/json"},
            "body": JSON.stringify(comment)
        }).then(function(r){
            if(!r.ok){
                showAlert("error", "Oops..", "No se pudo enviar el comentario");
            }else{
                showAlert("success", "Envío exitoso!", "Su comentario fue publicado correctamente");
            }
        }).then(function(){
            content.value = "";
            score.value = "";
            getComments();
        }).catch(function(e){
            console.log(e);
        });
    }

    //Elimina un comentario via api
    function deleteComment(id_comment){
        fetch("api/comments/"+id_comment, {
            "method": "DELETE",
        }).then(function() {
            getComments(); 
        }).catch(function(e){
            console.log(e);
        });
    }

    //Calcula el promedio del puntaje y setea la barra de progeso
    function calculateAverage(response){
        let progressBar = document.getElementById('progress');
        let progress = 0;
        let sumScore=0;
        app.average=0;
        app.total=0;

        for (let item of response){
            sumScore+=parseInt(item.puntaje);
            app.total++;
        }
        app.average=parseFloat(sumScore/app.total).toFixed(1);
        progress=((app.average*100)/5).toFixed();
        if(progressBar != null){
            progressBar.setAttribute("style", "width: "+ progress+"%");
        }
    }

    //Muestra un mensaje al usuario, el cual se pasa por parametro.
    function showAlert(icon, title, text){
        Swal.fire({
            icon: icon,
            title: title,
            text: text,
          })
    }
    //Recarga los comentarios cada 8 segundos.
    window.setInterval(getComments, 8000);
}