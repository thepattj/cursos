<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

   /**    ---------------------------------------  **/
   /**    --------- S E R V I C I O S -----------  **/
   /**    ---------------------------------------  **/
 
   function getAllServicios(){
      $this->db->query("SELECT * FROM servicio;");
      return $this->db->get('servicio'); 
   }

   function readServicio($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      return $this->db->get('servicio'); 
   }

   function getServicioWhereUrl($rul){
      $where = "url = '".$rul."'";      
      $this->db->where($where);
      return $this->db->get('servicio'); 
   }

   function updateServicio($id, $data){
      $this->db->where('id', $id);
      $this->db->update('servicio', $data); 
   }

   function createServicio($data){
      $this->db->insert('servicio', $data);
   }//end of categoria

   function getServicioWhereInfo($data){
      $where = "nombre = '".$data['nombre']."' AND url = '".$data['url']."'";      
      $this->db->where($where);
      return $this->db->get('servicio'); 
   }

   function deleteServicio($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('servicio');
   }


   /**    ---------------------------------------  **/
   /**    --------- MANUAL DE USUARIO -----------  **/
   /**    ---------------------------------------  **/
 

   function readManual($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('manual'); 
   }

   function updateManual($id, $data){
      $this->db->where('id', $id);
      $this->db->update('manual', $data); 
   }



   /**    ------------------------------  **/
   /**    --------- FORMATOS -----------  **/
   /**    ------------------------------  **/

   function getAllFormatos(){
      $this->db->query("SELECT * FROM formato;");
      return $this->db->get('formato'); 
   } 

   function readFormato($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('formato'); 
   }

   function createFormato($data){
      $this->db->insert('formato', $data);
   }//end of categoria

   function updateFormato($id, $data){
      $this->db->where('id', $id);
      $this->db->update('formato', $data); 
   }

   function deleteFormato($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('formato');
   }

   function getFormatowhereInfo($data){
      $where = "nombre = '".$data['nombre']."' AND descripcion = '".$data['descripcion']."'";      
      $this->db->where($where);
      return $this->db->get('formato'); 
   }

}//end of model

?>











