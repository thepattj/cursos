<?php defined('BASEPATH') OR exit('No direct script access allowed');

class curso extends CI_Controller {

	function __construct(){
      	parent::__construct();
        $this->load->model('Curso_Model');
        $this->load->model('Archivos_Model');
        date_default_timezone_set('America/Mexico_City');
   	}

    function index(){
        redirect( 'http://www.colegiodeingenieroscivilesdequeretaro.org/');
    }//end of index



    function verificarCredenciales(){
        //verificar Login
        $idSessionNew = $this->session->userdata('idSessionBack');
        //echo "==".$idSessionNew."==<BR>";
        $idNum = strlen($idSessionNew);

        if ($idNum  > 0 ) {
            //verificar Acceso
            $any = "any";
            //echo "past";
        }else{
            redirect( base_url() . 'backInicio/login');
            //
            //echo "else";
            exit;
        }//end of else
    }//end Credenciales




    function noTienesAcceso(){
        echo "No tienes Acceso";
        $this -> load ->view('cursos/sinAcceso');
    }//end of sinAcceso








/**

    function ingresar($id){

        if (isset($id) && !empty($id)) {

            $query  = $this -> Curso_Model -> verificarExistencia($id);

            if ($query->num_rows()>0) {
                #Existe
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


                //ARCHIVOS
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

                $this->load->view('cursos/login', $data);


            }else{
                echo "no existe";
                //redirect(base_url()."/noExiste");
            }//end of else
            
            //$this -> verificarPermiso($id, $sessionPass);


        }else{
           redirect(base_url()."curso/noTienesAcceso");
        }//end of else


    }//end of ingresar
**/









    function ingresar($id){

        if (isset($id) && !empty($id)) {

            $query  = $this -> Curso_Model -> verificarExistencia($id);

            if ($query->num_rows()>0) {
                #Existe
                foreach ($query->result_array() as $rew) {}//end of ForEach
                $data['id'] = $rew['id'];
                $data['nombre'] = $rew['nombre'];
                $data['colorBorde'] = $rew['colorBorde'];
                $data['colorBoton'] = $rew['colorBoton'];
                $data['colorFuente'] = $rew['colorFuente'];
                $data['publicado'] = $rew['publicado'];

                //ARCHVIVOS

                //FONDO
                $queryImg = $this->Archivos_Model->readArchivo($rew['id'], 'fondo');
                if ($queryImg->num_rows()>0) {
                    foreach ($queryImg->result_array() as $ruwF) {
                        $data['fondo'] = $ruwF['url']."/".$ruwF['nombre']; 
                        $data['fondoID'] = $ruwF['id'];
                    }//end of foreach
                }//end of if


                $this->load->view('cursos/login', $data);

            }else{
                echo "no existe";
                //redirect(base_url()."/noExiste");
            }//end of else
            

        }else{
           redirect(base_url()."curso/noTienesAcceso");
        }//end of else


    }//end of ingresar



    function verificarContrasenia(){

        $this->form_validation->set_rules('pass','pass', 'required');
        $this->form_validation->set_rules('country','country', 'required');

        if($this->form_validation->run() == FALSE){

            echo "Redirigir a formulario ingresar";

        }else{

            $password = $this->input->post('pass');
            $country = $this->input->post('country');


            $query  = $this -> Curso_Model -> verificarExistencia($country);

            if ($query->num_rows()>0) {
                #Existe
                foreach ($query->result_array() as $rew) {}//end of ForEach
                $id = $rew['id'];
                $contrasenia = $rew['contrasenia'];


                if (($contrasenia == $password) && ($id == $country)) {

                    echo "cocorrecto";
                    $this -> session -> set_userdata(array('passSessionUsu' => $password));
                    redirect( base_url() . 'curso/bienvenido/'.$country);

                }else{
                    //echo "ingresar de nuevo";
                    redirect( base_url() . 'curso/accesoIncorrecto/'.$country);
                }//end of if


            }//end of if

        }//end of else

    }//end of verificarContraseña



