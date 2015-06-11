<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo '<h3> Incluir Despesa</h3>';
echo form_open("formularios/incluiDespesa");
 echo form_label("Despesa: ", "tx_despesa");
 echo form_input(array("name" => "tx_despesa", "id" => "tx_despesa", "class" => "form-control", "value" => set_value("tx_despesa", ""), "required" => "TRUE"));
 echo form_error("tx_despesa");
 echo form_label("Data da Despesa: ", "tx_data");
 echo form_error("tx_data");
 echo form_input(array("type" => "text", "name" => "tx_data", "id" => "datepicker", "value" => set_value("tx_data", ""), "class" => "form-control datepicker", "required" => "TRUE", "minlength" => "2")); 
 echo form_label("Preço: ", "tx_prc");
 echo form_input(array("placeholder" => "12.22", "type" => "text", "name" => "tx_prc", "id" => "tx_prc", "class" => "form-control", "required" => "TRUE", "value" => set_value("tx_prc", "")));
 echo form_error("tx_prc");
 #$valores = $dropDo;
 echo form_label("Tipo da Despesa: ", "tipoDesp");
 echo '<br />';
 echo '<select name="tipoDesp">';
 #echo form_dropdown('tipoDesp', $valores);
 foreach ($dropDo as $values){
     echo '<option value="'. $values["ID_TIPO_DESPESA"] .'">'. $values["NOME"] .'</option>';
 }
 echo '<br />';
 echo '</select>';
 echo form_button(array("class" => "btn btn-success", "content" => "Cadastrar", "type"=> "submit" ));
 echo form_button(array("class" => "btn btn-warning", "content" => "Cancelar", "type"=> "button", "id" => "btnCancel" )); 
 echo form_close();
 
 