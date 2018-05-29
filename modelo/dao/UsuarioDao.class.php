<?php

require_once ROOT_DIR.'/modelo/dao/AbstractDao.class.php';
require_once ROOT_DIR.'/modelo/dao/DBConexion.class.php';

class UsuarioDao implements AbstractDao  {
    private $conexion;
    
    function __construct(){
        $this->conexion = DBConexion::getInstance();
    }
    
    public function getAll(){
        
        $query = "SELECT u.email, u.clave, u.nombre, p.descripcion
                  FROM usuario u, perfil p
                  WHERE u.id_perfil =  p.id_perfil";
        
         
        $listado = array();
        $statement = $this->conexion->prepare($query);
        $statement->execute();
        
        while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $usr = new Usuario($row["email"], $row["clave"]);
            $perfil = new Perfil($row["id_perfil"]);
            $perfil->setDescripcion($row["descripcion"]);
            $usr->setNombre($row["nombre"]);
            $usr->setEmail($row["email"]);
            $usr->setPerfil($perfil);
            array_push($listado, $usr);
        }
        
        return $listado;
    }
    
    public function getById($idUsuario) {
        $query = "SELECT email, clave, nombre"
                    ."FROM usuario "
                    ."WHERE email = ?";
        $usuario = null;
        $statement = $this->conexion->prepare($query);
        $statement->bindParam(1, $idUsuario);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        
        if($result != null) {
            $usuario = new Usuario($result["id_perfil"]);
            $usuario->setEmail($result["email"]);
            $usuario->setNombre($result["nombre"]);
        }
        
        return $usuario;
    }
    
    public function insert($usuario) {
        
    }
    
    public function update($usuario) {
        
    }
    
    public function delete($idUsuario) {
        
    }
    
    public function autenticate($email, $clave) {
       $preparedStmt = $this->conexion->prepare("SELECT email, clave, nombre FROM usuario WHERE email = ? AND clave = PASSWORD(?)");
        
        if($preparedStmt != false) {
            $preparedStmt->bindParam(1,$email);
            $preparedStmt->bindParam(2,$clave);
            $preparedStmt->bindColumn("email", $dbEmail);
            $preparedStmt->bindColumn("clave", $dbClave);
            $preparedStmt->bindColumn("nombre",$dbNombre);            
            $preparedStmt->execute();

            if($preparedStmt->fetch()) {
                $user = new Usuario($dbNombre, $dbClave, $dbEmail);
            } else {
                $user = null;
            }
        } else {
            throw new Exception('no se pudo preparar la consulta a la base de datos: '.$this->conexion->error);
        }
        
        return $user;
    }
}
