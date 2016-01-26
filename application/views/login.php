<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4 alert alert-warning">
        Para ter acesso ao site você deve inserir abaixo a sua matrícula na Indra e a sua data de nascimento.</p>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <?php
        $attr_form = array('class' => 'form_login', 'name' => 'form_login', 'id' => 'form_login');
        $attr_input_button = array('class' => 'btn btn-default', 'type' => 'submit', 'name' => 'enviar', 'id' => 'enviar', 'content' => 'ACESSAR');
        $attr_label = array('class' => 'control-label');
        $attr_label_size = "<div class='col-sm-9'>";
        $attr_label_size_close = "</div>";

        echo form_open('login/logar', $attr_form);

        echo "<div class='row'>";
        echo form_label('MATRÍCULA', 'matricula', $attr_label);
        echo form_input('matricula', ' ', array('class' => 'form-control input-sm'));
        echo "</div>";
        echo "<div><p>&nbsp</p></div>";
        echo "<div class='row'>";
        echo form_label('DATA DE NASCIMENTO', 'nascimento', $attr_label);
        echo form_input('nascimento', ' ', array('class' => 'form-control input-sm'));
        echo "</div>";
        echo "<div><p>&nbsp</p></div>";
        echo "<div class='row'>";
        echo form_button($attr_input_button);
        echo "</div>";

        echo form_close();
        ?>
    </div>
</div>