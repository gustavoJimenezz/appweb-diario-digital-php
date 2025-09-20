<?php
require_once RUTA_APP . '/enums/UsuarioRol.php';
class AuthController extends BaseController
{
    private $authModel;
    private $periodistaModel;
    private $lectorModel;
    private $seccionModel;

    public function __construct()
    {
        $this->authModel = $this->model('AuthModel');
        $this->periodistaModel = $this->model('PeriodistaModel');
        $this->lectorModel = $this->model('LectorModel');
        $this->seccionModel = $this->model('SeccionModel');
    }

    public function login($mensaje = '')
    {
        $data = [
            'error_login' => $mensaje,
        ];
        $this->view('pages/auth/login', $data);
    }

    public function dashboard()
    {
        $periodistas = $this->periodistaModel->obtenerPeriodistas();
        $lectores = $this->lectorModel->obtenerLectores();
        $data = [
            'periodistas' => $periodistas,
            'lectores' => $lectores,
            'error_login' => '',
        ];
        $this->view('pages/dashboard/dashboard', $data);
    }

    public function register()
    {
        $data = [
            'error_tipo' => '',
            'error_pass' => '',
        ];
        $this->view('pages/auth/register', $data);
    }

    public function logout()
    {
        session_destroy();
        
        $this->view('pages/index');
    }

    public function loginUsuario()
    {
        $data = [
            'email' => $_POST['email'],
            'contrasenia' => $_POST['password']
        ];

        $usrAut = $this->authModel->buscar_autenticacion($data);
        
        if ($usrAut) {
            
            $tipoUsuario = $this->identificarTipoDeUsuario($data);
            $this->establecerSesionPorTipoDeUsuario($tipoUsuario, $usrAut);

        } else {

            $mensaje = '<div class="alert alert-danger" role="alert">Credenciales incorrectas.</div>';
            $this->login($mensaje);

        }
    }

    private function establecerSesionPorTipoDeUsuario($tipoUsuario, $usrAut)
    {
        switch ($tipoUsuario) {
            case UsuarioRol::ADMIN:

                $userData =  $this->authModel->obtenerPeriodista($usrAut->id_autenticacion);

                $_SESSION['id'] = $userData->id_periodista;
                $_SESSION['nombre'] = $userData->nombre; 
                $this->dashboard();
                exit();
                break;
            case UsuarioRol::PERIODISTA:

                $userData =  $this->authModel->obtenerPeriodista($usrAut->id_autenticacion);

                if ($userData) {
                    $nombre_seccion = $this->seccionModel->obtenerSeccionPorID($userData->seccion_id);

                    $_SESSION['id_periodista'] = $userData->id_periodista;
                    $_SESSION['nombre'] = $userData->nombre;          
                    $_SESSION['seccion_id'] = $userData->seccion_id;
                    $_SESSION['nombre_seccion'] = $nombre_seccion['nombre_seccion']; 

                    header("Location: ". RUTA_URL ."/PeriodistaController/dashboardPeriodista");
                    exit();
                }
                break;
            case UsuarioRol::LECTOR:
                $userData =  $this->authModel->obtenerLector($usrAut->id_autenticacion);
                if ($userData) {
                    $_SESSION['id'] = $userData->Id_lector;
                    $_SESSION['nombre'] = $userData->nombre;

                    if($userData->suscripcion_id == null){
                        $this->view('pages/index');
                        echo "hola";
                    }else if($userData->suscripcion_id == 1){
                        header("Location: ". RUTA_URL ."/LectorController/vistaLectorSuscripcionIlimitada");
                        exit();
                    }else if($userData->suscripcion_id == 2){
                        header("Location: ". RUTA_URL ."/LectorController/vistaLectorSuscripcionDominical");
                        exit();
                    }
                    // NOTA: AGREGAR VISTA PARA NOTAS DOMINICALES
                }

                break;
            default:
                $mensaje = '<div class="alert alert-danger" role="alert">Usuario dado de baja.</div>';
                $this->login($mensaje);
                break;
        }
    }

