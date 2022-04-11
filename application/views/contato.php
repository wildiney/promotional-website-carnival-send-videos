<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class='row'>
    <div class="col-md-7">
            <h1>CONTATO</h1>

            <p>Em caso de dúvidas e informações adicionais, entre em contato com:</p>
            <strong>Erik Silva</strong><br />
            Marketing Brasil<br />
            <a href="tel:+551151863061">11 5186-3061</a><br />
            <a href="mailto:">email@dominio.com</a> </p>
    </div>
    <div class="col-md-4 col-md-offset-1">
        <?php 
        $date1 = date("Y-m-d");
        $date2 = "2016-02-09";
             
        if(strtotime($date1) < strtotime($date2)):?>
        <div class="panel panel-default">
            <div class="panel-body">
                <div style="text-align: center"><?php echo anchor('upload', 'ENVIAR MEU VÍDEO', array('class' => 'btn btn-success btn-lg')) ?></div>
            </div>
        </div>
        <?php endif; ?>
</div>