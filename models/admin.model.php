<?php
require_once 'models/base.model.php';
class AdminModel extends BaseModel{
    private $db;
    public function __construct(){
        $this->db=$this->createConection();  
    }

    //Inserta una categoria con su imagen.
    public function insertCategory($category,$image,$nameImg){
        $path_img = null;
        if($image){
            $path_img = $this->uploadImage($image, $nameImg);
        }
        $sentence = $this->db->prepare("INSERT INTO categorias(categoria, imagen) VALUES(?,?)");
        $sentence->execute([$category,$path_img]);
    }

    //Inserta un plan correspondiente a una categoria.
    public function insertPlan($plan,$coverange,$description, $id_category){
        $sentence = $this->db->prepare("INSERT INTO planes (plan, cobertura, descripcion, id_categoria_fk) VALUES (?,?,?,?)");
        $sentence->execute([$plan,$coverange,$description, $id_category]);
    }

    //Elimina un plan de la tabla planes.
    public function deletePlan($id){
        $sentence=$this->db->prepare("DELETE FROM planes  WHERE id_planes=?");
        $sentence->execute([$id]);
    }

    //Elimina una categoria de la tabla categorias.
    public function deleteCategory($id){
        $sentence=$this->db->prepare("DELETE FROM categorias  WHERE id_categoria=?");
        $sentence->execute([$id]);
    }

    //Guarda la edicion de una categoria.
    public function saveEditCategory($name,$id_category,$nameImg=null,$image=null){
        if($image){
            $path_img = $this->uploadImage($image, $nameImg);
        }
        //Si no existe la imagen solo envia el nuevo valor de categoria.
        if(!$image){
            $sentence = $this->db->prepare("UPDATE categorias SET categoria =  ? WHERE categorias.id_categoria = ?");
            $sentence->execute([$name,$id_category]);
        
        }
        //Si existe una imagen setea ambos valores.
        else{
            $sentence = $this->db->prepare("UPDATE categorias SET categoria =  ?, imagen = ?  WHERE categorias.id_categoria = ?");
            $sentence->execute([$name,$path_img,$id_category]);
        }
    }

    //Guarda la edicion de un plan en la base de datos.
    public function saveEditPlan($plan, $coverange, $description, $id_plans){
        $sentence = $this->db->prepare("UPDATE planes SET plan =  ?, cobertura = ?, descripcion = ?  WHERE planes.id_planes = ?");
        $sentence->execute([$plan, $coverange, $description, $id_plans]); 
    }

    //Setea la ruta junto con un nombre unico y la extension; luego mueve el archivo a esa ruta.
    private function uploadImage($image, $nameImg){
    $target = 'uploads/images/' . uniqid("", true) . "." . strtolower(pathinfo($nameImg, PATHINFO_EXTENSION));
    move_uploaded_file($image, $target);
    return $target;
    }
}