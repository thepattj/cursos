<?php defined('BASEPATH') OR exit('No direct script access allowed');

class generales extends CI_Controller {

  // contructor que habla a los models para poder utilizar la base de datos
	function __construct(){
      	parent::__construct();
      	//Se carga el modelo a usar.
        $this->load->model('Admin_Model');
        $this->load->model('General_Model');
        $this->load->model('Cursos_Model');
        $this->load->model('Archivos_Model');
        date_default_timezone_set('America/Mexico_City');
   	}


    function verificarCredenciales(){

        $usuario = $this->session->userdata('usuarioSessionBack');
        $contras = $this->session->userdata('contraseniaSessionBack');
        $di = $this->session->userdata('idSessionBack');

        if(isset($usuario) && isset($contras) && $di != '0'){
            //verificar Acceso
            $any = "any";
            //echo "past";
        }else{
          echo "usuario".$usuario."id".$di;
          //redirect( base_url() . 'admin/login');
          exit;
        }//end of else


    }//end Credenciales

    // esta es la pagina principal de index, esta carga el login 
    function index(){  
      $data['titulo'] = "LOGIN";
      $this -> load ->view('admin/login', $data); //esta haciendo referencia a el archivo php
    }

    //lo mismo de la parte de arriba
    public function login(){
      $data['titulo'] = "LOGIN";
      $this -> load ->view('admin/login', $data);
    }//end of login


// $rulsMenu = ['inicio', 'cursos', 'crearCurso', 'ajustes', 'salir'];

    public function inicio(){
      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;
      $data['opcionMenu'] = '0';

      $contador = 0;
      $query = $this -> General_Model -> getAllCursos($di);
      $data['total'] = $query -> num_rows();

      if ($query->num_rows()>0) {
        foreach($query->result_array() as $row){
          $data['id'][$contador] = $row['id'];
          $data['nombre'][$contador] = $row['nombre'];

          //ARCHVIVOS
          //FONDO

          $queryImg = $this->Archivos_Model->readArchivo($row['id'], 'fondo');
          if ($queryImg->num_rows()>0) {
            foreach ($queryImg->result_array() as $ruwF) {
              $data['fondo'][$contador] = $ruwF['url']."/".$ruwF['nombre']; 
              $data['fondoID'][$contador] = $ruwF['id'];
            }//end of foreach
          }


          //TEXTO
          $queryImg = $this->Archivos_Model->readArchivo($row['id'], 'texto');
          if ($queryImg->num_rows()>0) {
            foreach ($queryImg->result_array() as $ruwT) {
              $data['texto'][$contador] = $ruwT['url']."/".$ruwT['nombre']; 
              $data['textoID'][$contador] = $ruwT['id'];
            }//end of foreach
          }
          $contador ++;
        }//end of forEach
      }//end of ifelse

      $this -> load ->view('admin/header', $data);
      $this -> load ->view('admin/inicio');
      $this -> load ->view('admin/footer');
    }//end of inicio


    // son los que se puede acceder
    public function cursos(){
      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;
      $data['opcionMenu'] = '1';

      $contador = 0;
      $query = $this -> General_Model -> getAllCursos($di);
      $data['total'] = $query -> num_rows();
      
      if ($query->num_rows()>0) {
        foreach($query->result_array() as $row){
          $data['id'][$contador] = $row['id'];
          $data['nombre'][$contador] = $row['nombre'];
          $data['publicado'][$contador] = $row['publicado'];
          //echo "--".$row['id']."--".$row['nombre']."--".$row['publicado']."<BR>";
          $contador ++;
        }//end of forEach
      }//end of if

      $this -> load ->view('admin/header', $data);
      $this -> load ->view('general/cursos', $data);
      $this -> load ->view('admin/footer');
    }//end of inicio

    //acceder a un solo curso
    public function curso($id){
      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;
      $data['opcionMenu'] = '1';
      if (isset($id) && !empty($id)) {

        $query = $this -> General_Model -> getCursoByID($id);
        if ($query->num_rows()>0) {
          foreach ($query->result_array() as $rew) {}//end of ForEach
          $data['id'] = $rew['id'];
          $data['nombre'] = $rew['nombre'];
          /*$data['colorBorde'] = $rew['colorBorde'];
          $data['colorBoton'] = $rew['colorBoton'];
          $data['colorFuente'] = $rew['colorFuente'];
          $data['contrasenia'] = $rew['contrasenia'];
          $data['publicado'] = $rew['publicado'];
          $data['fecha'] = $rew['fecha'];*/

          /*$queryImg = $this->Archivos_Model->readArchivo($rew['id'], 'archivos');
          if ($queryImg->num_rows()>0) {
            foreach ($queryImg->result_array() as $ruwF) {
              $data['fondo'] = $ruwF['url']."/".$ruwF['nombre']; 
              $data['fondoID'] = $ruwF['id'];
            }//end of foreach
          }*/         

          //ARCHIVOS LEIDOS
          $queryImg = $this->Archivos_Model->readArchivo($rew['id'], 'archivos');
          $tltQuery = 0;
          if ($queryImg->num_rows()>0) {
            foreach ($queryImg->result_array() as $rewArchivos) {
              $data['archivos'][$tltQuery] = $rewArchivos['url']."/".$rew['nombre']; 
              $data['archivosID'][$tltQuery] = $rewArchivos['id']; 
              $tltQuery = $tltQuery + 1;
            }
          }

          $data['totalArchivos'] = $tltQuery;


        }else{
          $data['existe'] = 0;
        }//end of else

      }else{

        $data['existe'] = 0;
      }//end of else

      $this -> load ->view('admin/header', $data);
      $this -> load ->view('general/curso', $data);
      $this -> load ->view('admin/footer');

    }//end of curso



    public function ajustes(){
      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;
      $data['opcionMenu'] = '3';
      $this -> load ->view('admin/header', $data);
      $this -> load ->view('admin/footer');

    }//end of inicio

    public function salir(){
      $this -> session -> set_userdata(array(
              'idSessionBack' => '',
              'usuarioSessionBack' => '',
              'contraseniaSessionBack' => ''
      ));
      redirect(base_url().'admin/login');
    }//end of inicio

    public function registro(){
        $data['titulo'] = "LOGIN";
        
        $this->load->view('layout/frontEnd/header', $data);
        $this->load->view('frontEnd/inicio/login', $data);
        $this-> frase();
        $this->load->view('layout/frontEnd/footer', $data);
    }

}//end of fun

