<?php defined('BASEPATH') OR exit('No direct script access allowed');

class inicio_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

   function getAllEvento(){
      $this->db->query("SELECT * FROM Evento;");
      return $this->db->get('Evento'); 
   }
}

?>