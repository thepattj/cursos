<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_Model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

   function agregarUser($data){
      $this->db->insert('curso', $data);
   }//end of func


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


}//end of fun?

?>