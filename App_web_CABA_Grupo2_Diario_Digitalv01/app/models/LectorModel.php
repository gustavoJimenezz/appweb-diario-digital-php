<?php
class LectorModel extends BaseController
{
    private $db;
    private $AutenticacionModel;

    public function __construct()
    {
        $this->db = new Database;
        $this->AutenticacionModel = $this->model('AutenticacionModel');
    }

    // se seatea la suscripcion en null por defecto
    public function crearLector($nombre, $apellido, $dni, $celular, $idAutenticacion)
    {
        try {

            $this->db->query("INSERT INTO lector
                        (nombre, apellido, dni, celular, autenticacion_id) 
                        VALUES 
                        (:nombre, :apellido, :dni, :celular, :autenticacion_id)");
            $this->db->bind('nombre', $nombre);
            $this->db->bind('apellido', $apellido);
            $this->db->bind('dni', $dni);
            $this->db->bind('celular', $celular);
            $this->db->bind('autenticacion_id', $idAutenticacion);

            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function obtenerLectorPorAutenticacion($idAutenticacion)
    {
        try {
            $this->db->query("SELECT Id_lector, nombre, apellido, dni, celular, suscripcion_id
                                FROM lector
                                JOIN autenticacion ON lector.autenticacion_id = autenticacion.id_autenticacion
                                WHERE autenticacion.id_autenticacion = :autenticacion_id;");
            $this->db->bind('autenticacion_id', $idAutenticacion);

            $result = $this->db->register();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Error al obtener la autenticación: " . $e->getMessage());
        }
    }

    public function obtenerLectores()
    {
        try {
            $this->db->query("SELECT Id_lector, nombre, apellido, dni, celular FROM lector");
            $result = $this->db->registers();
            return $result;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    public function obtenerLectorPorID($Id_lector){
        try {
            $this->db->query("SELECT Id_lector, nombre, apellido, dni, celular FROM lector WHERE Id_lector = :Id_lector");
            $this->db->bind(':Id_lector', $Id_lector);
            $row = $this->db->single();  // Recupera una sola fila
            return $row;  // Devuelve los datos de la sección
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
    public function actualizarLector($Id_lector, $nombre, $apellido, $dni, $celular) {
        try {
            $this->db->query("UPDATE lector SET nombre = :nombre, apellido = :apellido, dni = :dni, celular = :celular WHERE Id_lector = :Id_lector");
            $this->db->bind(':Id_lector', $Id_lector);
            $this->db->bind(':nombre', $nombre);
            $this->db->bind(':apellido', $apellido);
            $this->db->bind(':dni', $dni);
            $this->db->bind(':celular', $celular);
            
            // Ejecutar la consulta
            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    public function eliminarLector($Id_lector) {
        try {
            $this->db->query("DELETE FROM lector WHERE Id_lector = :Id_lector");
            $this->db->bind(':Id_lector', $Id_lector);
            
            // Ejecutar la consulta y devolver el resultado
            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
?>