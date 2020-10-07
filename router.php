<?php
    require_once 'controllers/insurances.controller.php';
    require_once 'controllers/admin.controller.php';
    require_once 'controllers/user.controller.php';

    // definimos la base url de forma dinamica.
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    //definimos la accion por defecto home.
    if (empty($_GET['action'])) {
        $_GET['action'] = 'home';
    } 

    // toma la acción que viene del usuario y parsea los parámetros.
    $accion = $_GET['action']; 
    $parametros = explode('/', $accion);

    // decide que camino tomar según TABLA DE RUTEO.
    switch ($parametros[0]) {
        case 'home': 
            $controller= new InsurancesController();
            $controller->showInsurances();
        break;
        case 'seePlansCategory':
            $controller= new InsurancesController();
            $controller->showPlans($parametros[1]);
        break;
        case 'showCoverage':
            $controller= new InsurancesController();
            $controller->showCoverage($parametros[1]);
        break;
        case 'contacts':
            $controller= new InsurancesController();
            $controller->showContacts();
        break;
        case 'aboutUs':
            $controller= new InsurancesController();
            $controller->aboutUs();
        break;
        case'register':
            $controller= new UserController();
            $controller->showRegister();
        break;
        case'signUp':
            $controller=new UserController();
            $controller->signUp();
        break;
        case'login':
            $controller= new UserController();
            $controller->showLogin();
        break;
        case 'verify':
            $controller=new UserController();
            $controller->verify();
        break;
        case 'logout':
            $controller=new UserController();
            $controller->logout();
        break;  
        case 'recoverPassword':
            $controller=new UserController();
            $controller->recoverPassword();
        break;
        case 'confirmRecover':
            $controller=new UserController();
            $controller->confirmRecover();
        break;   
        case 'changePassword':
            $controller=new UserController();
            $controller->changePassword();
        break;
        case 'confirmChangePass':
            $controller=new UserController();
            $controller->confirmChangePass();
        break;
        case'showABM':
            $controller= new AdminController();
            $controller->showABM();
        break;
        case 'showAddCategory':
            $controller= new AdminController();
            $controller->showAddCategory();
        break;
        case 'insertCategory':
            $controller= new AdminController();
            $controller->addCategory(); 
        break;
        case 'showAddPlan':
            $controller= new AdminController();
            $controller->showAddplan();
        break;
        case'insertPlan':
            $controller= new AdminController();
            $controller->addPlan();    
        break;
        case 'showBMCategories':
            $controller= new AdminController();
            $controller->showBMCategories();
        break;
        case 'deleteCategory':
            $controller= new AdminController();
            $controller->deleteCategory($parametros[1]);
        break;
        case 'showBMPlans':
            $controller= new AdminController();
            $controller->showBMPlan();  
        break;
        case 'deletePlan':
            $controller= new AdminController();
            $controller->deletePlan($parametros[1]);
        break;
        case'editCategory':
            $controller=new AdminController();
            $controller->editCategory($parametros[1]);
        break;
        case'saveEditCategory':
            $controller=new AdminController();
            $controller->saveEditCategory();
        break;
        case'editPlan':
            $controller=new AdminController();
            $controller->editPlan($parametros[1]);
        break;
        case'saveEditPlan':
            $controller=new AdminController();
            $controller->saveEditPlan();
        break;
        case'showUsers':
            $controller=new AdminController();
            $controller->showUsers();
        break;
        case'deleteUser':
            $controller=new AdminController();
            $controller->deleteUser($parametros[1]);
        break;
        case'confirmRole':
            $controller=new AdminController();
            $controller->confirmRole($parametros[1], $parametros[2]);
        break;
        default:
        $controller= new InsurancesController();
        $controller->pageNotFound();
        break;
    }