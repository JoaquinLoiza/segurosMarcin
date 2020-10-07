<?php
require_once 'models/insurances.model.php';
require_once 'models/comments.model.php';
require_once 'api.view.php';

class CommentsController{
    private $modelComments;
    private $modelInsurances;
    private $view;
    private $data;

    public function __construct() {
        $this->modelComments =  new CommentsModel();
        $this->modelInsurances = new InsurancesModel();
        $this->view = new APIView();
        //Permite leer datos del cuerpo solicitado.
        $this->data = file_get_contents("php://input");
    }

    //Convierte un string codificado en JSON a una variable de PHP.
    public function getData(){
        return json_decode($this->data);
    }

    //Trae los comentarios segun el plan y se los envia a la vista.
    public function getComments($params = []){
        $idPlan = $params[':ID'];
        $plan = $this->modelInsurances->getPlan($idPlan);
        $comments = $this->modelComments->getAll($idPlan);

        if(empty($comments) && !empty($plan)){
            $this->view->response("No existen comentarios para el plan con id {$idPlan}", 204);
            die();
        }
        else if(empty($plan)){
            $this->view->response("No existe plan con id {$idPlan}", 404);
            die();
        }
        $this->view->response($comments,200);
    }

    //Agrega comentarios en la base de datos.
    public function addComment($params = []){

        //Devuelve el objeto JSON enviado por POST.
        $body = $this->getData();
        $comment = $body->comentario;
        $idPlan = $params[':ID'];
        $score = $body->puntaje;
        $idUser = $body->id_usuario_fk;
        //Inserta el comentario.
        $comment_id = $this->modelComments->insert($comment, $score, $idUser, $idPlan);
        if($comment_id){
            $this->view->response("Se agrego el comentario con id: " . $comment_id, 200);
        }else{
            $this->view->response("error", 404);
        }
    }

    //Elimina un comentario de la base de datos.
    public function deleteComments($params = []){
        $idComment = $params[':ID'];
        $comment=$this->modelComments->get($idComment);
        if(!empty($comment)){
            $this->modelComments->delete($idComment);
            $this->view->response("El comentario ha sido eliminado con exito", 200);
        }
        else{
            $this->view->response("El comentario ha eliminar no se encontro", 404);
        }
    }
}