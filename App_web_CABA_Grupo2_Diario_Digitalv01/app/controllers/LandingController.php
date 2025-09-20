<?php 
    class LandingController extends BaseController{
        public function __constructor(){

        }

        public function index(){
            $this->view('pages/index');
        }
    }


?>