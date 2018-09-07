<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Directorio_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

   /**    -------------------------------  **/
   /**    --------- LOCALIDAD -----------  **/
   /**    -------------------------------  **/

   function getAllLocalidades(){
      $this->db->query("SELECT * FROM localidad;");
      $this->db->order_by('nombre', 'ASC');
      return $this->db->get('localidad'); 
   }

   function readLocalidad($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('localidad'); 
   }

   function createLocalidad($data){
      $this->db->insert('localidad', $data);
   }//end of categoria

   function updateLocalidad($id, $data){
      $this->db->where('id', $id);
      $this->db->update('localidad', $data); 
   }

   function deleteLocalidad($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('localidad');
   }

   function getLocalidadwhereInfo($data){
      $where = "nombre = '".$data['nombre']."' AND coordX = '".$data['coordX']."' AND coordY = '".$data['coordY']."'";      
      $this->db->where($where);
      return $this->db->get('localidad'); 
   }

   /**    -------------------------------  **/
   /**    --------- CONTACTO -----------  **/
   /**    -------------------------------  **/

   function readContacto($id, $progenitor){
      $where = "idProgenitor = ".$id." AND progenitor = '".$progenitor."'";      
      $this->db->where($where);
      return $this->db->get('contacto');
   }

   function createContacto($data){
      $this->db->insert('contacto', $data);
   }//end of categoria

   function deleteContactoWhere($id, $progenitor){
      $where = "idProgenitor = ".$id." AND progenitor = '".$progenitor."'";      
      $this->db->where($where);
      $this->db->delete('contacto');
   }


   /**    -------------------------------  **/
   /**    --------- COLABORADOR ---------  **/
   /**    -------------------------------  **/

   function getAllColaboradores(){
      $this->db->query("SELECT * FROM colaborador;");
      return $this->db->get('colaborador'); 
   }

   function readColaborador($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('colaborador'); 
   }

   function createColaborador($data){
      $this->db->insert('colaborador', $data);
   }//end of categoria

   function updateColaborador($id, $data){
      $this->db->where('id', $id);
      $this->db->update('colaborador', $data); 
   }

   function deleteColaborador($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('colaborador');
   }

   function getColaboradorwhereInfo($data){
      $where = "nombreCompleto = '".$data['nombre']."' AND 
                fechaDeCreacion = '".$data['fechaDeCreacion']."' AND 
                idLocalidad = '".$data['idLocalidad']."'";      
      $this->db->where($where);
      return $this->db->get('colaborador'); 
   }



   /**    -------------------------------  **/
   /**    --------- COLABORADORES ---------  **/
   /**    -------------------------------  **/

   function getAllColaboradoress(){
      $this->db->query("SELECT * FROM colaboradores;");
      return $this->db->get('colaboradores'); 
   }

   function readColaboradorr($IDE){
      $where = "id = ".$IDE;      
      $this->db->where($where);
      return $this->db->get('colaboradores'); 
   }

   function createColaboradorr($data){
      $this->db->insert('colaboradores', $data);
   }//end of categoria

   function updateColaboradorr($id, $data){
      $this->db->where('id', $id);
      $this->db->update('colaboradores', $data); 
   }

   function deleteColaboradorr($id){
      $where = "id = ".$id;      
      $this->db->where($where);
      $this->db->delete('colaboradores');
   }

   function getColaboradorwhereInfoo($data){
      $where = "numeroColaborador = '".$data['numeroColaborador']."' AND 
                nombre = '".$data['nombre']."' AND 
                fechaDeCreacion = '".$data['fechaDeCreacion']."' AND 
                puesto = '".$data['puesto']."' AND 
                correo = '".$data['correo']."' AND 
                contrasenia = '".$data['contrasenia']."' AND 
                localidad = '".$data['localidad']."' AND 
                ext = '".$data['ext']."' AND 
                cel = '".$data['cel']."' AND 
                dir = '".$data['dir']."' AND 
                tel = '".$data['tel']."'";      
      $this->db->where($where);
      return $this->db->get('colaboradores'); 
   }

//mysql> SELECT * FROM pet WHERE name LIKE 'b%';
   function getColaboradorBusquedaa($campo){
      $where = "nombre LIKE '%".$campo."%';";     
      $this->db->where($where);
      return $this->db->get('colaboradores'); 
   }


   /**    -------------------------------  **/
   /**    --------- COLABORADOR ---------  **/
   /**    -------------------------------  **/

/*
$texto="José"
$texto= htmlentities ($_POST["texto"],ENT_QUOTES);
$texto2= eliminar_simbolos($_POST["texto"]);

$sql="SELECT * FROM mi_tabla WHERE ( campo LIKE '%$texto%' ) OR ( campo LIKE '%$texto2%' ) ";  
*/


//mysql> SELECT * FROM pet WHERE name LIKE 'b%';
   function getColaboradorBusqueda($campo){
      $where = "nombre LIKE '%".$campo."%' collate Latin1_General_CI_AI;";     
      $this->db->where($where);
      return $this->db->get('colaboradores'); 
   }


//mysql> SELECT * FROM pet WHERE name LIKE 'b%';
   function getLocalidadBusqueda($campo){
      //$where = "nombre LIKE '".$campo."' OR direccion LIKE '".$campo."';"; 
      $where = "nombre LIKE '%".$campo."%' OR direccion LIKE '%".$campo."%' collate Latin1_General_CI_AI"; 
      //SELECT * FROM noticias WHERE MATCH (titulo, texto, autor) AGAINST ('cualquiercosa' IN BOOLEAN MODE)
      //$where = "direccion LIKE _utf8 '".$campo."%' COLLATE utf8_general_ci ;"; 
      //$where = "MATCH (nombre) AGAINST ('CEDIS' IN BOOLEAN MODE);"; 
    
      $this->db->where($where);
      $this->db->order_by('nombre', 'ASC');
      return $this->db->get('localidad'); 
   }

}//end of model

?>











