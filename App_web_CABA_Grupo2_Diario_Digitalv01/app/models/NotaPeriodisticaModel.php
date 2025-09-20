<?php
class NotaPeriodisticaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function obtenerNotaPorID($id_nota_periodistica){
        try {

            $this->db->query("SELECT id_nota_periodistica, titulo , contenido, fecha_creacion, imagen 
                                FROM nota_periodistica
                                WHERE id_nota_periodistica = :id_nota_periodistica;");
            $this->db->bind(":id_nota_periodistica", $id_nota_periodistica);

            $result = $this->db->single();
            return $result;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function obtenerNotasPorPeriodista($idPeriodista)
    {
        try {
            
            $this->db->query("SELECT id_nota_periodistica, titulo , contenido, fecha_creacion, periodista_id, imagen
                            FROM nota_periodistica
                            WHERE periodista_id = :periodista_id");
            $this->db->bind(':periodista_id', $idPeriodista);

            $result = $this->db->registers();
            return $result;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function obtenerTodasLasnotas(){
        try {
            $this->db->query("SELECT id_nota_periodistica, titulo , contenido, fecha_creacion, imagen 
                                FROM nota_periodistica");
            $result = $this->db->registers();
            return $result;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    // agregar metodo que devuelva notas dominicales por seccion = domingo
    public function obtenerTodasLasnotasDominicales(){
        try {
            $this->db->query("SELECT id_nota_periodistica, titulo , contenido, fecha_creacion, imagen, seccion_id 
                                FROM nota_periodistica where seccion_id = 9");
            $result = $this->db->registers();
            return $result;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
    public function crearNota($data) {

        try {
            $titulo = $data['titulo'];
            $contenido = $data['contenido'];
            $fecha_creacion = $data['fecha_creacion'];
            $periodista_id = $data['periodista_id'];
            $seccion_id = $data['seccion_id'];
            $imagen = $data['imagen'];

            $this->db->query("INSERT INTO nota_periodistica (titulo, contenido, fecha_creacion, periodista_id, seccion_id, imagen) 
                            VALUES (:titulo, :contenido, :fecha_creacion, :periodista_id, :seccion_id, :imagen)");

            $this->db->bind(':titulo', $titulo);
            $this->db->bind(':contenido', $contenido);
            $this->db->bind(':fecha_creacion', $fecha_creacion);
            $this->db->bind(':periodista_id', $periodista_id);
            $this->db->bind(':seccion_id', $seccion_id);
            $this->db->bind(':imagen', $imagen);

            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function editarNota($data) {

        try {
            $titulo = $data['titulo'];
            $imagen = $data['imagen'];
            $contenido = $data['contenido'];
            $id_nota_periodistica = $data['id_nota_periodistica'];

            $this->db->query("UPDATE nota_periodistica
                            SET titulo = :titulo,
                                contenido = :contenido,
                                imagen = :imagen
                            WHERE id_nota_periodistica = :id_nota_periodistica;");

            $this->db->bind(':titulo', $titulo);
            $this->db->bind(':imagen', $imagen);
            $this->db->bind(':contenido', $contenido);
            $this->db->bind(':id_nota_periodistica', $id_nota_periodistica);

            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function eliminarNota($id_nota) {
        try {
            $this->db->query("DELETE FROM nota_periodistica WHERE id_nota_periodistica = :id_nota");
            $this->db->bind(':id_nota', $id_nota);
            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
?>