<?php

#formulario para inserir 
 echo form_open("formularios/validaUser");
 echo form_label("Login: ", "tx_login");
 echo form_input(array("name" => "tx_login", "id" => "tx_login", "class" => "form-control", "required" => "TRUE"));
 echo form_label("Senha: ", "tx_pw");
 echo form_password(array("name" => "tx_pw", "id" => "tx_pw", "class" => "form-control", "required" => "TRUE", "minlength" => "6" ));
 echo form_button(array("class" => "btn btn-button primary", "content" => "Enviar", "type"=> "submit" ));




