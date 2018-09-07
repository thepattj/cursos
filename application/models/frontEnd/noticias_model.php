<?php defined('BASEPATH') OR exit('No direct script access allowed');

class noticias_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

   function getAllNoticiasAll(){
      $this->db->query("SELECT * FROM Noticias;");
      $this->db->order_by('fechaDePublicacion', 'DESC');
      return $this->db->get('Noticias'); 
   }//end of Noticias

   function getAllNoticias(){
      $this->db->limit(4);
      $this->db->query("SELECT * FROM Noticias;");
      $this->db->order_by('fechaDePublicacion', 'DESC');
      return $this->db->get('Noticias'); 
   }//end of Noticias

   function getNoticiaByID($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      return $this->db->get('Noticias');
   }//end of Url

}

?>