<?php
    require_once ('views/base.view.php');
class UserView extends BaseView{
    private $smarty;
    public function __construct(){
        $this->smarty = $this->baseView();
    }
    public function formLogin($error=null){
        $this->smarty->assign('error',$error);
        $this->smarty->display('formLogin.tpl');
    }
    public function formRegister($error=null){
        $this->smarty->assign('error',$error);
        $this->smarty->display('formRegister.tpl');
    }
    public function showRecoverPass(){
        $this->smarty->display('formRecoverPass.tpl');
    }

    public function formChangePass($email){
        $this->smarty->assign('email',$email);
        $this->smarty->display('formChangePass.tpl');
    }
}