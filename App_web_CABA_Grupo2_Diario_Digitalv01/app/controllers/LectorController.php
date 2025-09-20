<?php
    class Lectorcontroller extends BaseController{

        private $lectorModel;
        private $seccionModel;
        private $authModel;
        private $periodistaModel;
        private $notasPeriodisticasModel;

        public function __construct(){
            $this -> lectorModel = $this ->model('lectorModel');
            $this -> authModel = $this ->model('AuthModel');
            $this -> seccionModel = $this->model('SeccionModel');
            $this->periodistaModel = $this->model('PeriodistaModel');
            $this->notasPeriodisticasModel = $this->model('NotaPeriodisticaModel');
        }

        public function registrarLector(){
            $lectores = $this -> lectorModel -> obtenerLectores();
            $secciones = $this -> seccionModel -> obtenerSecciones();

            $data =[
                'lectores' => $lectores,
                'secciones' => $secciones,
                'error_login' => '',
                'successful' => '',
            ];
            $this -> view('pages/lector/registrarLector', $data);
        }

        public function vistaLectorSuscripcionIlimitada($data=''){
            
            $todasLasNotas = $this->notasPeriodisticasModel->obtenerTodasLasnotas();
            $data=[
                'notas' => $todasLasNotas
            ];    
            $this -> view('pages/lector/index', $data);
        }
        public function vistaLectorSuscripcionDominical($data=''){
            
            $todasLasNotas = $this->notasPeriodisticasModel->obtenerTodasLasnotasDominicales();
            $data=[
                'notas' => $todasLasNotas
            ];    
            $this -> view('pages/lector/indexDominical', $data);
        }

        // agregar metodo que devuelva notas dominicales por seccion = domingo
        // public function vistaLectorSuscripcionDominical($data=''){
        //     $notasDominicales = $this->notasPeriodisticasModel.obtenerNotasDominicales();
        //     $data=[
        //         'notas' => $notasDominicales
        //     ];            ;
        //     $this -> view('pages/lector/registrarLector', $data);
        // }

        public function registrar(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $dni = $_POST['dni'];
                $celular = $_POST['celular'];
                $autenticacion_id = $_POST['autenticacion_id'];

                if($autenticacion_id == $autenticacion_id){
                    $data = [
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'dni' => $dni,
                        'celular' => $celular
                    ];
                    $auth = $this -> authModel-> buscar_autenticacion($data);

                    if(empty($auth)){
                        if($this -> lectorModel-> crearLector($data)){
                            $this -> registrarLector();
                        }else{
                            die("NO SE PUDO CREAR EL USUARIO");
                        }
                    }else{
                        die("Ya existe una cuenta creada con ese mail");
                    }
                }else{
                    $data = [
                        'error_pass' => '>div class = "alert alert-danger" role = "alert"> Las contraseñas no coinciden</div>',
                        'error_tipo' => '',
                        'error_megas' => '',
                    ];
                    $this -> view('pages/dashboard/dashboard', $data);
                }      
            }
        }
        public function editarLector($Id_lector) {
            $lectores = $this->lectorModel->obtenerLectorPorID($Id_lector);
            if ($lectores) {
                $this->view('pages/lector/editarLector', ['lectores' => $lectores]);
            } else {
                $this->view('pages/lector/error', ['mensaje' => 'El lector no existe o no pudo cargarse.']);
            }
        }
        
        
        public function actualizarLector() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Obtener datos del formulario
                $Id_lector = $_POST['Id_lector'];
                $nombre = trim($_POST['nombre']);
                $apellido = trim($_POST['apellido']);
                $dni = trim($_POST['dni']);
                $celular = trim($_POST['celular']);

                if ($this->lectorModel->actualizarLector($Id_lector, $nombre, $apellido, $dni, $celular)) {
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
                    $this->view('pages/lector/error', ['mensaje' => 'No se pudo actualizar la sección']);
                }
            } else {
                exit;
            }
        }
    
        public function eliminarLector($Id_lector) {
            if ($this->lectorModel->eliminarLector($Id_lector)) {
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
                $this->view('pages/lector/error', ['mensaje' => 'No se pudo eliminar la sección']);
            }
        }  
    }
?>