<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1>Obrigado pela sua participação!</h1>
        <p>O seu vídeo irá para avaliação e em seguida será publicado.</p>
        <p>A votação será aberta no dia... </p>
        <table class="table table-bordered">
            <tr>
                <td>Nome</td>
                <td width='50%'>
                    <?php echo $name; ?> (<?php echo $email; ?>)
                </td>
            </tr>
            <tr>
                <td>Participante(s) do grupo <?php echo $group; ?> </td>
                <td>
                    <ul>
                    <?php
                    $participantes = explode("|",$participants);
                    foreach($participantes as $nome){
                        echo "<p>" . $nome . "</p>";
                    }
                    ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>Título da Marchinha: </td>
                <td><?php echo $title; ?></td>
            </tr>
            <tr>
                <td>
                    <h2>Letra</h2>
                    <?php echo $lyric; ?>
                </td>
                <td>
                    <video width="100%" autoplay>
                        <?php 
                        $video = explode(".",$file);
                        ?>
                        <source src="<?php echo base_url('/uploads/' . $file); ?>" type="video/<?php echo $video[1]; ?>">
                        Seu browse não suporta a exibição de vídeos. 
                    </video> 
                    
                </td>
            </tr>
        </table>
    </div>
</div>
