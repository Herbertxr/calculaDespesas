<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Despesas extends CI_Controller {
    
    public function formDespesa(){
        #verifica se usuário está logado e carrega o formulário de despesas
        if($this->validaPermissao()){
            $this->session->set_flashdata("formDespesa", "1");
            $this->load->helper("form");
            $this->load->model("despesa_model");
        $valores = $this->despesa_model->listaTiposDespesa();
        $dados = array("dropD" => array_values($valores));
        $this->load->view("despesas", $dados);
        $this->load->view("rodape");
        }else{
            redirect("/");
        }
        
    }
    
    function listaDespesas(){
        if($this->validaPermissao()){
            $this->load->helper("form");
            $this->load->model("despesa_model");
            $user = $this->session->userdata("UsuarioX");
            $despesas = $this->despesa_model->buscaTodasDepesas($user["ID_USUARIO"]);
            $dados = array("despesas" => $despesas);
            if($despesas){
                $this->load->helper("datas");
                $this->load->helper("valor");
            $this->load->view("showDespesas", $dados);
            $this->load->view("rodape");
            }else{
                $this->session->set_flashdata("error", "Não foi possível listar as despesas");
                $this->load->view("usuario");
            }
        }else{
            redirect("/");
        }
    }
    
        public function formTipoDespesa(){
        #verifica se usuário está logado e carrega o formulário de despesas
        if($this->validaPermissao()){
            $this->session->set_flashdata("formTipoDespesa", "1");
            $this->load->helper("form");
        $this->load->view("tipoDespesa");
        $this->load->view("rodape");
        }else{
            redirect("/");
        }
        
    }

    public function loadTipoDespesa(){
        
    }
        
    public function inDespesa(){
        
        if($this->input->post("dataD")){
            
        }else{
            
        }
        
    }    
    private function validaPermissao(){
        if($this->session->userdata("UsuarioX")){
            return "TRUE";
        }else{ return "FALSE";}
    }
}