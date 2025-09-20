<?php 
    class AutenticacionModel extends BaseController {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
        
        // se seatea la suscripcion en 0 por defecto
        public function crearAutenticacion($email, $contrasenia){
            try {
                $keyw = "keyword";
                $this->db->query("INSERT INTO `autenticacion` (`email`, `contrasenia`) VALUES (:email, AES_ENCRYPT(:contrasenia, :keyword))");
                $this->db->bind(':email', $email);
                $this->db->bind(':contrasenia', $contrasenia);
                $this->db->bind(':keyword', $keyw);
                return $this->db->execute();

                if (!$this->db->execute()) {
                    throw new Exception("Error al crear Autentificacion.");
                }
    
                return true;
            } catch (Exception $e) {
                error_log($e->getMessage());
                return false;
            }
        }

        public function obtenerAutenticacionPorEmailYcontrasenia($email, $pass){
            try {
                $this->db->query("SELECT id_autenticacion, email, AES_DECRYPT(contrasenia, 'keyword') as contrasenia 
                                FROM autenticacion
                                WHERE email = :email
                                AND AES_DECRYPT(contrasenia, 'keyword') = :pass");

                $this->db->bind(':email', $email);
                $this->db->bind(':pass', $pass);
                $result = $this->db->register();
                return $result;

            } catch (Exception $e) {
                throw new Exception("Error al obtener la autenticación: " . $e->getMessage());

            }
        }
        
    }
?>