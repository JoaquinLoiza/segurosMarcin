<?php
    require_once ('views/base.view.php');  
    class InsurancesView extends BaseView{
        private $smarty;
        public function __construct(){
            $this->smarty = $this->baseView();
        }
        public function showInsurances($insurances){
            $this->smarty->assign('insurances', $insurances);
            $this->smarty->display('insurances.tpl');
        }
        public function showContacts(){
            $this->smarty->display('contacts.tpl');
        }
        public function showAboutUs(){
            $this->smarty->display('aboutUs.tpl');
        }
        public function showPlans($plans){
            $this->smarty->assign('plans', $plans);
            $this->smarty->display('plans.tpl');
        }
        public function showCoverage($coverages,$plans){
            $this->smarty->assign('coverages', $coverages);
            $this->smarty->assign('plans',$plans);
            $this->smarty->display('coverages.tpl');
        }
}