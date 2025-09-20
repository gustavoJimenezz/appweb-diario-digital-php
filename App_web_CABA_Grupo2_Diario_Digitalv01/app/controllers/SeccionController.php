<?php
class SeccionController extends BaseController
{
    private $authModel;
    private $periodistaModel;
    private $lectorModel;
    private $seccionModel;

    public function __construct()
    {
        $this->periodistaModel = $this->model('PeriodistaModel');
        $this->lectorModel = $this->model('LectorModel');
        $this->seccionModel = $this->model('SeccionModel');
        $this->authModel = $this->model('AuthModel');
    }

    public function registrarSeccion()
    {
        $secciones = $this->seccionModel->obtenerSecciones();
        $data = [
            'secciones' => $secciones,
            'error_login' => '',
        ];
        $this->view('pages/secciones/registrarSeccion', $data);
    }

    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre-seccion'];
            
            if ($this->seccionModel->crearSeccion($nombre)) {

                $periodistas = $this->periodistaModel->obtenerPeriodistas();
                $lectores = $this->lectorModel->obtenerLectores();
                $data = [
                    'periodistas' => $periodistas,
                    'lectores' => $lectores,
                    'error_login' => '',
                ];
                $this->view('pages/dashboard/dashboard', $data);

                // revisar
                // $nombre =null;
                // if($nombre != null);
                // $this->view('pages/secciones/registrarSeccion');
                // $this->registrarSeccion();
            } else {
                die("Error al crear seccion");
            }
        }
    }

    public function editarSeccion($id_seccion) {
        $seccion = $this->seccionModel->obtenerSeccionPorID($id_seccion);
        if ($seccion) {
            $this->view('pages/secciones/editarSeccion', ['seccion' => $seccion]);
        } else {
            $this->view('pages/secciones/error', ['mensaje' => 'La sección no existe o no se pudo cargar.']);
        }
    }
    
    
    public function actualizarSeccion() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener datos del formulario
            $id_seccion = $_POST['id_seccion'];
            $nombre_seccion = trim($_POST['nombre_seccion']);
            $dia_publicacion = $_POST['dia_publicacion'];
            if ($this->seccionModel->actualizarSeccion($id_seccion, $nombre_seccion, $dia_publicacion)) {
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

    public function eliminarSeccion($id_seccion) {
        
      
        if ($this->seccionModel->eliminarSeccion($id_seccion)) {
            // dashboard

            // seccion
            $this->registrarSeccion();

        } else {
            $this->view('pages/secciones/error', ['mensaje' => 'No se pudo eliminar la sección']);
        }
    }
    
    

}
?>