    function accesoIncorrecto($id){

        if (isset($id) && !empty($id)) {

            $query  = $this -> Curso_Model -> verificarExistencia($id);

            if ($query->num_rows()>0) {
                #Existe
                foreach ($query->result_array() as $rew) {}//end of ForEach
                $data['id'] = $rew['id'];
                $data['nombre'] = $rew['nombre'];
                $data['colorBorde'] = $rew['colorBorde'];
                $data['colorBoton'] = $rew['colorBoton'];
                $data['colorFuente'] = $rew['colorFuente'];
                $data['publicado'] = $rew['publicado'];

                //ARCHVIVOS

                //FONDO
                $queryImg = $this->Archivos_Model->readArchivo($rew['id'], 'fondo');
                if ($queryImg->num_rows()>0) {
                    foreach ($queryImg->result_array() as $ruwF) {
                        $data['fondo'] = $ruwF['url']."/".$ruwF['nombre']; 
                        $data['fondoID'] = $ruwF['id'];
                    }//end of foreach
                }//end of if


                $this->load->view('cursos/loginDos', $data);

            }else{
                echo "no existe";
                //redirect(base_url()."/noExiste");
            }//end of else
            
            //$this -> verificarPermiso($id, $sessionPass);


        }else{
           redirect(base_url()."curso/noTienesAcceso");
        }//end of else

    }//end of accesoIncorrecto


    function noExiste(){
        $this -> load ->view('cursos/noExiste');
    }


    function bienvenido($id){

        if (isset($id) && !empty($id)) {

            $query  = $this -> Curso_Model -> verificarExistencia($id);

            if ($query->num_rows()>0) {
                #Existe
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


                //ARCHIVOS
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

                $this->load->view('cursos/portafolio', $data);


            }else{
                echo "no existe";
                //redirect(base_url()."/noExiste");
            }//end of else
            
            //$this -> verificarPermiso($id, $sessionPass);


        }else{
           redirect(base_url()."curso/noTienesAcceso");
        }//end of else


    }//end of home 





    function contenido($id){

        if (isset($id) && !empty($id)) {

            $query  = $this -> Curso_Model -> verificarExistencia($id);

            if ($query->num_rows()>0) {
                #Existe
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


                //ARCHIVOS
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

                $this->load->view('cursos/contenido', $data);


            }else{
                echo "no existe";
                //redirect(base_url()."/noExiste");
            }//end of else
            
            //$this -> verificarPermiso($id, $sessionPass);


        }else{
           redirect(base_url()."curso/noTienesAcceso");
        }//end of else


    }//end of contenido










/***********************************************************************
*****************************LOCALIDADES********************************
************************************************************************/

    public function localidades(){
        $data['titulo'] = "LOCALIDADES";
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        $contador = 0;
        $query = $this->Directorio_Model->getAllLocalidades();
        $data['total'] = $query -> num_rows();
        if ($query->num_rows()>0) {

            foreach($query->result_array() as $row){
                $data['id'][$contador] = $row['id'];
                $data['nombre'][$contador] = $row['nombre'];

                $contador ++;
            }//end of forEach

        }//end of if

        $this -> load ->view('layout/backEnd/header', $data);
        $this -> load ->view('layout/backEnd/menu', $data);
        $this->load->view('backEnd/directorio/localidades', $data);
        $this -> load ->view('layout/backEnd/footer', $data);
    }//end of localidad


