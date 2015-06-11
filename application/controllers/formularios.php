<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Formularios extends CI_Controller {

    public function validaUser(){
            $LOGIN = $this->input->post("tx_login");                              
            $SEN = addslashes($this->input->post("tx_pw"));
            $SENHA = sha1($SEN);
            $this->load->model("usuario_model");
            $usuario = $this->usuario_model->verificaUser($LOGIN, $SENHA);
            if($usuario){
                $this->session->set_flashdata("sucesso", "Parabens!!");
                $this->session->set_userdata("UsuarioX", $usuario);
                $this->load->view("usuario");
                $this->load->view("rodape");
                
            }else{
                $this->session->set_flashdata("sucesso", "Usuario ou senha inválida");
                redirect("/");
                
            }
            
        }
        
    function incluiDespesa() {
            
        if($this->validaPermissao()):
            $this->load->library("form_validation");
            $this->form_validation->set_rules("tx_despesa", "tx_despesa", "required");
            $this->form_validation->set_rules("tx_prc", "tx_prc", "required|callback_validaVirgula");
            $formOK = $this->form_validation->run();
            if($formOK){
            $user = $this->session->userdata("UsuarioX");
            $this->load->model("despesa_model");
            $despesa = array("DATA_DESPESA" => $this->input->post("tx_data"),
                             "DESCRICAO" => $this->input->post("tx_despesa"),                            
                            "ID_USUARIO" => $user["ID_USUARIO"],
                            "ID_TIPO_DESPESA" => $this->input->post("tipoDesp"), 
                            "PRECO" => $this->input->post("tx_prc"));           
            $Inserido = $this->despesa_model->insereDespesa($despesa);
            $valores = $this->despesa_model->listaTiposDespesa();
            $dados = array("dropD" => array_values($valores));
            if($Inserido){
                $this->session->set_flashdata("formDespesa", "ok");
               $this->session->set_flashdata("DespesaOK", "1");
                $this->load->view("despesas", $dados);
            }else{
                $this->session->set_flashdata("DespesaOK", "0");
                echo "Driver";
            }
            }else{
                $this->session->set_flashdata("DespesaOK", "0");
                $this->session->set_flashdata("formDespesa", "ok");
                $this->load->view("despesas");
                $this->load->view("rodape");
            }
        endif;
            
        }
        
    function incluiTipoDespesa(){
        
            if($this->validaPermissao()){
                $this->load->library("form_validation");
                $this->form_validation->set_rules("tx_tipo", "tx_tipo", "required");
                $formOK = $this->form_validation->run();
                if($formOK){
                    $this->load->model("despesa_model");
                    $tipoDespesa = array("NOME" => strtoupper($this->input->post("tx_tipo")));
                    $tipoDesp = $this->despesa_model->insereTipoDesp($tipoDespesa);
                    if($tipoDesp){
                        $this->load->view("tipoDespesa");
                        $this->load->view("rodape");
                    }else{
                        echo 'não foi possivel inserir o tipo de despesa';
                        $this->load->view("rodape");
                    }
                }else{
                    echo "falhou validação";
                }
            }else{
                redirect("/");
            }
        }


    public function validaVirgula($valor){
            $valida = strpos($valor, ",");
            if($valida){
                $this->form_validation->set_message("validaVirgula", "O campo Preço não pode conter virgula");
                return FALSE;
                #$this->load->view("despesas");
            }
        }
        
    public function retornaUserInicial(){
            $this->load->view("usuario");
            $this->load->view("rodape");
        }
        
    private function validaPermissao(){
        if($this->session->userdata("UsuarioX")){
            return "TRUE";
        }else{ return "FALSE";}
    }
}