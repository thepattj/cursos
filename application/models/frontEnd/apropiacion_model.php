<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Apropiacion_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

/*
   function getAge()
   {
      $this->db->where('institucion', 'uno');
      return $this->db->get('Posgrados');
   }

*/


   /**    -------------------------------------  **/
   /**    -------- AreaPublicaciones ----------  **/
   /**    -------------------------------------  **/


   function getAllAreaPublicaciones(){
      $this->db->query("SELECT * FROM areaPublicaciones;");
      return $this->db->get('areaPublicaciones'); 
   }

   function getAreaPublicacion($ID){
      $where = "id = ".$ID;      
      $this->db->where($where);
      return $this->db->get('areaPublicaciones'); 
   }


   /**    -------------------------------  **/
   /**    -------- Publicacion ----------  **/
   /**    -------------------------------  **/


   function getAllRevistasWhere($varsu){
      $where = "idAreaPublicacion = ".$varsu;      
      $this->db->where($where);
      return $this->db->get('Publicacion'); 
   }


   /**    -------------------------------  **/
   /**    -------- Categoria ------------  **/
   /**    -------------------------------  **/


   function getAllCategorias(){
      $this->db->query("SELECT * FROM Categoria;");
      return $this->db->get('Categoria'); 
   }

   function getCategoriaWhere($subcategoria){
      $where = "id = ".$subcategoria;      
      $this->db->where($where);
      return $this->db->get('Categoria'); 
   }


   /**    --------------------------------  **/
   /**    -------- SubCategoria ----------  **/
   /**    --------------------------------  **/


   function getAllSubCategorias($ID){
      $where = "idCategoria = ".$ID;      
      $this->db->where($where);
      return $this->db->get('SubCategoria'); 
   }

   function getSubCategoriaWhere($subcategoria){
      $where = "id = ".$subcategoria;      
      $this->db->where($where);
      return $this->db->get('SubCategoria'); 
   }


   /**    -------------------------------  **/
   /**    -------- Articulo ----------  **/
   /**    -------------------------------  **/


   function getAllArticulosWhere($subcategoria){
      $where = "idSubcategoria = ".$subcategoria;      
      $this->db->where($where);
      return $this->db->get('Articulo'); 
   }


}

?>










