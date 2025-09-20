<?php

class SeccionModel extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function crearSeccion($nombre)
    {
        try {
            $this->db->query("INSERT INTO seccion
                            (nombre_seccion, dia_publicacion) 
                            VALUES 
                            (:nombre, NOW())");
            $this->db->bind('nombre', $nombre);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function obtenerSecciones()
    {
        try {
            $this->db->query("SELECT id_seccion, nombre_seccion, dia_publicacion FROM seccion WHERE activo = 1");
            $result = $this->db->registers();
            return $result;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    public function obtenerSeccionPorID($id_seccion){
        try {
            $this->db->query("SELECT id_seccion, nombre_seccion, dia_publicacion FROM seccion WHERE id_seccion = :id_seccion");
            $this->db->bind(':id_seccion', $id_seccion);
            $row = $this->db->single();  // Recupera una sola fila
            return $row;  // Devuelve los datos de la sección
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
    public function actualizarSeccion($id_seccion, $nombre_seccion, $dia_publicacion) {
        try {
            $this->db->query("UPDATE seccion SET nombre_seccion = :nombre_seccion, dia_publicacion = :dia_publicacion WHERE id_seccion = :id_seccion");
            $this->db->bind(':id_seccion', $id_seccion);
            $this->db->bind(':nombre_seccion', $nombre_seccion);
            $this->db->bind(':dia_publicacion', $dia_publicacion);
            
            // Ejecutar la consulta
            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    public function eliminarSeccion($id_seccion) {

        try {
            $this->db->query("UPDATE seccion SET activo = 0 WHERE id_seccion = :id_seccion");
            $this->db->bind(':id_seccion', $id_seccion);

            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
    
}
