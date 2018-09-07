<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos_model extends CI_Model {

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

   
}//end of all?

?>














