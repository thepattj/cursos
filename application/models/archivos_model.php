<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

   /**    ----------------------------------  **/
   /**    -------- Actualizaciones ---------  **/
   /**    ----------------------------------  **/

   function getUpdates(){
      $this->db->limit(5);
      $where = "url = 'campania' OR url = 'noticia'";      
      $this->db->where($where);
      $this->db->order_by('fechaDeCreacion', 'DESC');
      return $this->db->get('archivo');  
   }

   function getLastUpdate(){
      $this->db->limit(1);
      $where = "url = 'campania' OR url = 'noticia' OR url = 'revista' ";      
      $this->db->where($where);
      $this->db->order_by('fechaDeCreacion', 'DESC');
      return $this->db->get('archivo');  
   }


   function getLastUpdateID($id){
      $this->db->limit(1);
      $where = "url = 'campania' OR url = 'noticia' OR url = 'revista' AND id < ".$id;      
      $this->db->where($where);
      $this->db->order_by('fechaDeCreacion', 'DESC');
      return $this->db->get('archivo');  
   }


   /**    --------------------------  **/
   /**    -------- Archivo ---------  **/
   /**    --------------------------  **/


   function createArchivo($data){
      $this->db->insert('archivo', $data);
   }

   function readArchivo($id, $rul){
      $where = "idProgenitor = ".$id." AND url = '".$rul."'"; 
      $this->db->where($where);
      return $this->db->get('archivo');      
   }

   function readArchivoNormal($id){
      $where = "id = ".$id; 
      $this->db->where($where);
      return $this->db->get('archivo');      
   }

   function deleteArchivoNormal($id){
      $where = "id = ".$id; 
      $this->db->where($where);
      $this->db->delete('archivo');
   }
   
   function updateArchivo($id, $data){
      $this->db->where('id', $id);
      $this->db->update('archivo', $data); 
   }


   function deleteArchivo($id, $rul){
      $where = "idProgenitor = ".$id." AND url = '".$rul."'";      
      $this->db->where($where);
      $this->db->delete('archivo');
   }


   function getArchivoWhereID($data){
      $where = "id = '".$data['id']."' 
               nombre = '".$data['nombre']."' 
               AND extension = '".$data['extension']."' 
               AND url = '".$data['url']."' 
               AND fechaDeCreacion = '".$data['fechaDeCreacion']."' 
               AND idProgenitor = '".$data['idProgenitor']."'";      
      $this->db->where($where);
      return $this->db->get('archivo');
   }

   function getArchivoWhere($data){
      $where = "nombre = '".$data['nombre']."' 
               AND extension = '".$data['extension']."' 
               AND url = '".$data['url']."' 
               AND fechaDeCreacion = '".$data['fechaDeCreacion']."' 
               AND idProgenitor = '".$data['idProgenitor']."'";      
      $this->db->where($where);
      return $this->db->get('archivo');
   }

   function contarArchivos($url, $archivo){
      $where = "idProgenitor = ".$archivo." AND url = '".$url."'";      
      $this->db->where($where);
      return $this->db->get('archivo');
   }//end of contarArchivos

   function getAllArchivosForLastID(){
      $this->db->query("SELECT * FROM archivo;");
      return $this->db->get('archivo'); 
   }//end of Archivos

   /**    -------------------------------  **/
   /**    -------- Clase Archivo --------  **/
   /**    -------------------------------  **/

   function createClaseArchivo($data){
      $this->db->insert('claseArchivo', $data);
   }//end of create clase archivo

   function readClaseArchivo($id){
      $where = "idArchivo = ".$id;      
      $this->db->where($where);
      return $this->db->get('claseArchivo');      
   }//end of read ClaseArchivo

   function deleteClaseArchivoD($id){
      $where = "idArchivo = ".$id;      
      $this->db->where($where);
      return $this->db->get('claseArchivo');      
   }//e

   function deleteClaseArchivo($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('claseArchivo');
   }//end of deleteClaseArchivo

   function updateClaseArchivo($id, $data){
      $this->db->where('id', $id);
      $this->db->update('claseArchivo', $data); 
   }

   function updateClaseArchivoWhere($id, $data){
      $where = "idArchivo = ".$id;      
      $this->db->where($where);
      $this->db->update('claseArchivo', $data); 
   }

   /**    -------------------------------  **/
   /**    ----Eliminar Eventos Viejos----  **/
   /**    -------------------------------  **/


   function getTodayDate(){
      $query = $this->db->query('SELECT CURDATE() as dia;');
      return $query;
   }


   function getOldClasificados($fecha){
      $where = 'fechaDePublicacion < '.$fecha;
      // echo "__".$where."__";
      $this->db->where($where);
      return $this->db->get('anuncio');
   }//end of Evento


   function deleteOldEvento($fecha){
      $where = "finFecha < '".$fecha."';";
      $this->db->where($where);
      $this->db->delete('Evento');
   }//end of Evento




   /**    --------------------------  **/
   /**    -------- Visitas ---------  **/
   /**    --------------------------  **/

   function createVisita($data){
      $this->db->insert('vistas', $data);
   }

   
}

?>














