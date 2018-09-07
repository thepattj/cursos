<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Colaborador_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }


   /**    -------------------------------  **/
   /**    -------- COLABORADORES --------  **/
   /**    -------------------------------  **/


   function getUsuario($IDE){
      $where = "usuario = '".$IDE."'";      
      $this->db->where($where);
      return $this->db->get('colaboradores'); 
   }

   function aceptarTerminosC($IDE, $data){
      $this->db->where('id', $IDE);
      $this->db->update('archivo', $data); 
   }

   function getUsuarioByIDE($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('colaboradores'); 
   }

}//end of model

?>











