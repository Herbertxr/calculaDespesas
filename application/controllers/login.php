<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {
    
    public function index() {
        
   #     $this->load->model("Sorteio_model");
    #    $sorteios = $this->Sorteio_model->buscaTodos();
     #   $dados = array("sor" => $sorteios);
        
    
        if($this->session->userdata("UsuarioX")){
            #$this->session->unset_userdata("UsuarioX");
#echo 'bla';
            $usuario = array();
            $usuario = $this->session->userdata("UsuarioX");
            #echo $usuario["PERMISSAO"];
            #echo $usuario["ID_USUARIO"];
            switch ($usuario["PERMISSAO"]){
            case 1 :
                $this->session->unset_userdata("UsuarioX");
                $this->load->view("usuario");
                break;
            
            case 2:
                echo 'Bem vindo User';
                break;
            default :
            echo 'default';
            
            }
        }else{
        $this->load->helper("form");
        $this->load->view("login.php");
        $this->load->view("rodape");
        }
        
}

}