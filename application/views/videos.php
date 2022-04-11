<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    .votacao{
        width: 80px;
        height:80px;
        margin:0;
        padding:0;
        background-color:transparent;
        border: none;
        background-image: url("/empresa/assets/img/drum-pb.png");
    }
    .votacao:hover{
        background-image: url("/empresa/assets/img/drum.png");
    }
    .votado{
        background-image: url("/empresa/assets/img/drum.png");
    }
</style>
<div class='row'>
    <div class="col-md-12">

        <h1>Vídeos</h1>
        <p>Aqui estão os vídeos dos nossos profissionais cantando suas marchinhas de carnaval.</p>
        <p>Ouça, divirta-se e curta as melhores marchinhas.</p>
        <p>&nbsp;</p>
            <?php foreach ($resultado as $videos): ?>
                <form action="<?php echo current_url();?>" method="post" name="votacao">            
                <div class="col-md-4">
                    <div class="thumbnail">
                        <div style="height: 250px;">
                            <video width="100%" controls>
                                <source src="<?php echo base_url('/uploads/' . $videos->file); ?>"  >
                                Seu browse não suporta a exibição de vídeos. 
                            </video>
                        </div>
                        <table width="100%">
                            <tr style="background-color:#f4f4f4;">
                                <td><p><small>Título: <?php echo $videos->title; ?><br>
                                Grupo: <?php echo $videos->group; ?></small></p>
                                
                                <input type="hidden" name="id" value="<?php echo $videos->iduploads; ?>" /></td>
                                <td style="width:80px;">
                                    <?php 
                                    $date1 = date("Y-m-d");
                                    $date2 = "2016-02-15";
                
                                    if(strtotime($date1) < strtotime($date2)){?>
                                    <button class="votacao <?php echo (in_array($videos->iduploads,$array))?"votado":""; ?>"></button>
                                    <?php } else { ?>
                                    <strong style="color:red; font-size: 0.8em; padding:0 10px 0 0;">VOTAÇÕES ENCERRADAS</strong>
                                    <?php }?>
                                </td>
                            </tr>
                        </table>
                    </div>    
                </div>
                    </form>
            <?php endforeach; ?>
        
    </div>
</div>