<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Posgrados_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      //Se carga la bd .
      $this->load->database();
   }

   function getAge()
   {
      $this->db->where('institucion', 'uno');
      return $this->db->get('Posgrados');
   }

}

?>