<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }


   function getAllCursos(){
      $this->db->query("SELECT * FROM curso;");
      return $this->db->get('curso'); 
   }

   function createCurso($data){
      $this->db->insert('curso', $data);
   }//end of func


   function getCursoWhereInfo($data){
      $where = "nombre = '".$data['nombre']."' 
               AND colorBorde = '".$data['colorBorde']."' 
               AND colorBoton = '".$data['colorBoton']."' 
               AND colorFuente = '".$data['colorFuente']."' 
               AND contrasenia = '".$data['contrasenia']."' 
               AND publicado = '".$data['publicado']."' 
               AND fecha = '".$data['fecha']."'";      

      $this->db->where($where);
      return $this->db->get('curso'); 
   }//end of func
   
   function getCursoByID($id){
      $this->db->where('id', $id);
      return $this->db->get('curso');
   }//end of getCurso

   function updateCurso($id, $data){
      $this->db->where('id', $id);
      $this->db->update('curso', $data); 
   }

   //SE AGREGA ESTA NUEVA FUNCION PARA VALIDAR LOS USUARIOS
   function getUsuarioWhere($data){
      $where = "usuario = '".$data['user']."' AND contrasena = '".$data['contrase']."' AND disponible = 1";
      $this->db->where($where);
      return $this->db->get('usuario'); 
   }//end of func


   function deleteCurso($id){
      $where = "id = ".$id; 
      $this->db->where($where);
      $this->db->delete('curso');
   }

}//end of fun?

?>














