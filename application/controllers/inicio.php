<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct(){
      	parent::__construct();
      	//Se carga el modelo a usar.
      	$this->load->model('backEnd/Inicio_Model');
      	$this->load->model('backEnd/Noticias_Model');
        $this->load->model('Archivos_Model');
        date_default_timezone_set('America/Mexico_City');
   	}


    public function ejemplo(){
        $data['titulo'] = "LOGIN";
        
        $this->load->view('layout/frontEnd/header', $data);
        $this->load->view('frontEnd/inicio/ejemplo', $data);
        $this->load->view('layout/frontEnd/footer', $data);
    }

    public function ejemploDos(){
       /* $data['titulo'] = "LOGIN";
        
        $this->load->view('layout/frontEnd/header', $data);
        $this->load->view('frontEnd/inicio/ejemplo', $data);
        $this->load->view('layout/frontEnd/footer', $data);*/



        $this ->verificarCredenciales();
        $data['titulo'] = "HOME";
        $data['varMenu'] = 1;



        $this->load->view('layout/frontEnd/header', $data);
        $this -> load ->view('layout/frontEnd/menuAzulTransparente', $data);
        $this->load->view('frontEnd/inicio/ejemplo', $data);
        $this-> frase();
        $this->load->view('layout/frontEnd/footer', $data);

    }


    public function login(){
        $data['titulo'] = "LOGIN";
        
        $this->load->view('layout/frontEnd/header', $data);
        $this->load->view('frontEnd/inicio/login', $data);
        $this->load->view('layout/frontEnd/footer', $data);
    }

    public function ingresar(){

        $data['titulo'] = "Ingresar";

        $this->form_validation->set_rules('numero','numero', 'required');
        $this->form_validation->set_rules('usuario','usuario', 'required');
        $this->form_validation->set_rules('pass','pass', 'required');

        if($this->form_validation->run() == FALSE){

            echo "Disculpe las molestias hubo un error al intenta ingresar.";

        }else{

            $numero = $this->input->post('numero');
            $username = $this->input->post('usuario');
            $password = $this->input->post('pass');


            $query = $this->Inicio_Model->verificarUsuario($numero);

            if ($query->num_rows()>0) {


                foreach ($query->result_array() as $raw) {}
                //$this -> session -> set_userdata(array('username' => "---".$username));
                $data['idSesion'] = $raw['id'];
                $data['usuarioSesion'] = $raw['numeroColaborador'];
                $data['contraseniaSesion'] = $raw['contrasenia'];

                $aprobado = $raw['up'];


                echo '<BR>idSesion'.$raw['id'];
                echo '<BR>usuarioSesion'.$raw['numeroColaborador'];
                echo '<BR>contraseniaSesion'.$raw['contrasenia'];


                $this -> session -> set_userdata(array(
                                                        'idSession' => $data['idSesion'],
                                                        'usuarioSession' => $raw['numeroColaborador'],
                                                        'contraseniaSession' => $raw['contrasenia'],
                                                        'aprobado' => $aprobado
                                                        ));

                //$this -> load ->view('backEnd/home/index');
                echo "<BR>--".$this->session->userdata('usuarioSession')."--<BR>";
                echo "<BR>--".$this->session->userdata('idSession')."--<BR>";
                echo "<BR>--".$this->session->userdata('contraseniaSession')."--<BR>";

                if ($aprobado == '1') {
                    echo "<BR>1";
                    $sUsuario = $username;
                    $sClave = $password;
                    $sEmpresa = "pilgrims-mex";
                    $sDominio = "corp";
                    
                    $dn = 'dc=$sEmpresa,dc=$sDominio'; 
                    
                    $ldapconn = ldap_connect("$sEmpresa.$sDominio",389) or die("ERROR: No se pudo conectar con el Servidor LDAP."); 
                    
                    if ($ldapconn){
                    echo "<BR>2";

                        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION,3); 
                        ldap_set_option($ldapconn, LDAP_OPT_REFERRALS,0); 
                        $ldapbind = @ldap_bind($ldapconn, "$sUsuario@$sEmpresa.$sDominio", $sClave); 
                        if ($ldapbind) {
                                                echo "<BR>3";

                            redirect( base_url() . 'inicio/');
                        } else { 
                                                echo "<BR>4";

                            redirect( base_url() . 'inicio/login');
                        }
                    }else{
                    echo "<BR>5";

                        redirect( base_url() . 'inicio/login');
                    }
                    ldap_close($ldapconn);
                            
                    
                    
                    redirect( base_url() . 'inicio/');    
                    //echo "si-".$aprobado."--";
                }else{
                    redirect( base_url() . 'sociales/usuarioObligatorio');
                    //echo "no-".$aprobado."--";
                }

                

            }else{
                $this -> login();
                //echo "string";
            }

        }//end of else
    }//end of fun

    public function ingresarr(){

        $data['titulo'] = "Ingresar";

        $this->form_validation->set_rules('numero','numero', 'required');
        $this->form_validation->set_rules('usuario','usuario', 'required');
        $this->form_validation->set_rules('pass','pass', 'required');

        if($this->form_validation->run() == FALSE){

            echo "Disculpe las molestias hubo un error al intenta ingresar.";

        }else{

            $numero = $this->input->post('numero');
            $username = $this->input->post('usuario');
            $password = $this->input->post('pass');

            echo "else";

            $query = $this->Inicio_Model->verificarUsuario($numero);

            if ($query->num_rows()>0) {

echo "1";
                $sUsuario = $username;
                $sClave = $password;
                $sEmpresa = "pilgrims-mex";
                $sDominio = "corp";
echo "<BR>3";
                $dn = 'dc=$sEmpresa,dc=$sDominio'; 
echo "<BR>4";
               
                $ldapconn = ldap_connect("$sEmpresa.$sDominio",389)or die("ERROR: No se pudo conectar con el Servidor LDAP.");
                //"LDAP://OU=Domain Controllers,DC=pilgrims-mex,DC=corp"

echo "<BR>2";
                if ($ldapconn){
                    ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION,3); 
                    ldap_set_option($ldapconn, LDAP_OPT_REFERRALS,0); 
                    $ldapbind = @ldap_bind($ldapconn, "$sUsuario@$sEmpresa.$sDominio", $sClave); 
                    if ($ldapbind) {
                        echo "Usuario autenticado";
                    } else { 
                        echo "Usuario no autenticado...".ldap_error($ldapconn);; 
                    }
                }else{
                    echo "no";
                }
                ldap_close($ldapconn);
                                            
                    

            }else{
                $this -> login();
                //echo "string";
            }

        }//end of else
    }//end of fun


    function verificarCredenciales(){
        //verificar Login

        $idSessionNew = $this->session->userdata('idSession');
        $idSessionNew = $this->session->userdata('idSession');
        //echo "==".$idSessionNew."==<BR>";
        $idNum = strlen($idSessionNew);
        $aprobado = $this->session->userdata('aprobado');

        if ($idNum  > 0 ) {
            //verificar Acceso
            $any = "any";
            //echo "past";

                if ($aprobado == '1') {
                    $any = "any";
                }else{
                    redirect( base_url() . 'sociales/usuarioObligatorio');
                    echo "<BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR>-ap-".$aprobado."--";
                }


        }else{
            redirect( base_url() . 'inicio/login');
            //
            //echo "else";
            exit;
        }//end of else
    }//end Credenciales

    public function guardarInfo($lugar){
        /*$hDay = $this -> Fecha_Model -> getTodayDate();
        foreach ($hDay->result_array() as $riw) {}
        $fechaSubida = $riw['dia'];*/

        $fechaSubida = date('Y-m-d'); 

        $data = array(
            'lugar' => $lugar,
            'colaborador' => $this->session->userdata('usuarioSession'),
            'fecha' => $fechaSubida,
        );

        $this->Archivos_Model->createVisita($data);
    }

    public function registro(){
        $data['titulo'] = "LOGIN";
        
        $this->load->view('layout/frontEnd/header', $data);
        $this->load->view('frontEnd/inicio/login', $data);
        $this-> frase();
        $this->load->view('layout/frontEnd/footer', $data);
    }

    public function frase(){
        $id = 1;
        $query = $this -> Inicio_Model -> readFrase($id);
        if ($query->num_rows()>0) {
            foreach($query->result_array() as $row){}
            $data['frase'] = $row['frase'];
            $this->load->view('layout/frontEnd/frase', $data);
        }//end of if
    }//end of frase


	public function index()
	{
        $this ->verificarCredenciales();
		$data['titulo'] = "HOME";
		$data['varMenu'] = 1;
        $data['migajas'] = [];
        $data['migajasLink'] = [];
        $this -> guardarInfo("inicio");

        //info Banners
        $contador = 0;
        $query = $this->Inicio_Model->getAllFromBanner();
        $data['total'] = $query -> num_rows();
        if ($query->num_rows()>0) {
            foreach($query->result_array() as $row){
                $data['id'][$contador] = $row['id'];
                $data['tipo'][$contador] = $row['tipo'];

                $rul = "banner";
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

        //infoCalendarios
        $contador = 0;
        $queryCalendario = $this->Inicio_Model->getAllCalendarios();
        if ($queryCalendario->num_rows()>0) {

            foreach($queryCalendario->result_array() as $rowC){
                $data['nombre'][$contador] = $rowC['nombre'];

                $rulC = "calendario";
                $queryImgC = $this->Archivos_Model->readArchivo($rowC['id'], $rulC);

                if ($queryImgC->num_rows()>0) {
                    foreach ($queryImgC->result_array() as $rewC) {}
                    $data['imagenC'][$contador] =  $rewC['url']."/".$rewC['nombre']; 
                }else{
                    $data['imagenC'][$contador] =  "/noEncontrada.png";
                }//end of else

                $contador ++;
            }//end of forEach

        }//end of if

        $contadorUp = 0;
        $queryUpdates = $this->Noticias_Model->getAllFromNoticiaFront();
        $data['totalUps'] = $queryUpdates -> num_rows();
        //echo "---".$data['totalUps']."--";
        if ($queryUpdates->num_rows()>0) {
            foreach($queryUpdates->result_array() as $rowUp){
                //echo "<BR>-".$rowUp['idProgenitor']."--".$rowUp['url']."--";



                $data['urlUP'][$contadorUp] =  'noticia'; 
                $data['idProgenitorUP'][$contadorUp] =  $rowUp['id'];

                $data['txtUP'][$contadorUp] =  mb_strcut($rowUp['titulo'], 0, 20, "UTF-8").'...';
                //mb_strcut($row['titulo'], 0, 20, "UTF-8").'...';  

                //OBTENER IMAGEN DEL PRODUCTO
                $rulN = "noticia";
                $queryImgN = $this->Archivos_Model->readArchivo($rowUp['id'], $rulN);

                if ($queryImgN->num_rows()>0) {
                    foreach ($queryImgN->result_array() as $rewN) {}
                    $data['imagenUP'][$contadorUp] =  $rewN['url']."/".$rewN['nombre']; 
                }else{
                    $data['imagenUP'][$contadorUp] =  "/noEncontrada.png";
                }//end of else
                //$data['imagenUP'][$contadorUp] =  $rowUp['url']."/".$rowUp['nombre']; 


                $contadorUp ++;
            }
            

            
        }

		$this->load->view('layout/frontEnd/header', $data);
		$this -> load ->view('layout/frontEnd/menuBlanco', $data);
		$this->load->view('frontEnd/inicio/index', $data);
		$this-> frase();
		$this->load->view('layout/frontEnd/footer', $data);
	}







/*

	public function index()
	{
        $this ->verificarCredenciales();
		$data['titulo'] = "HOME";
		$data['varMenu'] = 1;
        $data['migajas'] = [];
        $data['migajasLink'] = [];
        $this -> guardarInfo("inicio");

        //info Banners
        $contador = 0;
        $query = $this->Inicio_Model->getAllFromBanner();
        $data['total'] = $query -> num_rows();
        if ($query->num_rows()>0) {
            foreach($query->result_array() as $row){
                $data['id'][$contador] = $row['id'];
                $data['tipo'][$contador] = $row['tipo'];

                $rul = "banner";
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

        //infoCalendarios
        $contador = 0;
        $queryCalendario = $this->Inicio_Model->getAllCalendarios();
        if ($queryCalendario->num_rows()>0) {

            foreach($queryCalendario->result_array() as $rowC){
                $data['nombre'][$contador] = $rowC['nombre'];

                $rulC = "calendario";
                $queryImgC = $this->Archivos_Model->readArchivo($rowC['id'], $rulC);

                if ($queryImgC->num_rows()>0) {
                    foreach ($queryImgC->result_array() as $rewC) {}
                    $data['imagenC'][$contador] =  $rewC['url']."/".$rewC['nombre']; 
                }else{
                    $data['imagenC'][$contador] =  "/noEncontrada.png";
                }//end of else

                $contador ++;
            }//end of forEach

        }//end of if

        $contadorUp = 0;
        $queryUpdates = $this->Archivos_Model->getUpdates();
        $data['totalUps'] = $queryUpdates -> num_rows();
        //echo "---".$data['totalUps']."--";
        if ($queryUpdates->num_rows()>0) {
            foreach($queryUpdates->result_array() as $rowUp){
                //echo "<BR>-".$rowUp['idProgenitor']."--".$rowUp['url']."--";

                $data['imagenUP'][$contadorUp] =  $rowUp['url']."/".$rowUp['nombre']; 
                $data['urlUP'][$contadorUp] =  $rowUp['url']; 
                $data['idProgenitorUP'][$contadorUp] =  $rowUp['idProgenitor'];

                if ($rowUp['url'] == "campania") {
                    $data['txtUP'][$contadorUp] =  "Nueva Campania"; 
                }else if($rowUp['url'] == "revista"){
                    $data['txtUP'][$contadorUp] =  "Nueva Revista"; 
                }else if($rowUp['url'] == "noticia"){
                    $data['txtUP'][$contadorUp] =  "Nueva Noticia"; 
                }else{
                    $data['txtUP'][$contadorUp] =  "Nuevo Contenido"; 
                }

*//*
                $id = $rowUp['idProgenitor'];

                for ($i=0; $i < 4; $i++) { 

                    $queryUpdates = $this->Archivos_Model->getLastUpdateID();
                    $data['totalUps'] = $queryUpdates -> num_rows();
                    //echo "---".$data['totalUps']."--";
                    if ($queryUpdates->num_rows()>0) {
                        foreach($queryUpdates->result_array() as $rowUp){
                            //echo "<BR>-".$rowUp['idProgenitor']."--".$rowUp['url']."--";

                            $data['imagenUP'][$contadorUp] =  $rowUp['url']."/".$rowUp['nombre']; 
                            $data['urlUP'][$contadorUp] =  $rowUp['url']; 
                            $data['idProgenitorUP'][$contadorUp] =  $rowUp['idProgenitor'];

                            if ($rowUp['url'] == "campania") {
                                $data['txtUP'][$contadorUp] =  "Nueva Campania"; 
                            }else if($rowUp['url'] == "revista"){
                                $data['txtUP'][$contadorUp] =  "Nueva Revista"; 
                            }else if($rowUp['url'] == "noticia"){
                                $data['txtUP'][$contadorUp] =  "Nueva Noticia"; 
                            }else{
                                $data['txtUP'][$contadorUp] =  "Nuevo Contenido"; 
                            }
                        }
                    }*//*

                $contadorUp ++;
            }
        }

		$this->load->view('layout/frontEnd/header', $data);
		$this -> load ->view('layout/frontEnd/menuBlanco', $data);
		$this->load->view('frontEnd/inicio/index', $data);
		$this-> frase();
		$this->load->view('layout/frontEnd/footer', $data);
	}


*/


}

