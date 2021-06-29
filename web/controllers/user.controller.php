<?php
require_once 'models/user.model.php';
require_once 'views/user.view.php';
require_once 'views/errors.view.php';

class UserController{
    private $model;
    private $view;
    private $viewError;
    public function __construct(){
        $this->model=new UserModel();
        $this->view=new UserView();
        $this->viewError=new ErrorsView();
    }

    //Chequea si una sesion esta activa, de lo contrario muestra el formulario login. 
    public function showLogin(){
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
            if(isset($_SESSION['IS_LOGGED'])){
                header("Location: ".BASE_URL.'showABM');
            }
            else{
                $this->view->formLogin();
            }
    }

    //Verifica que el email y password ingresados sean correctos.
    public function verify($email = null, $password = null){
        /*Si los datos no vienen por POST es porque llegaron de formulario de 
        registro y loquea al usuario.*/
        if(!empty($_POST)){
            $email=$_POST['email'];
            $password=$_POST['password'];
        }
        $user=$this->model->get($email);

        /*Comprueba que el usuario exista y que la contraseña sea igual a la db
           y en ese caso lo loguea.*/
        if ($user && password_verify($password, $user->password)){
            $this->login($user);
        }
        else{
            $this->view->formLogin("Los datos son incorrectos");
        }
    }

    //Muestra el formulario para registrarse.
    public function showRegister(){
        $this->view->formRegister();
    }

    //Recoge los datos de formulario, comprueba que los datos sean correctos y lo registra.
    public function signUp(){
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $password2=$_POST['password2'];
        $user=$this->model->get($email,$username);
        if(!empty($email) && !empty($username) && $password==$password2 && empty( $user)){
            $Encryted=password_hash($password,PASSWORD_DEFAULT);
            $this->model->insert($email,$username,$Encryted);
            $this->verify($username, $password);
        }
        else if(empty($email) || empty($username) || empty($password) || empty($password2)){
            $this->view->formRegister("Todos los campos deben estar completos");
        }
        else if($password != $password2){
            $this->view->formRegister("Las contraseñas ingresadas no coinciden");
        }
        else if($user->email == $email){
            $this->view->formRegister("La direccion de email ya se encuetra registrada");
        }
        else if($user->usuario == $username){
            $this->view->formRegister("El nombre de usuario ya existe");
        }
    }

    //Cierra una sesion.
    public function logout() {
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
        session_destroy();
        header("Location: " . BASE_URL . 'home');
    }

    //Inicia y setea los datos en la sesion.
    public function login($user) {
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
        $_SESSION['IS_LOGGED'] = true;
        $_SESSION['ID_USER'] = $user->id_usuario;
        $_SESSION['EMAIL'] = $user->email;
        $_SESSION['ROLE'] = $user->administrador;
        header("Location: " . BASE_URL . 'home');
    }

    //Muestra un campo para recuperar contraseña.
    public function recoverPassword(){
        $this->view->showRecoverPass();
    }

    //Confirma si el usuario existe y envia el link de recuperacion.
    public function confirmRecover(){
        $email=$_POST['email'];
        $user=$this->model->get($email);
        if($user != false){
            $token=uniqid();
            $this->model->insertToken($token, $email);
            
            var_dump("http://localhost/web2/TrabajoWeb2/changePassword?token={$token}"); die();
        }
        else{
            $this->viewError->showError("El email ingresado no está registrado en este sitio");
        }
    }

    //Recupera el token del link, recupera el usuario y da paso a cambiar el password.
    public function changePassword(){
        $token = $_GET ['token'];
        $user= $this->model->verifyToken($token);
        $email=$user->email;
        if($user =! false){
            $this->view->formChangePass($email);
        }
    }

    //Confirma la nueva contraseña.
    public function confirmChangePass(){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $password2=$_POST['password2'];
        if ($password == $password2){
            $Encryted=password_hash($password,PASSWORD_DEFAULT);
            $this->model->updatePass($Encryted, $email);
            header("Location: " . BASE_URL . 'login');
        }
        else{
            $this->viewError->showError("Las contraseñas ingresadas no coinciden");
        }
    }
}