<?php defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }


   function getAllCursos($id){
      $where="permisos.idUsuario =".$id;
      $this->db->select("permisos.*,   curso.*");
      $this->db->from('permisos');
      $this->db->join('curso', 'permisos.idcurso = curso.id');
      $this->db->where($where);
      //$query = $this->db->get();
      return $this->db->get();
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
   
   function getCursoByID($id){ //SOLO NECESITA EL ID PORQUE EXISTE OTRO MODEL QUE HACE LA SELECCION DE ARCHIVOS Y LOS DEMAS DATOS
      $this->db->where('id', $id);
      return $this->db->get('curso');
   }//end of getCurso


   //SE AGREGA ESTA NUEVA FUNCION PARA VALIDAR LOS USUARIOS
   function getUsuarioWhere($data){
      $where = "usuario = '".$data['user']."' AND contrasena = '".$data['contrase']."' AND disponible = 1";
      $this->db->where($where);
      return $this->db->get('usuario'); 
   }//end of func

}//end of fun?

?>