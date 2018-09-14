<?php defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

  // contructor que habla a los models para poder utilizar la base de datos
  function __construct(){
        parent::__construct();
        //Se carga el modelo a usar.
        $this->load->model('Admin_Model');
        $this->load->model('Cursos_Model');
        $this->load->model('Archivos_Model');
        $this->load->model('Usuarios_Model');
        date_default_timezone_set('America/Mexico_City');
    }


    function verificarCredenciales(){

        $usuario = $this->session->userdata('usuarioSessionBack');
        $contras = $this->session->userdata('contraseniaSessionBack');
        $di = $this->session->userdata('idSessionBack');

        if(isset($usuario) && isset($contras) && $di == '0'){
            //verificar Acceso
            $any = "any";
            //echo "past";
        }else{
            redirect( base_url() . 'admin/login');
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

    // DEL BOTON QUE ESTA EN EL VIEW DE INDEX MANDA A ESTA FUNCION LA CUAL VERIFICA AQUI MISMO EL USUARIO Y LA CONTRASEÑA
    public function verificarAcceso(){
      $this->form_validation->set_rules('usuario','usuario', 'required');
      $this->form_validation->set_rules('contrasenia','contrasenia', 'required');

      if($this->form_validation->run() == FALSE){
        redirect( base_url() . 'admin/login');
      }else{

        $data = array(
          'user' => $this->input->post('usuario'),
          'contrase' => $this->input->post('contrasenia')
        ); 
        $query = $this -> Admin_Model -> getUsuarioWhere($data);
        if ($query->num_rows()>0) {
          foreach($query->result_array() as $row){}
            echo "Bienvenido Usuario ".$row['usuario'];
            $this -> session -> set_userdata(array(
              'idSessionBack' => $row['id'],
              'usuarioSessionBack' => $row['usuario'],
              'contraseniaSessionBack' => $row['contrasena']
            ));

            $idu = $this->session->userdata('idSessionBack');
            if($idu == '0'){
              redirect( base_url() . 'admin/inicio');
            }else if ($idu != '0') {
              echo "entras a generales";
              redirect( base_url() . 'generales/inicio');
            }
        }else{
          echo "El Usuario ".$row['usuario']." no tiene registro favor de checarlo con el administrador";
          redirect( base_url() . 'admin/login');
        }
      }//end of else
   }//end of verificarAcceso
    
   public function inicio(){
      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;
      $data['opcionMenu'] = '0';

      $contador = 0;
      $query = $this->Admin_Model->getAllCursos();
      $data['total'] = $query -> num_rows();

      if ($query->num_rows()>0) {
        foreach($query->result_array() as $row){
          $data['id'][$contador] = $row['id'];
          $data['nombre'][$contador] = $row['nombre'];

          //echo "<BR> id".$row['id']."--nombre-".$row['nombre']."---";
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
      }//end of if

      $this -> load ->view('admin/header', $data);
      $this -> load ->view('admin/inicio');
      $this -> load ->view('admin/footer');
    }//end of inicio

    
    /********************************* USUARIOS  ***********************************/

    
    //funcion que agrega el usuario a un curso
    public function agregarUsuario($id){
      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;
      $data['opcionMenu'] = '1';
      $data['nocurso'] = $id;
      $contador=0;

      $queryU = $this->Usuarios_Model->getUsuarios($id);
      if($queryU->num_rows() >0 ){
        foreach ($queryU->result_array() as $rawU) {
            $data['idUsuario'][$contador] = $rawU['id'];
            $data['usuario'][$contador] = $rawU['usuario'];
            $contador ++;
        }
        $data['contador'] = $contador;
      }else{
        $data['contador']='0';
      }



      $this -> load ->view('admin/header', $data);
      $this -> load ->view('admin/agregarUsuario');
      $this -> load ->view('admin/footer');
    }
    //funcion que guarda un usuario desde un curso, ante esto agrega el permiso
    public function guardarUsuario(){
      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;

      echo "uno".$this->input->post('curso')."doss".$this->input->post('usuarios')."-";

      if ($this->input->post('usuarios') == "I" ) {
        echo "<BR>entre if";
      //registrar el usuario
        $data = array(
          'usuario' => $this->input->post('nombre'),
          'contrasena' => $this->input->post('pass'),
          'disponible' => '1'
        );

      echo "<BR>---nombre".$this->input->post('nombre')."pass".$this->input->post('pass')."-";


        $this->Usuarios_Model->createUsuario($data);

      //registrar el permiso
        $queryP = $this->Usuarios_Model->readUsuarioWhere($data);
        if ($queryP->num_rows()>0) {
            foreach ($queryP->result_array() as $ruwU) {
              $data['idu'] = $ruwU['id'];
              $this->Usuarios_Model->createPermiso($this->input->post('curso'), $ruwU['id']);
            }//end of foreach
        }

      }else if($this->input->post('usuarios') > "0"){
        echo "<BR>entre else if";

        //Registrar el permiso
        $this->Usuarios_Model->createPermiso($this->input->post('curso'), $this->input->post('usuarios'));
      }

      redirect( base_url()."admin/curso/".$this->input->post('curso'));

    }
    //edita el usuario desde un curso
    public function editarUsuario($unico, $curso){
      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;
      $data['opcionMenu'] = '1';
    
      //echo "id.persona".$unico."idcuros".$curso; 
      $queryUpUs = $this->Usuarios_Model->getUseru($unico,$curso);
      if ($queryUpUs->num_rows()>0) {
            foreach ($queryUpUs->result_array() as $ruwU) {
              $data['U'] = $ruwU['usuario']; 
              $data['CP'] = $ruwU['contrasena'];
              $data['D'] = $ruwU['activoCurso'];
            }//end of foreach
          }
        $data['id'] = $unico;
        $data['nocurso'] = $curso;
        //echo "usuario".$data['U']."contra".$data['CP']."staus".$data['D'];
      $this -> load ->view('admin/header', $data);
      $this -> load ->view('admin/editarUsuario');
      $this -> load ->view('admin/footer');
    }   

    //boton de agregar el usuario
    public function actualizarUsuario($nocurso){

        $this -> verificarCredenciales();
        $data['opcionMenu'] = '1';
        $us = $this->input->post('country');

        $data = array(
            'usuario' => $this->input->post('usuario'),
            'contrasena' => $this->input->post('cp')
        );
        
        $this->Usuarios_Model->updateUsuario($data, $us);
        
        //PERMISO
        $this->Usuarios_Model->updatePermiso($us, $nocurso, $this->input->post('state'));
        
        redirect(base_url()."admin/curso/".$nocurso);
    }
    
    public function eliminarUsuario($id,$iddata){
        //$this -> verificarCredenciales();
        //$id = $this -> session -> userdata(idSessionBack);
        $this->Usuarios_Model->deleteUser($id, $iddata);
        redirect(Base_url()."admin/curso/".$iddata);
    }
    
    
    
    
    /*--------------DESDE EL MENU DE USUARIOS------------*/
    public function usuarios(){
        $this -> verificarCredenciales();
        $di = $this->session->userdata('idSessionBack');
        $data['idse'] = $di;
        $data['opcionMenu'] = '3';

        $contador = 0;
        $queryz = $this->Usuarios_Model->getAllUsuarios();
        $data['totalu'] = $queryz -> num_rows();

        if ($queryz->num_rows()>0) {
          foreach($queryz->result_array() as $rowz){
            $data['id'][$contador] = $rowz['id'];
            $data['user'][$contador] = $rowz['usuario'];
            $data['state'][$contador] = $rowz['disponible'];
            //echo "--".$row['id']."--".$row['nombre']."--".$row['publicado']."<BR>";
            $contador ++;
          }//end of forEach
        }//end of if

        $this -> load ->view('admin/header', $data);
        $this -> load ->view('admin/usuarios');
        $this -> load ->view('admin/footer');
    }
    
    //funcion que sirve para abrir la view
    public function crearUsuario(){
        $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;
      $data['opcionMenu'] = '4';

      $this -> load ->view('admin/header', $data);
      $this -> load ->view('admin/crearUsuario');
      $this -> load ->view('admin/footer');
    }
    
    //funcion que crea el usuario desde el menu
    public function creaUsuario(){
        $this -> verificarCredenciales();
        $di = $this->session->userdata('idSessionBack');
        $data['idse'] = $di;
        $data['opcionMenu'] = '4';
        
        $dataz = array(
          'usuario' => $this->input->post('nombre'),
          'contrasena' => $this->input->post('pass'),
          'disponible' => '1'
        );

        //echo "<BR>---nombre".$this->input->post('nombre')."pass".$this->input->post('pass')."-";


        $this->Usuarios_Model->createUsuario($dataz);
        $this->usuarios();
    }
    
    //edita el usuario desde el menu
    public function editaUsuario($unico){
        $this -> verificarCredenciales();
        $di = $this->session->userdata('idSessionBack');
        $data['idse'] = $unico;
        $data['opcionMenu'] = '4';
        //echo "id.persona".$unico;
        $queryUs = $this->Usuarios_Model->getpUsuario($unico);
      
        if($queryUs->num_rows()>0) {
          foreach ($queryUs->result_array() as $ruwU) {
              $data['U'] = $ruwU['usuario']; 
              $data['CP'] = $ruwU['contrasena'];
              $data['D'] = $ruwU['disponible'];
            }//end of foreach
          }
        //echo "--persona".$data['U']."--status".$data['D'];
        
        $this -> load ->view('admin/header', $data);
        $this -> load ->view('admin/editarmUsuario');
        $this -> load ->view('admin/footer');
    }
    
    public function eliminaUsuario($id){
        //$this -> verificarCredenciales();
        //$id = $this -> session -> userdata(idSessionBack);
        $this->Usuarios_Model->eliminaUser($id);
        redirect(Base_url()."admin/usuarios");
    }
    
    //actualiza el usuario que es mandado del edita del menu
    public function actualizaUsuario($nous){

        $this -> verificarCredenciales();
        $data['opcionMenu'] = 3;

        $datau = array(
            'usuario' => $this->input->post('usuario'),
            'contrasena' => $this->input->post('cp'),
            'disponible' => $this->input->post('state')
        );
        
        $this->Usuarios_Model->updateUsuario($datau,$nous);
        
        redirect(base_url()."admin/usuarios");
    }

// $rulsMenu = ['inicio', 'cursos', 'crearCurso', 'ajustes', 'salir'];

    
/********************************* CURSOS  ***********************************/
 // son los que se puede acceder
    public function cursos(){
      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;
      $data['opcionMenu'] = '1';

      $contador = 0;
      $query = $this->Admin_Model->getAllCursos();
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
      $this -> load ->view('admin/cursos');
      $this -> load ->view('admin/footer');
    }//end of inicio
    
    //acceder a un solo curso
    public function curso($id){

      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;

      $data['opcionMenu'] = '1';
      if (isset($id) && !empty($id)) {

        $query = $this->Admin_Model->getCursoByID($id);
        if ($query->num_rows()>0) {
          foreach ($query->result_array() as $rew) {}//end of ForEach
          $data['id'] = $rew['id'];
          $data['nombre'] = $rew['nombre'];
          $data['colorBorde'] = $rew['colorBorde'];
          $data['colorBoton'] = $rew['colorBoton'];
          $data['colorFuente'] = $rew['colorFuente'];
          $data['contrasenia'] = $rew['contrasenia'];
          $data['publicado'] = $rew['publicado'];
          $data['fecha'] = $rew['fecha'];


          //ARCHVIVOS
          //FONDO

          $queryImg = $this->Archivos_Model->readArchivo($rew['id'], 'fondo');
          if ($queryImg->num_rows()>0) {
            foreach ($queryImg->result_array() as $ruwF) {
              $data['fondo'] = $ruwF['url']."/".$ruwF['nombre']; 
              $data['fondoID'] = $ruwF['id'];
            }//end of foreach
          }


          //TEXTO

          $queryImg = $this->Archivos_Model->readArchivo($rew['id'], 'texto');
          if ($queryImg->num_rows()>0) {
            foreach ($queryImg->result_array() as $ruwT) {
              $data['texto'] = $ruwT['url']."/".$ruwT['nombre']; 
              $data['textoID'] = $ruwT['id'];
            }//end of foreach
          }
          
         //Usuarios
         $queryUser = $this->Usuarios_Model->getUsuarioJoin($rew['id']);
         $useQuery = 0;
            if($queryUser->num_rows()>0){
                foreach ($queryUser->result_array() as $riw){
                    $data['unico'][$useQuery] = $riw['id'];
                    $data['nuser'][$useQuery] = $riw['usuario'];
                    $data['ndisp'][$useQuery] = $riw['activoCurso'];
                    $useQuery = $useQuery + 1;
                }//end of foreach
            }//end if row Usuarios
           $data['totalUsuarios'] = $useQuery;

          $queryImg = $this->Archivos_Model->readArchivo($rew['id'], 'archivos');
          $tltQuery = 0;
          if ($queryImg->num_rows()>0) {
            foreach ($queryImg->result_array() as $rewArchivos) {
              //echo "<BR>".$rewArchivos['url']."/".$rewArchivos['nombre']."<BR>";
              $data['tituloArch'][$tltQuery] = $rewArchivos['titulo']; 
              $data['archivos'][$tltQuery] = $rewArchivos['url']."/".$rewArchivos['nombre']; 
              $data['archivosID'][$tltQuery] = $rewArchivos['id']; 
              $tltQuery = $tltQuery + 1;
            }
          }

          $data['totalArchivos'] = $tltQuery;

          $this -> load ->view('admin/header', $data);
          $this -> load ->view('admin/curso', $data);
          $this -> load ->view('admin/footer');


        }else{

        $this -> load ->view('admin/header', $data);
        $this -> load ->view('admin/cursoNoExiste', $data);
        $this -> load ->view('admin/footer');

        }//end of else

      }else{

        $this -> load ->view('admin/header', $data);
        $this -> load ->view('admin/cursoNoExiste', $data);
        $this -> load ->view('admin/footer');

      }//end of else


    }//end of curso
    
    public function crearCurso(){


      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;
      
      $data['opcionMenu'] = '2';

      $this -> load ->view('admin/header', $data);
      $this -> load ->view('admin/crearCurso');
      $this -> load ->view('admin/footer');
    }//end of inicio

    public function guardarCurso(){
      $this -> verificarCredenciales();
      $data['opcionMenu'] = '2';

      $fechaSubida = date('Y-m-d');

      $data = array(
        'nombre' => $this->input->post('nombre'),
        'colorBorde' => $this->input->post('colorBorde'),
        'colorBoton' => $this->input->post('colorBtn'),
        'colorFuente' => $this->input->post('colorFont'),
        'contrasenia' => $this->input->post('pass'),
        'publicado' => $this->input->post('publicar'),
        'fecha' => $fechaSubida
      );

      $this->Admin_Model->createCurso($data);
      $obtenerInfo = $this->Admin_Model->getCursoWhereInfo($data);


      if ($obtenerInfo->num_rows()>0) {

        foreach ($obtenerInfo->result_array() as $rew) {}//end of ForEach
        $idProgenitor = $rew['id'];
        echo "----.idProgenitor..".$idProgenitor."...-----";  

        ////////////////////////////////
        $urlGuardar = ['fondo', 'texto', 'archivos', 'archivos', 'archivos', 'archivos', 'archivos'];
        for ($i=0; $i < count($urlGuardar); $i++) {
          echo "for ".$i."--<BR>";
                    
          if($_FILES['archivo'.$i]['name'] == ''){
            $any = 'any';
            //echo "no guardas".$urlGuardar[$i]."<BR>";
          }else{
            //echo "guardas".$urlGuardar[$i]."<BR>";
            //obtener numero de registros de arcchivos
            $numeroDeregistros=$this->Archivos_Model -> getAllArchivosForLastID();
            foreach ($numeroDeregistros->result_array() as $rawArch) {}//end of ForEach
            $nombreMarc = intval($rawArch['id']) + 1;

            $temp = explode(".", $_FILES['archivo'.$i]["name"]);
            $extension = end($temp);
            $path = "./assets/contenido/".$urlGuardar[$i]."/";

            $filename = basename($_FILES['archivo'.$i]["name"]);
            $filename = $urlGuardar[$i].$nombreMarc.'.'.$extension;

            echo "<BR>-".$filename."-<BR>";

            if(move_uploaded_file($_FILES['archivo'.$i]["tmp_name"],$path . $filename)){
              echo "Uploaded";

              $data = array(
                'nombre' => $urlGuardar[$i].$nombreMarc.'.'.$extension,
                'extension' => $extension,
                'url' => $urlGuardar[$i],
                'fechaDeCreacion' => $fechaSubida,
                'idProgenitor' => $idProgenitor
              );

              $this->Archivos_Model->createArchivo($data);

            }else{
              echo "errorrrr";
            }//end of else

          }//end of else
                
        }//end of for 

        //echo "--FIN-----IF--.idProgenitor..".$idProgenitor."...-----";  
        redirect( base_url() . 'admin/curso/'.$idProgenitor); 

      }else{ 
        //echo "--FIN----ELSE--error no existe Publicacion"; 
        redirect( base_url() . 'admin/cursos/');                         
      }//end of else

    }//end of inicio

    public function editarCurso($id){
      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;

      $data['opcionMenu'] = '1';
      if (isset($id) && !empty($id)) {

        $query = $this->Admin_Model->getCursoByID($id);
        if ($query->num_rows()>0) {
          foreach ($query->result_array() as $rew) {}//end of ForEach
          $data['id'] = $rew['id'];
          $data['nombre'] = $rew['nombre'];
          $data['colorBorde'] = $rew['colorBorde'];
          $data['colorBoton'] = $rew['colorBoton'];
          $data['colorFuente'] = $rew['colorFuente'];
          $data['contrasenia'] = $rew['contrasenia'];
          $data['publicado'] = $rew['publicado'];
          $data['fecha'] = $rew['fecha'];


        }else{
          $data['existe'] = 0;
        }//end of else

      }else{

        $data['existe'] = 0;
      }//end of else

      $this -> load ->view('admin/header', $data);
      $this -> load ->view('admin/editarCurso', $data);
      $this -> load ->view('admin/footer');
    
    }//end of editarCurso

    public function actualizarCurso(){

      $id = $this->input->post('state');
      echo "Voy a actualizar a --".$id."--";

      $this -> verificarCredenciales();
      $data['opcionMenu'] = '2';


      $data = array(
        'nombre' => $this->input->post('nombre'),
        'colorBorde' => $this->input->post('colorBorde'),
        'colorBoton' => $this->input->post('colorBtn'),
        'colorFuente' => $this->input->post('colorFont'),
        'contrasenia' => $this->input->post('pass'),
        'publicado' => $this->input->post('publicar'),
      );

      $this->Admin_Model->updateCurso($id, $data);

      $idProgenitor = $id;

        ////////////////////////////////
        $urlGuardar = ['fondo', 'texto'];
        for ($i=0; $i < count($urlGuardar); $i++) {
          echo "for ".$i."--<BR>";
                    
          if($_FILES['archivo'.$i]['name'] == ''){
            $any = 'any';
            //echo "no guardas".$urlGuardar[$i]."<BR>";
          }else{

            $query = $this->Archivos_Model->readArchivo($idProgenitor, $urlGuardar[$i]);

            if ($query->num_rows()>0){
                foreach ($query->result_array() as $raw) {}
                $del =  $raw['url']."/".$raw['nombre'];
                //borrar Imagen y row
                unlink('./assets/administrables/'.$del);
                $this->Archivos_Model->deleteArchivo($idProgenitor, $urlGuardar[$i]);                          
            }//end of if

            //echo "guardas".$urlGuardar[$i]."<BR>";
            //obtener numero de registros de arcchivos

            $numeroDeregistros=$this->Archivos_Model -> getAllArchivosForLastID();
            foreach ($numeroDeregistros->result_array() as $rawArch) {}//end of ForEach
            $nombreMarc = intval($rawArch['id']) + 1;

            $temp = explode(".", $_FILES['archivo'.$i]["name"]);
            $extension = end($temp);
            $path = "./assets/contenido/".$urlGuardar[$i]."/";

            $filename = basename($_FILES['archivo'.$i]["name"]);
            $filename = $urlGuardar[$i].$nombreMarc.'.'.$extension;

            echo "<BR>-".$filename."-<BR>";

            if(move_uploaded_file($_FILES['archivo'.$i]["tmp_name"],$path . $filename)){
              echo "Uploaded";

              $data = array(
                'nombre' => $urlGuardar[$i].$nombreMarc.'.'.$extension,
                'extension' => $extension,
                'url' => $urlGuardar[$i],
                'fechaDeCreacion' => $fechaSubida,
                'idProgenitor' => $idProgenitor
              );

              $this->Archivos_Model->createArchivo($data);

            }else{
              echo "errorrrr";
            }//end of else

          }//end of else
                
        }//end of for 

        //echo "--FIN-----IF--.idProgenitor..".$idProgenitor."...-----";  
        redirect( base_url() . 'admin/curso/'.$idProgenitor); 

    }//end of actualizarCurso

    public function eliminarCurso($id){

      echo "Voy a eliminar a --".$id."--";

      $this -> verificarCredenciales();
      $data['opcionMenu'] = '1';
      if (isset($id) && !empty($id)) {

        $query = $this->Admin_Model->getCursoByID($id);
        if ($query->num_rows()>0) {
          foreach ($query->result_array() as $rew) {}//end of ForEach
          $data['id'] = $rew['id'];


          //ARCHVIVOS
          //FONDO


          $queryImg = $this->Archivos_Model->readArchivo($rew['id'], 'fondo');
          if ($queryImg->num_rows()>0) {
            foreach ($queryImg->result_array() as $ruwF) {}
            $del =  $ruwF['url']."/".$ruwF['nombre'];
            //borrar Imagen y row
            unlink('./assets/contenido/'.$del);
            $this->Archivos_Model->deleteArchivoNormal($ruwF['id']);   
          }


          //TEXTO

          $queryImg = $this->Archivos_Model->readArchivo($rew['id'], 'texto');
          if ($queryImg->num_rows()>0) {
            foreach ($queryImg->result_array() as $ruwT) {}
            $del =  $ruwT['url']."/".$ruwT['nombre'];
            //borrar Imagen y row
            unlink('./assets/contenido/'.$del);
            $this->Archivos_Model->deleteArchivoNormal($ruwT['id']);   
          }
          


          $queryImg = $this->Archivos_Model->readArchivo($rew['id'], 'archivos');
          $tltQuery = 0;
          if ($queryImg->num_rows()>0) {
            foreach ($queryImg->result_array() as $rewArchivos) {
              $del =  $rewArchivos['url']."/".$rewArchivos['nombre'];
              //borrar Imagen y row
              unlink('./assets/contenido/'.$del);
              $this->Archivos_Model->deleteArchivoNormal($rewArchivos['id']);   
            }
          }

          $data['totalArchivos'] = $tltQuery;


        }else{
          $data['existe'] = 0;
        }//end of else

      }else{

        $data['existe'] = 0;
      }//end of else

      $this->Admin_Model->deleteCurso($id);
      redirect(base_url().'admin/cursos');

    }//end of eliminarCurso
    
/********************************* ARCHIVO  ***********************************/

    public function agregarArchivo($id){

      //echo "Voy a actualizar a --".$id."--";
      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;

      $data['opcionMenu'] = '1';
      $data['titulo'] = "Agregar Archivo";
      $data['id'] = $id;
      if (isset($id) && !empty($id)) {

        $query = $this->Admin_Model->getCursoByID($id);
        if ($query->num_rows()>0) {
          $data['existe'] = 1;
        }else{
          $data['existe'] = 0;
        }//end of else

      }else{
        $data['existe'] = 0;
      }//end of else

      $this -> load ->view('admin/header', $data);
      $this -> load ->view('admin/agregarArchivo', $data);
      $this -> load ->view('admin/footer');

    }//end of eliminarCurso

    public function guardarArchivo(){


      $this -> verificarCredenciales();
      $data['opcionMenu'] = '3';

      $idProgenitor = $this->input->post('state');
      echo "----.idProgenitor..".$idProgenitor."...-----";  
      $fechaSubida = date('Y-m-d'); 

      echo "Voy a actualizar a --".$idProgenitor."--";


      ////////////////////////////////
      $urlGuardar = ['archivos'];
      for ($i=0; $i < count($urlGuardar); $i++) {
        echo "for ".$i."--<BR>";
                    
        if($_FILES['archivo'.$i]['name'] == ''){
          $any = 'any';
          //echo "no guardas".$urlGuardar[$i]."<BR>";
        }else{
          //echo "guardas".$urlGuardar[$i]."<BR>";
          //obtener numero de registros de arcchivos

          //echo "-name-".$_FILES['archivo'.$i]['name']."--";

          $numeroDeregistros=$this->Archivos_Model -> getAllArchivosForLastID();
          foreach ($numeroDeregistros->result_array() as $rawArch) {}//end of ForEach
          $nombreMarc = intval($rawArch['id']) + 1;

          $temp = explode(".", $_FILES['archivo'.$i]["name"]);
          $extension = end($temp);
          $path = "./assets/contenido/".$urlGuardar[$i]."/";

          $filename = basename($_FILES['archivo'.$i]["name"]);
          $filename = $urlGuardar[$i].$nombreMarc.'.'.$extension;

          echo "<BR>-".$filename."-<BR>";

          if(move_uploaded_file($_FILES['archivo'.$i]["tmp_name"],$path . $filename)){
            echo "Uploaded";

            $data = array(
              'nombre' => $urlGuardar[$i].$nombreMarc.'.'.$extension,
              'titulo' => $_FILES['archivo'.$i]['name'],
              'extension' => $extension,
              'url' => $urlGuardar[$i],
              'fechaDeCreacion' => $fechaSubida,
              'idProgenitor' => $idProgenitor
            );

            $this->Archivos_Model->createArchivo($data);

          }else{
            echo "no subio archivo";
          }//end of else

        
        }//end of second else

                
      }//end of for 

      //echo "--FIN-----IF--.idProgenitor..".$idProgenitor."...-----";  
      redirect( base_url() . 'admin/curso/'.$idProgenitor); 




    }//end of eliminarCurso

    public function eliminarArchivo($id){

      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;


      echo "Voy a eliminar a --".$id."--";

      $query = $this->Archivos_Model->readArchivoNormal($id);

      if ($query->num_rows()>0){
        foreach ($query->result_array() as $raw) {}
        $idProgenitor = $raw['idProgenitor'];
        $del =  $raw['url']."/".$raw['nombre'];
        //borrar Imagen y row
        unlink('./assets/contenido/'.$del);
        $this->Archivos_Model->deleteArchivoNormal($id);                          
      }

      redirect( base_url() . 'admin/curso/'.$idProgenitor); 

    }//end of eliminarCurso
    
 /********************************* ACCESOS DE ADMIN  ***********************************/   
    public function ajustes(){
      $this -> verificarCredenciales();
      $di = $this->session->userdata('idSessionBack');
      $data['idse'] = $di;
      $data['opcionMenu'] = '5';
      $this -> load ->view('admin/header', $data);
      $this -> load ->view('admin/footer');

    }//end of ajustes

    public function salir(){
      $this -> session -> set_userdata(array(
              'idSessionBack' => '',
              'usuarioSessionBack' => '',
              'contraseniaSessionBack' => ''
      ));
      redirect(base_url().'admin/login');
    }//end of salir

    public function ingresar(){

        $data['titulo'] = "Ingresar";

        $this->form_validation->set_rules('usuario','usuario', 'required');
        $this->form_validation->set_rules('pass','pass', 'required');

        if($this->form_validation->run() == FALSE){
            echo "Disculpe las molestias hubo un error al intenta ingresar.";
        }else{

            $username = $this->input->post('usuario');
            $password = $this->input->post('pass');
            echo "else";
            $query = $this->Inicio_Model->verificarUsuarioBack($username, $password);

            if ($query->num_rows()>0) {

                foreach ($query->result_array() as $raw) {}
                //$this -> session -> set_userdata(array('username' => "---".$username));
                $data['idSesionBack'] = $raw['id'];
                $data['usuarioSesionBack'] = $raw['numeroDeEmpleado'];
                $data['contraseniaSesionBack'] = $raw['password'];

                echo '<BR>idSesion'.$raw['id'];
                echo '<BR>usuarioSesion'.$raw['numeroDeEmpleado'];
                echo '<BR>contraseniaSesion'.$raw['password'];

                $this -> session -> set_userdata(array(
                                                        'idSessionBack' => $data['idSesionBack'],
                                                        'usuarioSessionBack' => $data['usuarioSesionBack'],
                                                        'contraseniaSessionBack' => $data['contraseniaSesionBack']
                                                        ));
                redirect( base_url() . 'backInicio/');
            }else{
                $this -> login();
                //echo "string";
            }
        }//end of else
    }//end of ingresa -- NO SE PARA QUE ES?

    public function registro(){
        $data['titulo'] = "LOGIN";
        
        $this->load->view('layout/frontEnd/header', $data);
        $this->load->view('frontEnd/inicio/login', $data);
        $this-> frase();
        $this->load->view('layout/frontEnd/footer', $data);
    }// --NO SE PARA QUE SIRVE

}//end of fu