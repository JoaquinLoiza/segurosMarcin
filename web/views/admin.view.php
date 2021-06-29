<?php
require_once ('views/base.view.php');

class AdminView extends BaseView{
    private $smarty;
    public function __construct(){
        $this->smarty = $this->baseView();
    }
    public function showABM(){
        $this->smarty->display('optionsAdmin.tpl');
    }
    public function formAddCategory($categories){
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('formAddCategory.tpl');
    }
    public function showAddPlan($categories, $plans){
        $this->smarty->assign("categories", $categories);
        $this->smarty->assign("plans", $plans);
        $this->smarty->display('formAddplan.tpl');
    }
    public function showAllPlans($plans){
        $this->smarty->assign('plans', $plans);
        $this->smarty->display('BMPlans.tpl');
    }
    public function showAllCategories($categories){
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('BMCategories.tpl');
    }
    public function editCategory($category){
        $this->smarty->assign('category',$category);
        $this->smarty->display('editCategory.tpl');
    }
    public function editPlan($plan){
        $this->smarty->assign('plan',$plan);
        $this->smarty->display('editPlan.tpl');
    }
    public function showAllUsers($users){
        $this->smarty->assign('users',$users);
        $this->smarty->display('showUsers.tpl');
    }
}