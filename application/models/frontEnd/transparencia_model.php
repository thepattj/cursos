<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transparencia_model extends CI_Model {

   function __construct(){
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

   function getAllFomixAnio(){
      $this->db->select('YEAR(fechaPublicacion) as anio');
      $this->db->order_by('fechaPublicacion', 'DESC');
      return $this->db->get('FOMIX'); 
   }

   function getAllFomixID(){
      $this->db->select('id as id');
      $this->db->order_by('fechaPublicacion', 'DESC');
      return $this->db->get('FOMIX'); 
   }

   function getAllFomix(){
      $this->db->query("SELECT * FROM FOMIX;");
      $this->db->order_by('fechaPublicacion', 'DESC');
      return $this->db->get('FOMIX'); 
   }

   function getAllTransparencia(){
      $this->db->query("SELECT * FROM Transparencia;");
      return $this->db->get('Transparencia');      
   }

   function getAllSubTransparencia($id){
      $where = "idTransparencia = ".$id;      
      $this->db->where($where);
      return $this->db->get('subTransparencia'); 
   }

   function getSubTransparenciaIdeWhere($data){
      $where = "idTransparencia = '".$data['idTransparencia']."' 
               AND subtitulo = '".$data['subtitulo']."'";      
      $this->db->where($where);
      return $this->db->get('subTransparencia');
   }

   function getSubTransparenciaWhere($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      return $this->db->get('subTransparencia');
   }

   function getTransparenciaWhere($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      return $this->db->get('Transparencia');
   }

   /**    -----------------------------------  **/
   /**    ---- SubCategoriaTransparencia ----  **/
   /**    -----------------------------------  **/

   function getSubCategoriaTransparenciaIdeWhere($data){
      $where = "nombre = '".$data['nombre']."' 
               AND nombreTipo = '".$data['nombreTipo']."' 
               AND resumen = '".$data['resumen']."' 
               AND resumenTipo = '".$data['resumenTipo']."'";     
      $this->db->where($where);
      return $this->db->get('SubCategoriaTransparencia');
   }

   function getSubCategoriaTransparenciaWhere($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      return $this->db->get('SubCategoriaTransparencia');
   }

   /**    -----------------------------------  **/
   /**    -------------- Indice -------------  **/
   /**    -----------------------------------  **/

   function getIndiceWhere($data){
      $where = "idSujeto = '".$data['idSujeto']."'
               AND categoria = '".$data['categoria']."'";     
      $this->db->where($where);
      return $this->db->get('Indice');
   }

   function getIndiceIdeWhere($data){
      $where = "idSujeto = '".$data['idSujeto']."'
               AND categoria = '".$data['categoria']."' 
               AND orden = '".$data['orden']."' 
               AND tipo = '".$data['tipo']."' 
               AND idHijo = '".$data['idHijo']."'";        
      $this->db->where($where);
      return $this->db->get('Indice');
   }

   function getIndiceWhereSubCat($data){
      $where = "idSujeto = '".$data['idSujeto']."'
               AND tipo = '".$data['tipo']."' 
               AND categoria = '".$data['categoria']."'";     
      $this->db->where($where);
      return $this->db->get('Indice');
   }

   /**    -----------------------------------  **/
   /**    --------------- Url ---------------  **/
   /**    -----------------------------------  **/


   function getUrlWhere($data){
      $where = "nombre = '".$data['nombre']."'
               AND url = '".$data['url']."'";     
      $this->db->where($where);
      return $this->db->get('Url');
   }//end of Url

   function getUrlByID($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      return $this->db->get('Url');
   }//end of Url
   

}

?>