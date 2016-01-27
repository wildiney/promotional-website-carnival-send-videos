<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class='row'>
    <div class="col-md-12">
        <table class="table">
            <tr>
                <td style="width: 50%;">DADOS</td><td>VÍDEO</td>
                <?php foreach($resultado as $video):?>
            <tr>
                <td>
                    <p>Responsável: <?php echo $video->name ?> <<a href="mailto:<?php echo $video->email; ?>"><?php echo $video->email?></a>></p>
                    <p>Grupo: <?php echo $video->group; ?></p>
                    <?php $participantes = explode("|",$video->participants);?>
                    <p>Participantes: 
                        <?php 
                        $n = 0;
                        $l = count($participantes);
                        foreach($participantes as $nome):?>
                            <?php 
                            $n++;
                            if($n<$l){ echo $nome . " / "; } else { echo $nome; }
                            ?>
                        <?php endforeach; ?>
        </p>
                    <p><strong style="text-transform: uppercase;"><?php echo $video->title; ?></strong></p>
                    <textarea rows="7" class="form-control"><?php echo $video->lyric; ?></textarea>
                    <a class="btn btn-success" href="<?php echo base_url("/index.php/aprovacao/aprovar/" . $video->iduploads);?>">APROVAR</a> 
                    <a class="btn btn-danger" href="<?php echo base_url("/index.php/aprovacao/reprovar/" . $video->iduploads);?>">REPROVAR</a>
                    
                </td>
                <td>
                     <video width="100%" controls>
                        <source src="<?php echo base_url('/uploads/' . $video->file); ?>" type="video/mp4">
                        Seu browse não suporta a exibição de vídeos. 
                    </video> 
                </td>
            </tr>
                <?php endforeach;?>
            </tr>
        </table>
    </div>
</div>