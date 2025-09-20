<?php
class PeriodistaController extends BaseController
{
    private $periodistaModel;
    private $seccionModel;
    private $authModel;
    private $lectorModel;
    private $notaPeriodistaModel;

    public function __construct()
    {
        $this->periodistaModel = $this->model('PeriodistaModel');
        $this->authModel = $this->model('AuthModel');
        $this->seccionModel = $this->model('SeccionModel');
        $this -> lectorModel = $this ->model('lectorModel');
        $this->notaPeriodistaModel = $this->model('NotaPeriodisticaModel');
    }

    public function dashboardPeriodista()
    {
        $idPeriodista = $_SESSION['id_periodista'];
        $notas =  $this->notaPeriodistaModel->obtenerNotasPorPeriodista($idPeriodista);
    
        $data = [
            'notas' => $notas,
            'error_login' => '',
        ];
        $this->view('pages/periodistas/dashboardPeriodista', $data);
    }

    public function registrarPeriodista()
    {
        $periodistas = $this->periodistaModel->obtenerPeriodistas();
        $secciones = $this->seccionModel->obtenerSecciones();

        $data = [
            'periodistas' => $periodistas,
            'secciones' => $secciones,
            'error_login' => '',
            'successful' => '',
        ];
        $this->view('pages/periodistas/registrarPeriodista', $data);
    }
    
    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $pass2 = $_POST['password2'];
            $seccionId = $_POST['seccion_id'];

            echo "nota :";
            echo $email;

            $emailCompleto = $email;

            if ($pass == $pass2) {
                $data = [
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'email' => $emailCompleto,
                    'contrasenia' => $pass,
                    'dni' => $dni,
                    'seccion_id' => $seccionId,
                ];
                
                $auth = $this->authModel->buscar_autenticacion($data);

                if (empty($auth)) {
                    if ($this->periodistaModel->crearPeriodista($data)) {

                        $this->registrarPeriodista();

                    } else {
                        die("Error al crear periodista.");
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
    public function editarPeriodista($id_periodista) {
        $periodista = $this->periodistaModel->obtenerPeriodistaPorID($id_periodista);
        if ($periodista) {
            $this->view('pages/periodistas/editarPeriodista', ['periodista' => $periodista]);
        } else {
            $this->view('pages/periodistas/error', ['mensaje' => 'El periodista no existe o no se pudo cargar.']);
        }
    }

    //AGREGAR FUNCION ACTUALIZAR PERIODISTA
    public function actualizarPeriodista() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener datos del formulario
            $id_periodista = $_POST['id_periodista'];
            $nombre = trim($_POST['nombre']);
            $apellido = $_POST['apellido'];
            $dni = $_POST['dni'];
            if ($this->periodistaModel->actualizarPeriodista($id_periodista, $nombre, $apellido, $dni)) {
                // Redirigir a la página de listado de secciones o mostrar un mensaje de éxito
            $periodistas = $this->periodistaModel->obtenerPeriodistas();
            $lectores = $this->lectorModel->obtenerLectores();
            $data = [
            'periodistas' => $periodistas,
            'lectores' => $lectores,
            'error_login' => '',
            ];
            $this->view('pages/dashboard/dashboard', $data);
                                                                                            
                exit;
            } else {
                $this->view('pages/secciones/error', ['mensaje' => 'No se pudo actualizar la sección']);
            }
        } else {
            exit;
        }
    }
    
    public function eliminarPeriodista($id_periodista) {
        if ($this->periodistaModel->eliminarPeriodista($id_periodista)) {
            $this->registrarPeriodista();
            exit();
        } else {
            $this->view('pages/periodistas/error', ['mensaje' => 'No se pudo eliminar el periodista']);
        }
    }
}
?>