    /* Función que toma los datos del formulario, hace las verificaciones y los envía al modelo*/
    public function registrarLector()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $celular = $_POST['celular'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $pass2 = $_POST['password2'];

            if ($pass == $pass2) {
                $data = [
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'email' => $email,
                    'contrasenia' => $pass,
                    'dni' => $dni,
                    'celular' => $celular,
                ];
                $auth = $this->authModel->buscar_autenticacion($data);

                if (empty($auth)) {

                    if ($this->authModel->crearLector($data)) {
                        $data = [
                            'error_login' => '',
                        ];
                        echo "<script>alert('Usuario creado con exito.');</script>";

                        $this->view('pages/auth/login', $data);
                    } else {
                        die("NO SE PUDO CREAR EL USUARIO");
                    }
                } else {
                    die("Ya existe una cuenta creada con ese email");
                }
            } else {
                $data = [
                    'error_pass' => '<div class="alert alert-danger" role="alert">
                                        Las contraseñas no coinciden
                                        </div>',
                    'error_tipo' => '',
                    'error_megas' => '',
                ];
                $this->view('pages/auth/register', $data);
            }
        }
    }

    // Verificar si el email pertenece a un periodista (contiene el dominio @diariodigital.com)
    private function identificarTipoDeUsuario($data)
    {
        $email = $data['email'];
        if (strpos($email, 'admin@admin.com') !== false) {
            return UsuarioRol::ADMIN;
        } else if (strpos($email, '@diariodigital.com') !== false) {
        return UsuarioRol::PERIODISTA;
        } else {
            return UsuarioRol::LECTOR;
        }
    }
    
    //------------------------------------ RESERT, UPDATE , SEND PASSWORD   ---------------------------------
    public function resetPassword(){
        $data = [
            'mail' => '',
            'error_mail' => '',
        ];
        $this -> view('pages/auth/forgot-password', $data);
    }

    public function enviar_password(){
        $email = $_POST['email'];
        $data =[
            'email' => $email,
        ];
        if(!empty($this->authModel->buscar_por_mail($data))){
            $data =[
                'email' => '',
                'error_pass' => '',
            ];
            $where = "new_pass";
            include(RUTA_APP . "/mails/mail_pass.php");
            $this -> view('pages/auth/updated-password', $data);
        }else{
            $data =[
                "error_mail" =>  "<div class='alert alert-danger' role='alert'>
                <p class = 'text-center'>No es un email válido.</p>
                </div>",
                "mail" => ''
            ];
            $this -> view('pages/auth/forgot-password', $data);
        }
    } 

    public function update_pass(){
        $data =[
            'mail' => '',
            'error_mail' => '',
            'error_pass' => '',
        ];
        $this -> view('pages/auth/updated-password', $data);
    }

    public function actualizar_password(){
        $email = $_POST['email'];
        $passActual = $_POST['pass_actual'];
        $passNueva = $_POST['pass_nueva'];
        $passNueva2 = $_POST['pass_nueva2'];
        echo($email);
        echo($passActual); echo( $passNueva); echo($passNueva2);
        if($passNueva != $passNueva2){
            $data =[
                'mail' => '',
                'error_mail' => '',
                'error_pass' => "<div class='alert alert-danger' role='alert'>
                <p class = 'text-center'>Las contraseñas no coinciden.</p>
                </div>",
            ];
            $this -> view('pages/auth/updated-password', $data);
        }else{
            if($this->authModel->change_pass($passNueva, $email)){
                $data = [
                    'mail' => '',
                    'error_mail' => '',
                    'error_pass' => "<div class='alert alert-success' role='alert'>
                    <p class = 'text-center'>La contraseña fue actualizada</p>
                    </div>",
                ];
                $this-> view('pages/auth/updated-password', $data);
            }
        }
    }
    
}
