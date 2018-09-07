<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ComunidadCientifica_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

   function getAllCentros(){
      $this->db->query("SELECT * FROM CentrosDeInvestigacion;");
      return $this->db->get('CentrosDeInvestigacion'); 
   }

   function getAllCentrosWhere($tipo){
      $where = "tipo = '".$tipo."'";      
      $this->db->where($where);
      return $this->db->get('CentrosDeInvestigacion'); 
   }


}

?>