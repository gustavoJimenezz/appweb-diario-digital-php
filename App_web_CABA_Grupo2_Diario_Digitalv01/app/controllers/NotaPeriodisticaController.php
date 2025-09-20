    <?php
class NotaPeriodisticaController extends BaseController
{

    private $periodistaModel;
    private $notaPeriodistaModel;

    public function __construct()
    {
        $this->periodistaModel = $this->model('PeriodistaModel');
        $this->notaPeriodistaModel = $this->model('NotaPeriodisticaModel');
    }

    public function crearNota()
    {
        $this->view('pages/notaPeriodistica/crearNotaPeriodistica');
    }

    public function notasPublicadas($mensaje = '')
    {
        $idPeriodista = $_SESSION['id_periodista'];
        $notas = $this->notaPeriodistaModel->obtenerNotasPorPeriodista($idPeriodista);
        $data = [
            'notas' => $notas,
            'mensaje' => $mensaje,
        ];

        $this->view('pages/notaPeriodistica/notasPublicadas', $data);
    }

    public function editarNotaPeriodistica($id_nota)
    {

        $nota = $this->notaPeriodistaModel->obtenerNotaPorID($id_nota);
        $data = [
            'tituloNota' => $nota['titulo'],
            'contenidoNota' => $nota['contenido'],
            'id_nota_periodistica' => $nota['id_nota_periodistica'],
        ];

        $this->view('pages/notaPeriodistica/editarNotaPeriodistica', $data);
    }

    public function registrarNotaPeriodistica()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fecha_hora_actual = date("Y-m-d");
    
            $titulo = $_POST['titulo'];
            $contenido = $_POST['contenido'];
            $fecha_creacion = $fecha_hora_actual;
            $id_periodista = $_SESSION['id_periodista'];
            $seccion_id = $_SESSION['seccion_id'];
    
            $imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : null;
    
            $ruta_imagen = '';
            if ($imagen && $imagen['error'] === UPLOAD_ERR_OK) {
                $carpeta_destino = 'img/';

                $nombre_original = basename($imagen['name']);
                $extension = pathinfo($nombre_original, PATHINFO_EXTENSION);
    
                $nombre_final = uniqid() . '.' . $extension;
    
                $ruta_imagen = $carpeta_destino . $nombre_final;

                if (!move_uploaded_file($imagen['tmp_name'], $ruta_imagen)) {
                    throw new Exception("Error al guardar la imagen.");
                }
            }                                                   
    
            $data = [
                'titulo' => $titulo,
                'contenido' => $contenido,
                'fecha_creacion' => $fecha_creacion,
                'periodista_id' => $id_periodista,
                'seccion_id' => $seccion_id,
                'imagen' => $ruta_imagen,
            ];
    
            // Intentar crear la nota con los datos
            if ($this->notaPeriodistaModel->crearNota($data)) {

                header("Location: " . RUTA_URL . "/PeriodistaController/dashboardPeriodista");
                exit();
            } else {
                // Mostrar un mensaje de error si la creación de la nota falla
                echo "<script>alert('Error al crear la nota periodística.');</script>";
                exit();
            }
        }
    }


    public function eliminarNotaPeriodistica($id_nota_periodistica)
    {

        if ($this->notaPeriodistaModel->eliminarNota($id_nota_periodistica)) {
            $this->notasPublicadas();
        } else {
            $this->view('pages/lector/error', ['mensaje' => 'No se pudo eliminar la sección']);
        }
    }

    public function actualizarNota()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                'titulo' => $_POST['titulo'],
                'contenido' => $_POST['contenido'],
                'id_nota_periodistica' => $_POST['id_nota_periodistica'],
            ];

            if ($this->notaPeriodistaModel->editarNota($data)) {
                $mensaje = 'Se edito "' . $_POST['titulo'] . '" con exito.';
                $this->notasPublicadas($mensaje);
            } else {
                $mensaje = 'Ocurrio un error al editar "' . $_POST['titulo'] . '".';
                $this->notasPublicadas($mensaje);
            };
        }
    }

    public function verNotaPeriodistica($id_nota)
    {

        $nota = $this->notaPeriodistaModel->obtenerNotaPorID($id_nota);
        $data = [
            'tituloNota' => $nota['titulo'],
            'contenidoNota' => $nota['contenido'],
            'id_nota_periodistica' => $nota['id_nota_periodistica'],
            'imagen_nota' => $nota['imagen'],
        ];

        $this->view('pages/notaPeriodistica/verNotaPeriodistica', $data);
    }
    public function verNotaPeriodisticaLector($id_nota)
    {

        $nota = $this->notaPeriodistaModel->obtenerNotaPorID($id_nota);
        $data = [
            'tituloNota' => $nota['titulo'],
            'contenidoNota' => $nota['contenido'],
            'id_nota_periodistica' => $nota['id_nota_periodistica'],
            'imagen_nota' => $nota['imagen'],
        ];

        $this->view('pages/notaPeriodistica/verNotaPeriodisticaLector', $data);
    }
    
}
