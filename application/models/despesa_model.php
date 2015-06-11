<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class despesa_model extends CI_Model {
    
    function insereDespesa($des){
        return $this->db->insert("DESPESAS", $des);
    }
    
    function buscaTodasDepesas($idUser){
        $this->db->from("DESPESAS");
        $this->db->join("TIPO_DESPESA", "TIPO_DESPESA.ID_TIPO_DESPESA = DESPESAS.ID_TIPO_DESPESA");
        $this->db->where("ID_USUARIO", $idUser);
        return $this->db->get()->result_array();
    }
    
    function insereTipoDesp($typeDespesa){
        return $this->db->insert("TIPO_DESPESA", $typeDespesa);
    }
    
    function listaTiposDespesa (){
        return $this->db->query("SELECT ID_TIPO_DESPESA, NOME FROM TIPO_DESPESA")->result_array();
    }
}