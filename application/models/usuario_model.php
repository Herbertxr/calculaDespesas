<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuario_model extends CI_Model {
    
    function verificaUser($LOGIN, $SENHA){
        $this->db->where("LOGIN", $LOGIN);
        $this->db->where("SENHA", $SENHA);
        $this->db->select('ID_USUARIO, NOME, PERMISSAO');
        $usuario = $this->db->get("usuario")->row_array();        
        return $usuario;
    }
}