    public function localidad($id){
        $data['titulo'] = "Localidad";
        $data['IDE'] = $id;
        $IDE = $id;
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        $query = $this->Directorio_Model->readLocalidad($id);

        if ($query->num_rows()>0) {
            $data['existe'] = 1;
            foreach($query->result_array() as $row){
                $data['id'] = $row['id'];
                $data['nombre'] = $row['nombre'];
                $data['coordX'] = $row['coordX'];
                $data['coordY'] = $row['coordY'];
                $data['direccion'] = $row['direccion'];

                //OBTENER TELEFONOS DE LOCALIDAD 
                $queryContacto = $this->Directorio_Model->readContacto($IDE, 'localidad');
                $data['contacto'] =  $queryContacto -> num_rows();

                if ($queryContacto->num_rows()>0) {
                    $contador = 0;
                    foreach ($queryContacto->result_array() as $rew) {
                        $data['idCotacto'][$contador] = $rew['id']; 
                        $data['numero'][$contador] = $rew['numero']; 
                        $contador ++;
                    }//end of for
                }//end of if

            }//end of forEach
        }else{
            $data['existe'] = 0;
        }

        $this -> load ->view('layout/backEnd/header', $data);
        $this -> load ->view('layout/backEnd/menu', $data);
        $this -> load ->view('backEnd/directorio/localidad', $data);
        $this -> load ->view('layout/backEnd/footer', $data);

    }//end of localidad



    public function crearLocalidad(){
        $data['titulo'] = "CREAR LOCALIDAD";
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        $this -> load ->view('layout/backEnd/header', $data);
        $this -> load ->view('layout/backEnd/menu', $data);
        $this->load->view('backEnd/directorio/crearLocalidad', $data);
        $this -> load ->view('layout/backEnd/footer', $data);
    }//end of localidad



    public function guardarLocalidad(){
        $data['titulo'] = "GUARDAR LOCALIDAD";
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        echo "<BR> nombre -".$this->input->post('nombre');
        echo "<BR> coorX - ".$this->input->post('coorX');
        echo "<BR> coorY -".$this->input->post('coorY');
        echo "<BR> coorY -".$this->input->post('direccion');

        for ($i=0; $i < 5; $i++) { 
            $j = $i +1;
            echo "<BR> tel -".$this->input->post('tel'.$j)."-";
        }


            $data = array(
                'nombre' => $this->input->post('nombre'),
                'coordX' => $this->input->post('coorX'),
                'coordY' => $this->input->post('coorY'),
                'direccion' => $this->input->post('direccion')
            );

            $this->Directorio_Model->createLocalidad($data);

            $obtenerInfo = $this->Directorio_Model->getLocalidadwhereInfo($data);

            if ($obtenerInfo->num_rows()>0) {

                foreach ($obtenerInfo->result_array() as $rew) {}//end of ForEach
                $idProgenitor = $rew['id'];
                echo "----.idProgenitor..".$idProgenitor."...-----";  

                ////////////////////////////////
                $j = 0;
                for ($i=0; $i < 5; $i++) {
                    $j = $i +1;
                    echo "for -I-".$i."-J-".$j."-<BR>";

                    $relleno = $this->input->post('tel'.$j);
                    
                    if(strlen($relleno) > 2){
                        $data = array(
                            'idProgenitor' => $idProgenitor,
                            'progenitor' => 'localidad',
                            'numero' => $relleno
                        );
                        $this->Directorio_Model->createContacto($data);

                    }//end of else
                
                }//end of for 
                //redirect( base_url() . 'backDirectorio/localidad/'.$idProgenitor);                         
                    
            }else{ 
                echo "error no existe Localidad"; 
                echo "Hubo un error, intentar hacerlo de nuevo";
            }

           //redirect( base_url() . 'bapropiacion/publicacion/'.$idR."/".$idPublicacion);       
            
        //END OF CONTENIDO SUPAH CAKE 

    }//end of localidad



