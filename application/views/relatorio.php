<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">
    var timeout = setTimeout('location.reload(true);',60000)
</script>    
<div class='row'>
    <div class="col-md-12">

        <h1>Relatório</h1>
        <p>&nbsp;</p>
        <table class="table table-bordered">
            <tr>
                <th width="210">Vídeos</th>
                <th>Dados</th>
                <th>Votos</th>
            </tr>
            <?php foreach ($resultado as $video): ?>
            <tr>
                <td>
                    <video width="200" controls>
                        <source src="<?php echo base_url('/uploads/' . $video->file); ?>"  >
                         Seu browse não suporta a exibição de vídeos. 
                        </video>
                </td>
                
                <td>
                    <p>
                        <strong><?php echo $video->name; ?></strong><br>
                        <a href="mailto:<?php echo $video->email; ?>"><?php echo $video->email; ?></a><br>
                        Grupo: <?php echo $video->group; ?><br>
                    <?php echo $video->participants; ?><br>
                    <div style="padding:10px; background-color: #D0D0D0;"<?php echo nl2br($video->lyric); ?></div>
                    </p>
                </td>
                
                <td><?php echo $video->votos; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>