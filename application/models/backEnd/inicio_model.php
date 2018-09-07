<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

   /**    -------------------------------  **/
   /**    ----------- BANNERS ------------  **/
   /**    -------------------------------  **/

   function getAllFromBanner(){
      $this->db->query("SELECT * FROM banner;");
      return $this->db->get('banner'); 
   }

   function getBannerWhere($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('banner'); 
   }

   function createBanner($data){
      $this->db->insert('banner', $data);
   }//end of categoria

   function updateBanner($id, $data){
      $this->db->where('id', $id);
      $this->db->update('banner', $data); 
   }

   function deleteBanner($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('banner');
   }

   function getBannerwhereInfo($data){
      $where = "tipo = '".$data['tipo']."' AND texto = '".$data['texto']."'";      
      $this->db->where($where);
      return $this->db->get('banner'); 
   }

   /**    -------------------------------  **/
   /**    ----------- Calendarios ------------  **/
   /**    -------------------------------  **/

   function getAllCalendarios(){
      $this->db->query("SELECT * FROM calendario;");
      return $this->db->get('calendario'); 
   }

   function readCalendario($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('calendario'); 
   }

   function updateCalendario($id, $data){
      $this->db->where('id', $id);
      $this->db->update('calendario', $data); 
   }


   /**    -------------------------------  **/
   /**    ----------- FRASE ------------  **/
   /**    -------------------------------  **/

   function readFrase($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      return $this->db->get('frase'); 
   }

   function updateFrase($id, $data){
      $this->db->where('id', $id);
      $this->db->update('frase', $data); 
   }


   /**    ------------------------------------  **/
   /**    ----------- LOGIN FRONT-------------  **/
   /**    ------------------------------------  **/

   function verificarUsuario($username){
      $where = "numeroColaborador = '".$username."';";      
      $this->db->where($where);
      return $this->db->get('colaboradores'); 
   }

   /**    -----------------------------------  **/
   /**    ----------- LOGIN BACK-------------  **/
   /**    -----------------------------------  **/

   function verificarUsuarioBack($username, $password){
      $where = "numeroDeEmpleado = '".$username."' AND password ='".$password."'";      
      $this->db->where($where);
      return $this->db->get('usuarioBack'); 
   }

   /**    -----------------------------------  **/
   /**    ----------- VISTAS -------------  **/
   /**    -----------------------------------  **/

   function getUsuariosUp(){
      $where = "up = 1";      
      $this->db->where($where);
      return $this->db->get('colaboradores'); 
   }

   function getUsuariosDown(){
      $where = "up = 0";      
      $this->db->where($where);
      return $this->db->get('colaboradores'); 
   }

   function getVistasCategoria($lugar){
      $where = "lugar = '".$lugar."'";      
      $this->db->where($where);
      return $this->db->get('vistas'); 
   }

   function getAllVistasDate($fecha){
      $where = "fecha = '".$fecha."'";      
      $this->db->where($where);
      return $this->db->get('vistas'); 
   }


}//end of model

?>











