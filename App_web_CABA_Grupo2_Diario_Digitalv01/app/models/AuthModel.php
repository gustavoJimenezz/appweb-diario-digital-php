<?php

class AuthModel extends BaseController
{

    private $db;
    private $lectorModel;
    private $AutenticacionModel;
    private $periodistaModel;

    public function __construct()
    {
        $this->db = new Database;
        $this->lectorModel = $this->model('LectorModel');
        $this->AutenticacionModel = $this->model('AutenticacionModel');
        $this ->periodistaModel = $this->model('PeriodistaModel');
    }

    public function crearLector($data)
    {
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $dni = $data['dni'];
        $celular = $data['celular'];
        $contrasenia = $data['contrasenia'];
        $email = $data['email'];

        $this->db->beginTransaction();
        if ($this->AutenticacionModel->crearAutenticacion($email, $contrasenia)) {
            $idAutenticacion = $this->db->lastId();
            $this->lectorModel->crearLector($nombre, $apellido, $dni, $celular, $idAutenticacion);
            $this->db->commit();
            return true;
        } else {
            $this->db->rollBack();
            return false;
        }
    }

    //Metodo para buscar el mail y la contraseña para comprobar si existe y poder loguear
    public function buscar_autenticacion($data)
    {
        $email = $data['email'];
        $pass = $data['contrasenia'];
        return $this->AutenticacionModel->obtenerAutenticacionPorEmailYcontrasenia($email, $pass);
    }

    public function obtenerLector($idAutenticacion)
    {
        return $this->lectorModel->obtenerLectorPorAutenticacion($idAutenticacion);
    }

    public function obtenerPeriodista($idAutenticacion)
    {
        return $this->periodistaModel->obtenerPeriodistaPorAutenticacion($idAutenticacion);
    }

    public function change_pass($passNueva, $email)
    {
        $keyw ='keyword';
        $this -> db -> query("UPDATE autenticacion SET contrasenia = aes_encrypt(:pass_nueva,:keyword) WHERE email =:email" );
        $this -> db -> bind('pass_nueva', $passNueva);
        $this -> db -> bind('keyword', $keyw);
        $this -> db -> bind('email', $email);
        if($this -> db -> execute()) {
            return true;
        }else{
            return false;
        }
        //return $pass;
        //     $keyw = 'keyword';
        //     $this->db->query()
        //     $this->db->bind('new_pass', $pass);
        //     $this->db->bind('keyword', $keyw);
        //     $this->db->bind('mail', $email);

        //     if($this->db->execute()){
        //         return true;
        //     }else{
        //         return false;
        //     }
    }
    public function buscar_por_mail($data)
	{
		$this->db->query("SELECT id_autenticacion, email, aes_decrypt(contrasenia, 'keyword') AS pass 
							  FROM autenticacion
							  WHERE autenticacion.email =:email
							  ");
		$this->db->bind('email', $data['email']);
		
		$result = $this->db->register();
		return $result;
	}
}
?>