<?php


   class SuscripcionesController extends BaseController { 
    private $authModel;
    private $lectorModel;
    private $suscripcionesModel;
   


    public function __construct()
    {
        $this->authModel = $this->model(model: 'AuthModel');
        $this->lectorModel = $this->model(model:'LectorModel');
        $this->suscripcionesModel = $this->model(model:'SuscripcionesModel');
    }

    public function suscripcion ()
    {
        $data = [
            'error_tipo' => '',
        ];
        $this->view('pages/suscripciones/index', $data);
    }

    public function vincularSuscripcion(){
        if(empty($_SESSION['nombre'])){
            header("Location: ". RUTA_URL ."/AuthController/login");
            exit();

        }else{
            $id = $_POST['id-suscripcion'];

            if($this->suscripcionesModel->vincularSuscripcion($id, $_SESSION['id'])){
                if($id == 1){
                    header("Location: ". RUTA_URL ."/LectorController/vistaLectorSuscripcionIlimitada");
                    exit();
                }else if($id == 2){
                    header("Location: ". RUTA_URL ."/LectorController/vistaLectorSuscripcionDominical");
                    exit();
                }
            }
        }

        }
    }

?>