<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sociales_model extends CI_Model {

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
   /**    ------------ CLASIFICADOS -------------  **/
   /**    ---------------------------------------  **/

   function getAllFromClasificadoV(){
      $this->db->query("SELECT * FROM anuncio WHERE aprobado = '1';");
      return $this->db->get('anuncio'); 
   }
 

   function getAllFromClasificado(){
      $this->db->query("SELECT * FROM anuncio;");
      return $this->db->get('anuncio'); 
   }

   function getClasificadoWhere($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('anuncio'); 
   }

   function getAllFromClasificadoWhereUsu($IDE){
      $where = "idProgenitor = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('anuncio'); 
   }


   function createClasificado($data){
      $this->db->insert('anuncio', $data);
   }//end of categoria

   function updateClasificado($id, $data){
      $this->db->where('id', $id);
      $this->db->update('anuncio', $data); 
   }

   function deleteClasificado($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('anuncio');
   }

   function getClasificadowhereInfo($data){
      $where = "nombre = '".$data['nombre']."' 
      AND descripcion = '".$data['descripcion']."' 
      AND telefono = '".$data['telefono']."' 
      AND descripcion = '".$data['descripcion']."' 
      AND correo = '".$data['correo']."' 
      AND aprobado = '".$data['aprobado']."' 
      AND idProgenitor = '".$data['idProgenitor']."'";      
      $this->db->where($where);
      return $this->db->get('anuncio'); 
   }


   /**    ---------------------------------------  **/
   /**    -------------- POSTALES ---------------  **/
   /**    ---------------------------------------  **/

   function getPostalWhere($rul){
      $where = "idRecibidor = '".$rul."'";      
      $this->db->where($where);
      $this->db->order_by('id', 'DESC');
      return $this->db->get('postal'); 
   }

   function createPostal($data){
      $this->db->insert('postal', $data);
   }


   function getAllCategorias(){
      $this->db->query("SELECT * FROM postalCategoria;");
      return $this->db->get('postalCategoria'); 
   }

   function getTarjetasByPro($id){
      $where = "idPostalCategoria = '".$id."'";      
      $this->db->where($where);
      return $this->db->get('tarjeta');
   }


   function createTarjeta($data){
      $this->db->insert('tarjeta', $data);
   }

   function getTarjetawhereInfo($data){
      $where = "nombre = '".$data['nombre']."' AND color = '".$data['color']."' AND idPostalCategoria = '".$data['idPostalCategoria']."'";     
      $this->db->where($where);
      return $this->db->get('tarjeta');
   }

   function getTarjetasByID($id){
      $where = "id = '".$id."'";      
      $this->db->where($where);
      return $this->db->get('tarjeta');       
   }

   function updateTarjeta($id, $data){
      $this->db->where('id', $id);
      $this->db->update('tarjeta', $data); 
   }

   function deleteTarjeta($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('tarjeta');
   }

   /**    ---------------------------------------  **/
   /**    ------------- PREGUNTAS ---------------  **/
   /**    ---------------------------------------  **/


   function getPreguntas(){
      $this->db->query("SELECT * FROM preguntas;");
      return $this->db->get('preguntas'); 
   }

   function getPregunta($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('preguntas'); 
   }

   function createPregunta($data){
      $this->db->insert('preguntas', $data);
   }//end of categoria

   function updatePregunta($id, $data){
      $this->db->where('id', $id);
      $this->db->update('preguntas', $data); 
   }

   function deletePregunta($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('preguntas');
   }


}//end of model

?>











