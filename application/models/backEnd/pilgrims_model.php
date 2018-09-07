<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pilgrims_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }


   /**    --------------------------------  **/
   /**    -------- INICIO EXAMPLE ----------  **/
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

   function getSubCategoriaIdeWhere($data){
      $where = "idCategoria = ".$data['idCategoria']." AND subtitulo = '".$data['subtitulo']."'";      
      $this->db->where($where);
      return $this->db->get('SubCategoria'); 
   }
   
   /**    -------------------------------  **/
   /**    -------- FIN EXAMPLE ----------  **/
   /**    -------------------------------  **/




   /**    -------------------------------  **/
   /**    ----------- MARCAS ------------  **/
   /**    -------------------------------  **/

   function getAllFromMarca(){
      $this->db->query("SELECT * FROM marca;");
      return $this->db->get('marca'); 
   }

   function getMarcaWhere($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('marca'); 
   }

   function createMarca($data){
      $this->db->insert('marca', $data);
   }//end of categoria

   function updateMarca($id, $data){
      $this->db->where('id', $id);
      $this->db->update('marca', $data); 
   }

   function deleteMarca($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('marca');
   }

   function getMarcawhereInfo($data){
      $where = "nombre = '".$data['nombre']."' AND descripcion = '".$data['descripcion']."'";      
      $this->db->where($where);
      return $this->db->get('marca'); 
   }

   /**    -----------------------------------  **/
   /**    ------------ PRODUCTOS ------------  **/
   /**    -----------------------------------  **/



   function getAllProductos(){
      $this->db->query("SELECT * FROM marca;");
      return $this->db->get('producto'); 
   }


   function getAllProductosWhereMarca($idMarca){
      $where = "idMarca = ".$idMarca;      
      $this->db->where($where);
      return $this->db->get('producto'); 
   }

   function createProducto($data){
      $this->db->insert('producto', $data);
   }

   function readProducto($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      return $this->db->get('producto'); 
   }

   function updateProducto($id, $data){
      $this->db->where('id', $id);
      $this->db->update('producto', $data); 
   }

   function deleteProducto($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('producto');
   }

   function getProductowhereInfo($data){
      $where = "nombre = '".$data['nombre']."' AND idMarca = '".$data['idMarca']."'";      
      $this->db->where($where);
      return $this->db->get('producto'); 
   }



   /**    ---------------------------------  **/
   /**    ----------- HISTORIA ------------  **/
   /**    ---------------------------------  **/

   function getAllFromHistoria(){
      $this->db->query("SELECT * FROM historia;");
      return $this->db->get('historia'); 
   }

   function getAllFromHistoriaFront(){
      $this->db->query("SELECT * FROM historia;");
      return $this->db->get('historia'); 
   }

   function getHistoriaWhere($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('historia'); 
   }

   function createHistoria($data){
      $this->db->insert('historia', $data);
   }//end of categoria

   function updateHistoria($id, $data){
      $this->db->where('id', $id);
      $this->db->update('historia', $data); 
   }

   function deleteHistoria($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('historia');
   }

   function getHistoriawhereInfo($data){
      $where = "fecha = '".$data['fecha']."' AND resumen = '".$data['resumen']."'";      
      $this->db->where($where);
      return $this->db->get('historia'); 
   }




}//end of model

?>











