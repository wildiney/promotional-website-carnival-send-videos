<?php 
$attr_input_name            = array('class'=>'form-control input-sm', 'placeholder'=>'NOME COMPLETO', 'name'=>'name', 'id'=>'name', 'maxlength'=>'50');
$attr_input_email           = array('class'=>'form-control input-sm', 'placeholder'=>'EMAIL','name'=>'email', 'id'=>'email', 'maxlength'=>'50');
$attr_input_group           = array('class'=>'form-control input-sm', 'placeholder'=>'NOME DO GRUPO','name'=>'group', 'id'=>'group', 'maxlength'=>'50');
$attr_input_title           = array('class'=>'form-control input-sm', 'placeholder'=>'TÍTULO DA MARCHINHA','name'=>'title', 'id'=>'title', 'maxlength'=>'100');
$attr_input_file            = array('class'=>'form-control input-sm', 'placeholder'=>'SOMENTE ARQUIVOS AVI, MOV E MP4', 'name'=>'file', 'id'=>'file');
$attr_input_lyric           = array('class'=>'form-control input-sm','name'=>'lyric');
$attr_input_button          = array('class'=>'btn btn-default', 'type'=>'submit', 'name'=>'enviar', 'id'=>'enviar', 'content'=>'PARTICIPAR');
$attr_label                 = array('class'=>'col-sm-3 control-label');
$attr_form                  = array('class'=>'form_upload form-horizontal', 'name'=>'form_upload', 'id'=>'form_upload');
$attr_label_size            = "<div class='col-sm-9'>";
$attr_label_size_close      = "</div>";

$form  =  form_open_multipart('http://localhost:8000/index.php/upload/enviar', $attr_form);

$form .= form_fieldset('Dados Pessoais');
$form .= "<div class='form-group'>";
$form .= form_label('Nome Completo: ', 'name', $attr_label);
$form .= $attr_label_size;
$form .= form_input($attr_input_name);
$form .= $attr_label_size_close;
$form .= "</div>";
$form .= form_fieldset_close();

$form .= "<div class='form-group'>";
$form .= form_label('Email: ', 'email', $attr_label);
$form .= $attr_label_size;
$form .= form_input($attr_input_email);
$form .= $attr_label_size_close;
$form .= "</div>";

$form .= "<div class='form-group'>";
$form .= form_label('Nome do Grupo: ', 'group', $attr_label);
$form .= $attr_label_size;
$form .= form_input($attr_input_group);
$form .= $attr_label_size_close;
$form .= "</div>";

$form .= form_fieldset('Participantes <small>(Máximo de cinco participantes)</small>');
for($i=1; $i<=5; $i++){
    $disabled = "FALSE";
    $form .= "<div class='form-group'>";
    $form .= form_label('Participante ' . $i . ': ', 'participant' . $i, $attr_label);
    $form .= $attr_label_size;
    $attr_input_participants = array('class'=>'form-control input-sm', 'placeholder'=>'PARTICIPANTE '. $i, 'name'=>'participant' . $i, 'id'=>'participant' . $i);
    $form .= form_input($attr_input_participants);
    $form .= $attr_label_size_close;
    $form .= "</div>";
}
$form .= form_fieldset_close();

$form .= form_fieldset('Marchinha');

$form .= "<div class='form-group'>";
$form .= form_label('Título da Marchinha: ', 'title', $attr_label);
$form .= $attr_label_size;
$form .= form_input($attr_input_title);
$form .= $attr_label_size_close;
$form .= "</div>";

$form .= "<div class='form-group'>";
$form .= form_label('Letra da Marchinha: ', 'lyric', $attr_label);
$form .= $attr_label_size;
$form .= form_textarea($attr_input_lyric);
$form .= $attr_label_size_close;
$form .= "</div>";

$form .= "<div class='form-group'>";
$form .= form_label('Arquivo de vídeo: (Somente no formato MP4', 'file', $attr_label);
$form .= $attr_label_size;
$form .= form_upload($attr_input_file);
$form .= $attr_label_size_close;
$form .= "</div>";
$form .= form_fieldset_close();

$form .= "<div class='form-group'>";
$form .= form_label('Li e aceito o regulamento deste concurso', 'accept', $attr_label);
$form .= $attr_label_size;
$form .= form_checkbox('acceptance', '1', FALSE);
$form .= $attr_label_size_close;
$form .= "</div>";

$form .= "<div class='col-md-offset-3 col-md-9'>";
$form .= form_button($attr_input_button);
$form .= "</div>";

$form .= form_close();
?>

<div class="row">
    <div class="col-md-12">
        <h1>Concurso de Marchinhas Indra</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>Antes de preencher seu cadastro e enviar seu vídeo, lembre-se:</p>
        <ul>
            <li>Só é permitida a participação de funcionários da Indra</li>
            <li>A participação é limitada a somente um grupo/vídeo</li>
            <li>O vídeo deverá estar em um dos seguintes formatos: AVI, MOV ou MP4.</li>
            <li>O tamanho máximo do vídeo é de 300MB e a sua duração não pode ser superior a 2 minutos.</li>
        </ul>
        <p>Para maiores informações, leia o <a href="<?php echo base_url('concurso/regulamento'); ?>">regulamento</a></p>
    </div>
</div>
<?php if($error){ ?>
<div class="row">
    <div class="col-md-12 alert alert-danger" id="alertError" role="alert">
        <?php echo $error; ?>
    </div>
</div>
<?php } ?>
<div class="row">
    <div class="col-md-12">
        <?php echo $form;?>
    </div>
</div>
