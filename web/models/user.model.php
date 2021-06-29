<?php
require_once 'models/base.model.php';

class UserModel extends BaseModel{

   private $db;
   public function __construct(){
     $this->db=$this->createConection();  
   }

   //Realiza la consulata de un usuario segun email y usuario, o solo por su email.
   public function get($email,$username =null){
      if($username){
         $sentence= $this->db->prepare("SELECT * FROM usuarios WHERE usuarios.email=? || usuarios.usuario=?");
         $sentence->execute([$email,$username]); 
      }
      else{
         $sentence= $this->db->prepare("SELECT * FROM usuarios WHERE usuarios.email=?");
         $sentence->execute([$email]);
      }
      $user = $sentence->fetch(PDO::FETCH_OBJ);
      return ($user);
   }

   //Devuelve todos los usuarios exepto el que es pasado por parametro.
   public function getAll($email){
      $sentence= $this->db->prepare("SELECT * FROM usuarios WHERE usuarios.email!=?");
      $sentence->execute([$email]); 
      $users = $sentence->fetchAll(PDO::FETCH_OBJ);
      return ($users);
   }

   //Inserta un nuevo usuario.
   public function insert($email,$username,$password){
      $sentence= $this->db->prepare("INSERT INTO usuarios (email, usuario, password) VALUES(?,?,?)");
      $sentence->execute([$email,$username,$password]);
   }

   //Elimina un ususario.
   public function delete($id){
      $sentence= $this->db->prepare("DELETE FROM usuarios WHERE id_usuario=?");
      $sentence->execute([$id]);
   }

   //Cambia el rol de un ususario.
   public function confirmRole($role, $email){
      $sentence= $this->db->prepare("UPDATE usuarios SET administrador =  ? WHERE usuarios.email = ?");
      $sentence->execute([$role, $email]);
   }

   //Inserta el token a un usuario
   public function insertToken($token, $email){
      $sentence= $this->db->prepare("UPDATE usuarios SET token =  ? WHERE usuarios.email = ?");
      $sentence->execute([$token, $email]);
   }

   //devuelve el usuario donde el token coincide y borra el token
   public function verifyToken($token){
      $sentence= $this->db->prepare("SELECT * FROM usuarios WHERE usuarios.token=?");
      $sentence->execute([$token]);
      $user = $sentence->fetch(PDO::FETCH_OBJ);
      return ($user);
   }

   //Actualiza la contraseña
   public function updatePass($password, $email){
      $sentence= $this->db->prepare("UPDATE usuarios SET password = ? WHERE usuarios.email = ?");
      $sentence->execute([$password, $email]);
      $this->deleteToken($email);
   }

   //Borra el token
   public function deleteToken($email){
      $sentence= $this->db->prepare("UPDATE usuarios SET token = ? WHERE usuarios.email = ?");
      $sentence->execute(['', $email]);
   }
 }