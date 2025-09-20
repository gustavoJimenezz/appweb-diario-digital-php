<?php

class PeriodistaModel extends BaseController
{
    private $db;
    private $AutenticacionModel;

    public function __construct()
    {
        $this->db = new Database;
        $this->AutenticacionModel = $this->model('AutenticacionModel');

    }

    public function obtenerPeriodistas()
    {
        try {
            $this->db->query("SELECT id_periodista, nombre, apellido, dni FROM periodista WHERE activo = 1");
            $result = $this->db->registers();
            return $result;
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    public function obtenerperiodistaPorID($id_periodista){
        try {
            $this->db->query("SELECT id_periodista, nombre, apellido, dni, autenticacion_id, seccion_id  FROM periodista WHERE id_periodista = :id_periodista");
            $this->db->bind(':id_periodista', $id_periodista);
            $row = $this->db->single();  // Recupera una sola fila
            return $row;  // Devuelve los datos de la sección
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    public function insertPeriodista($nombre, $apellido, $dni, $idAutenticacion, $seccionId)
    {
        try {
            $this->db->query("INSERT INTO periodista 
                            (nombre, apellido, dni, autenticacion_id, seccion_id)
                            VALUES (:nombre, :apellido, :dni, :autenticacion_id, :seccion_id)");

            $this->db->bind(':nombre', $nombre);
            $this->db->bind(':apellido', $apellido);
            $this->db->bind(':dni', $dni);
            $this->db->bind(':autenticacion_id', $idAutenticacion);
            $this->db->bind(':seccion_id', $seccionId);

            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function crearPeriodista($data)
    {
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $dni = $data['dni'];
        $contrasenia = $data['contrasenia'];
        $email = $data['email'];
        $seccionId = $data['seccion_id'];

        try {
            $this->db->beginTransaction();

            if ($this->AutenticacionModel->crearAutenticacion($email, $contrasenia)) {
                $idAutenticacion = $this->db->lastId();

                // Crear periodista
                if ($this->insertPeriodista($nombre, $apellido, $dni, $idAutenticacion, $seccionId)) {
                    $this->db->commit();
                    return true;
                } else {
                    $this->db->rollBack();
                    return false;
                }
            } else {
                $this->db->rollBack();
                return false;
            }
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log($e->getMessage());
            return false;
        }
    }
    public function obtenerPeriodistaPorAutenticacion($idAutenticacion)
    {
        try {
            $this->db->query("SELECT id_periodista, nombre, apellido, dni, seccion_id
                                FROM periodista
                                JOIN autenticacion ON periodista.autenticacion_id = autenticacion.id_autenticacion
                                WHERE autenticacion.id_autenticacion = :autenticacion_id;");
            $this->db->bind('autenticacion_id', $idAutenticacion);

            $result = $this->db->register();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Error al obtener la autenticación: " . $e->getMessage());
        }
    }


    public function actualizarPeriodista($idPeriodista, $nombre,$apellido,$dni) {
        try {
            $this->db->query("UPDATE periodista SET nombre = :nombre, apellido = :apellido, dni = :dni WHERE id_periodista = :id_periodista");
            $this->db->bind(':id_periodista', $idPeriodista);
            $this->db->bind(':nombre', $nombre);
            $this->db->bind(':apellido', $apellido);
            $this->db->bind(':dni', $dni);
            //FIJARSE SI VA O NO LA SECCION
            //$this->db->bind(':seccion_id', $seccionId);
            // Ejecutar la consulta
            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function eliminarPeriodista($id_periodista) {
        try {
            $this->db->query("UPDATE periodista SET activo = 0 WHERE id_periodista = :id_periodista");

            $this->db->bind(':id_periodista', $id_periodista);

            return $this->db->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
