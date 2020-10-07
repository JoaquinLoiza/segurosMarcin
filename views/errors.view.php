<?php
    require_once ('views/base.view.php');

    class ErrorsView extends BaseView{
        private $smarty;
        public function __construct(){
            $this->smarty = $this->baseView();
        }
        public function pageNotFound(){
            $this->smarty->display('pageNotFound.tpl');
        }
        public function showError($error= null){
            $this->smarty->assign('error',$error);
            $this->smarty->display('showError.tpl');
        }
}