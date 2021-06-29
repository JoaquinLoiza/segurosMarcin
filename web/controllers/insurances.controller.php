<?php
    require_once 'models/insurances.model.php';
    require_once 'views/insurances.view.php';
    require_once 'views/errors.view.php';

    class InsurancesController{
        private $model;
        private $view;
        private $viewError;
        public function __construct(){
            $this->model=new InsurancesModel();
            $this->view=new InsurancesView();
            $this->viewError=new ErrorsView();
        }
        
        //Muestra las categorias.
        public function showInsurances(){
            $categories=$this->model->getAllCategory();
            $this->view->showInsurances($categories);
        }

        //Muestra el formulario de contacto.
        public function showContacts(){
            $this->view->showContacts();
        }

        //Muestra la seccion acerca de nosotros.
        public function aboutUs(){
            $this->view->showAboutUs();
        }

        //Muestra los planes segun la categoria.
        public function showPlans($id){
            $planes=$this->model->getPlans($id);
            if(!empty($planes)){
                $this->view->showPlans($planes);
            }
            else{
                $this->pageNotFound();
            }
        }

        //Muestra la cobertura de un plan.
        public function showCoverage($id_plan){
            $coverage=$this->model->getPlan($id_plan);
            if($coverage != false){
                $planes=$this->model->getPlans($coverage->id_categoria_fk);
                $this->view->showCoverage($coverage, $planes);
            }
            else{
                $this->pageNotFound();
            }
        }

        //Muestra el error 404.
        public function pageNotFound(){
            $this->viewError->pageNotFound();
        }
}