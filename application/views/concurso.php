<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class='row'>
    <div class="col-md-7">
        
            <h1>Iº Concurso de<br />Marchinhas de Carnaval da Indra</h1>
            <p>O carnaval reúne milhares de pessoas nas ruas, nas passarelas do samba e em clubes de todos os cantos do país. Essa grande manifestação cultural está presente no Brasil há muitos anos e além de contar com a participação de diversos públicos é considerada uma das festas mais animadas e representativas do mundo. </p>
            <p>Este ano, convidamos a todos os nossos profissionais do Brasil a entrar nesta folia conosco. Está aberto o <strong style="text-transform: uppercase;">Iº Concurso de Marchinhas de Carnaval da Indra no Brasil</strong>!</p>
            <p>Componha, com criatividade e humor, uma Marchinha de Carnaval e compartilhe conosco através de um vídeo. Faça uma produção solo ou chame outros componentes e componha a sua marchinha de acordo com o tema: <strong style="text-transform: uppercase;">"O que eu faço na Indra?"</strong>. Use as soluções inovadoras que diariamente você usa para atender a suas demandas, junte com sua criatividade e uma pitada de humor e mostre seu samba nesta avenida!</p>
            <p>Todos os vídeos estarão disponíveis em nosso site e você poderá fazer parte do corpo de jurados votando em sua marchinha preferida.</p>
            <p>Veja as regras para participação: <?php echo anchor('concurso/regulamento', 'regulamento', 'Regulamento') ?></p>
            <p>&nbsp;</p>
            <p style="text-transform: uppercase;"><strong>Caia na folia conosco!</strong></p>
            <p>&nbsp;</p>
            <p><strong>Comunicação Interna</strong><br>Indra no Brasil</p>
        
    </div>
    <div class="col-md-4 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <div style="text-align: center"><?php echo anchor('upload', 'ENVIAR MEU VÍDEO', array('class' => 'btn btn-success btn-lg')) ?></div>
            </div>
        </div>
        <?php if($resultado):?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-film" aria-hidden="true"></span> Vídeos recentes</h3>
            </div>
            <div class="panel-body">
                <?php foreach ($resultado as $videos): ?>
                    <div class="thumbnail">
                        <video width="100%" controls>
                            <?php $ext = explode(".", $video->file); ?>
                            <source src="<?php echo base_url('/uploads/' . $videos->file); ?>"  >
                            Seu browse não suporta a exibição de vídeos. 
                        </video>
                        <p><small>Título: <?php echo $videos->title;?><br>
                        Grupo: <?php echo $videos->group;?></small></p>
                        </ul>
                    </div>    
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>