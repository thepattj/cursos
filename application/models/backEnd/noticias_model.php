<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }


   /**    -------------------------------  **/
   /**    ----------- NOTICIAS ------------  **/
   /**    -------------------------------  **/

   function getAllFromNoticia(){
      $this->db->query("SELECT * FROM noticia;");
      return $this->db->get('noticia'); 
   }

   function getAllFromNoticiaFront(){
      $this->db->query("SELECT * FROM noticia;");
      $this->db->order_by('fechaDePublicacion', 'DESC');
      return $this->db->get('noticia'); 
   }

   function getNoticiaWhere($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('noticia'); 
   }

   function createNoticia($data){
      $this->db->insert('noticia', $data);
   }//end of categoria

   function updateNoticia($id, $data){
      $this->db->where('id', $id);
      $this->db->update('noticia', $data); 
   }

   function deleteNoticia($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('noticia');
   }

   function getNoticiawhereInfo($data){
      $where = "titulo = '".$data['titulo']."' AND contenido = '".$data['contenido']."' AND fechaDePublicacion = '".$data['fechaDePublicacion']."'";      
      $this->db->where($where);
      return $this->db->get('noticia'); 
   }


   /**    --------------------------------  **/
   /**    ----------- EVENTOS ------------  **/
   /**    --------------------------------  **/

   function getAllFromEvento(){
      $this->db->query("SELECT * FROM evento;");
      return $this->db->get('evento'); 
   }

   function getEventoWhere($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('evento'); 
   }

   function createEvento($data){
      $this->db->insert('evento', $data);
   }//end of categoria

   function updateEvento($id, $data){
      $this->db->where('id', $id);
      $this->db->update('evento', $data); 
   }

   function deleteEvento($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('evento');
   }

   function getEventowhereInfo($data){
      $where = "titulo = '".$data['titulo']."' AND contenido = '".$data['contenido']."' AND fechaDePublicacion = '".$data['fechaDePublicacion']."'";      
      $this->db->where($where);
      return $this->db->get('evento'); 
   }



   /**    ----------------------------------  **/
   /**    ----------- CAMPANIAS ------------  **/
   /**    ----------------------------------  **/

   function getAllFromCampania(){
      $this->db->query("SELECT * FROM campania;");
      return $this->db->get('campania'); 
   }

   function getAllFromCampaniaFront(){
      $this->db->query("SELECT * FROM campania;");
      $this->db->order_by('fechaDePublicacion', 'DESC');
      return $this->db->get('campania'); 
   }

   function getCampaniaWhere($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('campania'); 
   }

   function createCampania($data){
      $this->db->insert('campania', $data);
   }//end of categoria

   function updateCampania($id, $data){
      $this->db->where('id', $id);
      $this->db->update('campania', $data); 
   }

   function deleteCampania($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('campania');
   }

   function getCampaniawhereInfo($data){
      $where = "titulo = '".$data['titulo']."' AND fechaDePublicacion = '".$data['fechaDePublicacion']."'";      
      $this->db->where($where);
      return $this->db->get('campania'); 
   }



   /**    ---------------------------------  **/
   /**    ----------- REVISTAS ------------  **/
   /**    ---------------------------------  **/

   function getAllFromRevista(){
      $this->db->query("SELECT * FROM revista;");
      return $this->db->get('revista'); 
   }

   function getRevistaWhere($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('revista'); 
   }

   function createRevista($data){
      $this->db->insert('revista', $data);
   }//end of categoria

   function updateRevista($id, $data){
      $this->db->where('id', $id);
      $this->db->update('revista', $data); 
   }

   function deleteRevista($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('revista');
   }

   function getRevistawhereInfo($data){
      $where = "nombre = '".$data['nombre']."' AND mes = '".$data['mes']."' AND anio = '".$data['anio']."'";      
      $this->db->where($where);
      return $this->db->get('revista'); 
   }




}//end of model

?>











