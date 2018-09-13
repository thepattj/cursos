<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_Model extends CI_Model {
    function __construct(){
        parent::__construct();
        //Se carga la bd .
        $this->load->database();
    }
    
    function getAllUsuarios(){
      $this->db->query("SELECT * FROM curso;");
      return $this->db->get('usuario'); 
    }

   function createUsuario($data){
      $this->db->insert('usuario', $data);
   }//end of func
    

    //USUARIOS DISTINTOS A LOS QUE ESTAN EN CURSOS PARA PODER AGREGAR EN UN CURSO.
   function getUsuarios($idCurs){

      $where="permisos.idcurso <> ".$idCurs." AND usuario.disponible = 1 AND permisos.idusuario NOT IN (SELECT permisos.idusuario FROM permisos WHERE permisos.idcurso = ".$idCurs.")";
      $this->db->select("DISTINCT(usuario.usuario), usuario.id");
      $this->db->from('usuario');
      $this->db->join('permisos', 'usuario.id = permisos.idusuario');
      $this->db->where($where);

      return $this->db->get();
   }

   //SE AGREGA ESTA NUEVA FUNCION PARA VALIDAR LOS USUARIOS CON SUS CURSOS
   function getUsuarioJoin($id){
      $where="permisos.idCurso =".$id. " AND usuario.disponible = 1";
      $this->db->select("usuario.id, usuario.usuario, permisos.activoCurso");
      $this->db->from('usuario');
      $this->db->join('permisos', 'usuario.id = permisos.idusuario');
      $this->db->where($where);
      //$query = $this->db->get();
      return $this->db->get();
   }//end of func

   function deleteUser($id, $idc){
      $data = array('activoCurso' => '0' );
      $where = "idUsuario = ".$id." AND idcurso = ".$idc;
      $this -> db -> where($where);
      $this -> db -> update('permisos', $data);
   }
    
    
//    USUARIOS SEGUN PERMISOS
   function getUseru($id, $curso){
      $where="permisos.idCurso =".$curso. " AND usuario.id =".$id;
      $this->db->select("usuario.usuario, usuario.contrasena, permisos.activoCurso");
      $this->db->from('usuario');
      $this->db->join('permisos', 'usuario.id = permisos.idusuario');
      $this->db->where($where);
      //$query = $this->db->get();
      return $this->db->get();
   }

   function updateUsuario($data, $id){
      $this->db->where('id', $id);
      $this->db->update('usuario', $data);
   }

   function updatePermiso($id, $idCurso, $permiso){
      $data = array('activoCurso' =>  $permiso);
      $where = "idUsuario = ".$id." AND idcurso = ".$idCurso;
      $this -> db -> where($where);
      $this -> db -> update('permisos', $data);
     //echo "wher".$where."-permiso".$permiso;
   }//


   function readUsuarioWhere($data){
      $where = "usuario = '".$data['usuario']."' AND contrasena = '".$data['contrasena']."'";
      $this->db->select("id");
      $this->db->where($where);
      return $this->db->get('usuario');
   }

   function createPermiso ($idcurso, $idusuario){
      $data = array(
         'idcurso' => $idcurso,
         'idusuario' => $idusuario,
         'activoCurso'=> '1' );
      $this->db->insert('permisos', $data);

   }


}//end of fun?

?>