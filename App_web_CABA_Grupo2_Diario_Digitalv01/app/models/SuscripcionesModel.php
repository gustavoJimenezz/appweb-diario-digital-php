<?php

class SuscripcionesModel extends BaseController{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function vincularSuscripcion($id_suscripcion, $id_lector){
        try{
            $this->db->query("UPDATE lector SET suscripcion_id = :id_suscripcion WHERE id_lector = :id_lector");

            //vincula parametros
            $this->db->bind(':id_suscripcion', $id_suscripcion);
            $this->db->bind(':id_lector', $id_lector);
            //se ejecuta la query
            return $this->db->execute();

        }catch (Exception $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}
?>