    public function editarLocalidad($id){
        $data['titulo'] = "Localidad";
        $data['IDE'] = $id;
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        $query = $this->Directorio_Model->readLocalidad($id);

        if ($query->num_rows()>0) {
            $data['existe'] = 1;
            foreach($query->result_array() as $row){
                $data['id'] = $row['id'];
                $data['nombre'] = $row['nombre'];
                $data['coordX'] = $row['coordX'];
                $data['coordY'] = $row['coordY'];
                $data['direccion'] = $row['direccion'];

                //OBTENER TELEFONOS DE LOCALIDAD 
                $queryContacto = $this->Directorio_Model->readContacto($id, 'localidad');
                $data['contacto'] =  $queryContacto -> num_rows();

                if ($queryContacto->num_rows()>0) {
                    $contador = 0;
                    foreach ($queryContacto->result_array() as $rew) {
                        $data['idContacto'][$contador] = $rew['id']; 
                        $data['numero'][$contador] = $rew['numero']; 
                        $contador ++;
                    }//end of for
                }//end of if

            }//end of forEach
        }else{
            $data['existe'] = 0;
        }

        $this -> load ->view('layout/backEnd/header', $data);
        $this -> load ->view('layout/backEnd/menu', $data);
        $this->load->view('backEnd/directorio/editarLocalidad', $data);
        $this -> load ->view('layout/backEnd/footer', $data);

    }//end of localidad



    public function actualizarLocalidad(){
        $data['titulo'] = "Actualizar Localidad";
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        //Actualizar Informacion Basica
        $idProgenitor = $this->input->post('state');
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'coordX' => $this->input->post('coorX'),
            'coordY' => $this->input->post('coorY'),
            'direccion' => $this->input->post('direccion')
        );
        $this->Directorio_Model->updateLocalidad($idProgenitor, $data);

        //eliminar Contacto
        $this->Directorio_Model->deleteContactoWhere($idProgenitor, 'localidad');

        //Crear Contacto
                $j = 0;
                for ($i=0; $i < 5; $i++) {
                    $j = $i +1;

                    $relleno = $this->input->post('tel'.$j);
                    
                    if(strlen($relleno) > 2){
                        $data = array(
                            'idProgenitor' => $idProgenitor,
                            'progenitor' => 'localidad',
                            'numero' => $relleno
                        );
                        $this->Directorio_Model->createContacto($data);
                    }//end of else
                
                }//end of for 
        
        redirect( base_url() . 'backDirectorio/localidad/'.$idProgenitor);                         

    }//end of localidad



    public function eliminarLocalidad($id){
        $data['titulo'] = "Eliminar Localidad";
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        $idProgenitor = $id;
        $this->Directorio_Model->deleteContactoWhere($idProgenitor, 'localidad');
        $this->Directorio_Model->deleteLocalidad($idProgenitor);  

        redirect( base_url() . 'backDirectorio/localidades/');  

    }//end of localidad




