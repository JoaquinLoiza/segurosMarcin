<?php
require_once 'models/base.model.php';
    class InsurancesModel extends BaseModel{
        private $db;
        public function __construct(){
          $this->db=$this->createConection();  
        }

        //Hace el pedido de todas las categorias.
        public function getAllCategory(){
            $sentence = $this->db->prepare("SELECT * FROM categorias"); 
            $sentence->execute(); 
            $categories = $sentence->fetchAll(PDO::FETCH_OBJ);
            return($categories);
        }

        //Realiza la consulta de todos los planes de una categoria.
        public function getPlans($id){
            $sentence = $this->db->prepare("SELECT categorias.categoria, planes.id_planes, planes.plan,
             planes.cobertura, planes.descripcion, planes.id_categoria_fk FROM categorias JOIN planes ON 
            categorias.id_categoria=planes.id_categoria_fk WHERE categorias.id_categoria=?");
            $sentence->execute([$id]); 
            $plans = $sentence->fetchAll(PDO::FETCH_OBJ);
            return ($plans);
        }

        //Hace el pedido de un plan.
        public function getPlan($id_plan){
            $sentence = $this->db->prepare("SELECT planes.id_planes, planes.plan, 
            planes.cobertura, planes.descripcion , planes.id_categoria_fk FROM categorias JOIN planes ON 
            categorias.id_categoria=planes.id_categoria_fk WHERE planes.id_planes=?");
            $sentence->execute([$id_plan]); 
            $plan = $sentence->fetch(PDO::FETCH_OBJ);
            return ($plan);
        }

        //Trae todos los planes de todas las categorias.
        public function getAllPlans(){
            $sentence=$this->db->prepare("SELECT * FROM planes");
            $sentence->execute();
            $plans=$sentence->fetchAll(PDO::FETCH_OBJ);
            return($plans);    
        }

        //Realiza el pedido de una categoria segun su id.
        public function getCategory($id){
            $sentence = $this->db->prepare("SELECT * FROM categorias WHERE categorias.id_categoria=?"); 
            $sentence->execute([$id]); 
            $category = $sentence->fetch(PDO::FETCH_OBJ);
            return($category);
        }
 }  