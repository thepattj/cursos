<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Organizacion_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

   /**    -------------------------------------  **/
   /**    ----------- Organizacion ------------  **/
   /**    -------------------------------------  **/

   function getAllFromOrganizacion(){
      $this->db->query("SELECT * FROM organizacion;");
      return $this->db->get('organizacion'); 
   }

   function getOrganizacionWhere($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('organizacion'); 
   }

   function updateOrganizacion($id, $data){
      $this->db->where('id', $id);
      $this->db->update('organizacion', $data); 
   }


   /**    -------------------------------  **/
   /**    ------------ Areas ------------  **/
   /**    -------------------------------  **/

   function getAllFromArea(){
      $this->db->query("SELECT * FROM area;");
      return $this->db->get('area'); 
   }

   function getAreaWhere($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('area'); 
   }

   function updateArea($id, $data){
      $this->db->where('id', $id);
      $this->db->update('area', $data); 
   }



}//end of model

?>