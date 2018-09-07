<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model {

   function __construct(){
      parent::__construct();
      $this->load->database();
   }//end of fun


   function getAllCursos(){
      $this->db->query("SELECT * FROM curso;");
      return $this->db->get('curso'); 
   }//end

   
   function verificarExistencia($id){
      $this->db->where('id', $id);
      return $this->db->get('curso');
   }//end of getCurso




}//end of all?

?>














