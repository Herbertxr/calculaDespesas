<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 echo '<h3> Incluir Tipo da Despesa</h3>';
 echo form_open("formularios/incluiTipoDespesa");
 echo form_label("Tipo da Despesa: ", "tx_tipo");
 echo form_input(array("name" => "tx_tipo", "id" => "tx_tipo", "class" => "form-control", "required" => "TRUE", "minlength" => "2", "value" => set_value("tx_tipo", "")));
 echo form_error("tx_tipo");
 echo form_button(array("class" => "btn btn-success", "content" => "Cadastrar", "type"=> "submit" ));
 echo form_button(array("class" => "btn btn-warning", "content" => "Cancelar", "type"=> "button", "id" => "btnCancel" )); 
 echo form_close();
 