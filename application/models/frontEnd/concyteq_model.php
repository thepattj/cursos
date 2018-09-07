<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Concyteq_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

   function getAge()
   {
      $this->db->where('institucion', 'uno');
      return $this->db->get('Posgrados');
   }

   function getAllContactos()
   {
      $this->db->query("SELECT * FROM Contactos;");
      return $this->db->get('Contactos'); 
   }

   function readAreaPublicaciones($id){
      $this->db->where('id', $id);
      return $this->db->get('areaPublicaciones');
   }

   function getAllPublicacionWhere($id){
      $where = "idAreaPublicacion = ".$id;      
      $this->db->where($where);
      return $this->db->get('Publicacion'); 
   }

}

?>