/***********************************************************************
****************************COLABORADORESS********************************
************************************************************************/



    public function mostrarColaboradoress(){
        $data['titulo'] = "COLABORADORES";
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        $this -> load ->view('layout/backEnd/header', $data);
        $this -> load ->view('layout/backEnd/menu', $data);
        $this->load->view('backEnd/directorio/mostarColaboradoress', $data);
        $this -> load ->view('layout/backEnd/footer', $data);
    }//end of localidad


    public function colaboradoress(){
        $data['titulo'] = "COLABORADORES";
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        $contador = 0;
        $query = $this->Directorio_Model->getAllColaboradoress();
        $data['total'] = $query -> num_rows();
        if ($query->num_rows()>0) {

            foreach($query->result_array() as $row){
                $data['id'][$contador] = $row['id'];
                $data['nombre'][$contador] = $row['nombre'];

                //OBTENER IMAGEN DEL PRODUCTO
                $rul = "colaboradores";
                $queryImg = $this->Archivos_Model->readArchivo($row['id'], $rul);

                if ($queryImg->num_rows()>0) {
                    foreach ($queryImg->result_array() as $rew) {}
                    $data['imagen'][$contador] =  $rew['url']."/".$rew['nombre']; 
                }else{
                    $data['imagen'][$contador] =  "/noEncontrada.png";
                }//end of else

                $contador ++;
            }//end of forEach

        }//end of if

        $this -> load ->view('layout/backEnd/header', $data);
        $this -> load ->view('layout/backEnd/menu', $data);
        $this->load->view('backEnd/directorio/colaboradoress', $data);
        $this -> load ->view('layout/backEnd/footer', $data);
    }//end of localidad



    public function colaboradorr($id){
        $data['titulo'] = "Colaborador";
        $data['IDE'] = $id;
        $IDE = $id;
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        $query = $this->Directorio_Model->readColaboradorr($id);

        if ($query->num_rows()>0) {
            $data['existe'] = 1;
            foreach($query->result_array() as $row){

                $data['id'] = $row['id'];
                $data['numeroColaborador'] = strtoupper($row['numeroColaborador']);
                $data['nombre'] = strtoupper($row['nombre']);
                $data['fechaDeCreacion'] = $row['fechaDeCreacion'];
                $data['puesto'] = strtoupper($row['puesto']);
                $data['correo'] = strtoupper($row['correo']);
                $data['contrasenia'] = $row['contrasenia'];
                $data['localidad'] = $row['localidad'];
                $data['ext'] = $row['ext'];
                $data['cel'] = $row['cel'];
                $data['dir'] = $row['dir'];
                $data['tel'] = $row['tel'];


                //OBTENER IMAGEN DEL PRODUCTO
                $rul = "colaboradores";
                $queryImg = $this->Archivos_Model->readArchivo($row['id'], $rul);

                if ($queryImg->num_rows()>0) {
                    foreach ($queryImg->result_array() as $riw) {}
                    $data['imagen'] =  $riw['url']."/".$riw['nombre']; 
                }else{
                    $data['imagen'] =  "/noEncontrada.png";
                }//end of else

            }//end of forEach
        }else{
            $data['existe'] = 0;
        }

        $this -> load ->view('layout/backEnd/header', $data);
        $this -> load ->view('layout/backEnd/menu', $data);
        $this -> load ->view('backEnd/directorio/colaboradorr', $data);
        $this -> load ->view('layout/backEnd/footer', $data);

    }//end of localidad



    public function crearColaboradorr(){
        $data['titulo'] = "CREAR COLABORADOR";
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        $contador = 0;
        $query = $this->Directorio_Model->getAllLocalidades();
        $data['total'] = $query -> num_rows();
        if ($query->num_rows()>0) {

            foreach($query->result_array() as $row){
                $data['id'][$contador] = $row['id'];
                $data['nombre'][$contador] = $row['nombre'];
                $contador ++;
            }//end of forEach

        }//end of if

        $this -> load ->view('layout/backEnd/header', $data);
        $this -> load ->view('layout/backEnd/menu', $data);
        $this->load->view('backEnd/directorio/crearColaboradorr', $data);
        $this -> load ->view('layout/backEnd/footer', $data);
    }//end of localidad



    public function guardarColaboradorr(){
        $data['titulo'] = "GUARDAR LOCALIDAD";
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

/*        echo "<BR> nombre -".$this->input->post('nombre');
        echo "<BR> apellido - ".$this->input->post('apellido');
        echo "<BR> fechaDeCreacion -".$this->input->post('fechaDeCreacion');
        echo "<BR> localidad -".$this->input->post('localidad');*/

            $data = array(
                'numeroColaborador' => $this->input->post('numeroColaborador'),
                'nombre' => $this->input->post('nombre'),
                'fechaDeCreacion' => $this->input->post('fechaDeCreacion'),
                'puesto' => $this->input->post('puesto'),
                'correo' => $this->input->post('correo'),
                'contrasenia' => $this->input->post('contrasenia'),
                'localidad' => $this->input->post('localidad'),
                'ext' => $this->input->post('ext'),
                'cel' => $this->input->post('cel'),
                'dir' => $this->input->post('dir'),
                'tel' => $this->input->post('tel')
            );
            echo "uno";
            $this->Directorio_Model->createColaboradorr($data);

            $obtenerInfo = $this->Directorio_Model->getColaboradorwhereInfoo($data);

            if ($obtenerInfo->num_rows()>0) {

                foreach ($obtenerInfo->result_array() as $rew) {}//end of ForEach
                $idProgenitor = $rew['id'];
                echo "----.idProgenitor..".$idProgenitor."...-----";  


////////////////////IMG//////////////////////////

                ////////////////////////////////
                $urlGuardar = 'colaboradores';
                for ($i=0; $i < 1; $i++) {
                    echo "for ".$i."--<BR>";
                    
                    if($_FILES['userfile1']['name'] == ''){
                        $any = 'any';
                    }else{

                        //obtener numero de registros de arcchivos
                        $numeroDeregistros=$this->Archivos_Model -> getAllArchivosForLastID();
                        foreach ($numeroDeregistros->result_array() as $rawArch) {}//end of ForEach
                        $nombreMarc = intval($rawArch['id']) + 1;

                        $temp = explode(".", $_FILES['userfile1']["name"]);
                        $extension = end($temp);
                        $path = "./assets/administrables/".$urlGuardar."/";

                        $filename = basename($_FILES['userfile1']["name"]);
                        $filename = $urlGuardar.$nombreMarc.'.'.$extension;

                        echo "<BR>-".$filename."-<BR>";

        /*$hDay = $this -> Fecha_Model -> getTodayDate();
        foreach ($hDay->result_array() as $riw) {}
        $fechaSubida = $riw['dia'];*/

        $fechaSubida = date('Y-m-d'); 
                        
                        if(move_uploaded_file($_FILES['userfile1']["tmp_name"],$path . $filename)){
                            echo "Uploaded";

                            $data = array(
                                'nombre' => $urlGuardar.$nombreMarc.'.'.$extension,
                                'extension' => $extension,
                                'url' => $urlGuardar,
                                'fechaDeCreacion' => $fechaSubida,
                                'idProgenitor' => $idProgenitor
                            );

                            $this->Archivos_Model->createArchivo($data);

                        }else{
                            echo "errorrrr";
                        }

                    }//end of else
                
                }//end of for 


            redirect( base_url() . 'backDirectorio/colaboradorr/'.$idProgenitor);                         
                    
            }else{ 
                echo "error no existe Colaborador"; 
                echo "Hubo un error, intentar hacerlo de nuevo";
            }

           //redirect( base_url() . 'bapropiacion/publicacion/'.$idR."/".$idPublicacion);       
            
        //END OF CONTENIDO SUPAH CAKE 

    }//end of localidad



    public function editarColaboradorr($id){
        $data['titulo'] = "Localidad";
        $data['IDE'] = $id;
        $IDE = $id;
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        $query = $this->Directorio_Model->readColaboradorr($id);

        if ($query->num_rows()>0) {
            $data['existe'] = 1;
            foreach($query->result_array() as $row){;

                $data['id'] = $row['id'];
                $data['numeroColaborador'] = strtoupper($row['numeroColaborador']);
                $data['nombre'] = strtoupper($row['nombre']);
                $data['fechaDeCreacion'] = $row['fechaDeCreacion'];
                $data['puesto'] = strtoupper($row['puesto']);
                $data['correo'] = strtoupper($row['correo']);
                $data['contrasenia'] = $row['contrasenia'];
                $data['localidad'] = $row['localidad'];
                $data['ext'] = $row['ext'];
                $data['cel'] = $row['cel'];
                $data['dir'] = $row['dir'];
                $data['tel'] = $row['tel'];

            }//end of forEach
        }else{
            $data['existe'] = 0;
        }

        $contador = 0;
        $query = $this->Directorio_Model->getAllLocalidades();
        $data['totalL'] = $query -> num_rows();
        if ($query->num_rows()>0) {

            foreach($query->result_array() as $row){
                $data['idL'][$contador] = $row['id'];
                $data['nombreL'][$contador] = $row['nombre'];
                $contador ++;
            }//end of forEach

        }//end of if

        $this -> load ->view('layout/backEnd/header', $data);
        $this -> load ->view('layout/backEnd/menu', $data);
        $this->load->view('backEnd/directorio/editarColaboradorr', $data);
        $this -> load ->view('layout/backEnd/footer', $data);

    }//end of localidad


    public function actualizarColaboradorr(){
        $data['titulo'] = "Actualizar Localidad";
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        //Actualizar Informacion Basica
        $idProgenitor = $this->input->post('state');

        $data = array(
                'numeroColaborador' => $this->input->post('numeroColaborador'),
                'nombre' => $this->input->post('nombre'),
                'fechaDeCreacion' => $this->input->post('fechaDeCreacion'),
                'puesto' => $this->input->post('puesto'),
                'correo' => $this->input->post('correo'),
                'contrasenia' => $this->input->post('contrasenia'),
                'localidad' => $this->input->post('localidad'),
                'ext' => $this->input->post('ext'),
                'cel' => $this->input->post('cel'),
                'dir' => $this->input->post('dir'),
                'tel' => $this->input->post('tel')
        );

        $this->Directorio_Model->updateColaboradorr($idProgenitor, $data);

            ////////////////////////////////
            $urlGuardar = 'colaboradores';
                
                if($_FILES['userfile1']['name'] == ''){
                    $any = 'any';
                    echo "no cambio archivo";
                }else{

                    $query = $this->Archivos_Model->readArchivo($idProgenitor, $urlGuardar);

                    if ($query->num_rows()>0){
                        foreach ($query->result_array() as $raw) {}
                        $del =  $raw['url']."/".$raw['nombre'];
                        //borrar Imagen y row
                        unlink('./assets/administrables/'.$del);
                        $this->Archivos_Model->deleteArchivo($idProgenitor, $urlGuardar);                          
                    }


  //obtener numero de registros de arcchivos
                        $numeroDeregistros=$this->Archivos_Model -> getAllArchivosForLastID();
                        foreach ($numeroDeregistros->result_array() as $rawArch) {}
                        $nombreNew = intval($rawArch['id']) + 1;

                        $temp = explode(".", $_FILES['userfile1']["name"]);
                        $extension = end($temp);
                        $path = "./assets/administrables/".$urlGuardar."/";

                        $filename = basename($_FILES['userfile1']["name"]);
                        $filename = $urlGuardar.$nombreNew.'.'.$extension;

                        echo "<BR>-".$filename."-<BR>";

                        if(move_uploaded_file($_FILES['userfile1']["tmp_name"],$path . $filename)){
                            echo "Uploaded";

                            $fechaSubida = date('Y-m-d'); 

                            $data = array(
                                'nombre' => $urlGuardar.$nombreNew.'.'.$extension,
                                'extension' => $extension,
                                'url' => $urlGuardar,
                                'fechaDeCreacion' => $fechaSubida,
                                'idProgenitor' => $idProgenitor
                            );

                            $this->Archivos_Model->createArchivo($data);

                            //redirect( base_url() . 'backNoticias/noticia/'.$idProgenitor);   

                        }else{
                            echo "errorrrr";
                        }

                }//end of else  

        
        redirect( base_url() . 'backDirectorio/colaboradorr/'.$idProgenitor);                         

    }//end of localidad



    public function eliminarColaboradorr($id){
        $data['titulo'] = "Eliminar Colaborador";
        $this -> verificarCredenciales();
        $data['nombreLogin'] = $this->session->userdata('usuarioSessionBack');

        $idProgenitor = $id;
            
            $query = $this->Archivos_Model->readArchivo($idProgenitor, 'colaboradores');

            if ($query->num_rows()>0){
               foreach ($query->result_array() as $raw) {}
               $del =  $raw['url']."/".$raw['nombre'];
                        //borrar Imagen y row
               unlink('./assets/administrables/'.$del);
               $this->Archivos_Model->deleteArchivo($idProgenitor, 'colaboradores');                         
            }

        $this->Directorio_Model->deleteColaboradorr($idProgenitor);  

        //redirect( base_url() . 'backDirectorio/colaboradoress/');  

    }//end of localidad

}














