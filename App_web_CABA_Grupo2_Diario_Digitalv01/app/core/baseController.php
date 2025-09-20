<?php 
    //Clase controlador principal
   // Se encarga de poder cargar los models y views

    class BaseController{

        public function model($model){
            //Carga
            require_once '../app/models/'. $model. '.php';
            
            //instancia el model
            return new $model();
        }
        
        //cargar el view
        public function view($view, $data = []){
            //chequea que exista el archivo view   
            if(file_exists('../app/views/'.$view.'.php')){
                require_once '../app/views/'.$view.'.php';
            }else{
                //si el archivo de vistra no existe
                die("la vista no existe");
            }
        }
    }

?>