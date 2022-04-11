<?php
header('P3P: CP="IDC DSP COR CURa ADM ADMa DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT PHY ONL COM STA"');
?>
<?php 
@$pagina = $_GET['pagina'];
if(isset($pagina)){
    if($pagina=="regulamento"){
        $url = "http://wildiney.com/marchinhasdaindra/index.php/concurso/regulamento";
    }
} else {
    $url = "http://www.wildiney.com/marchinhasdaindra/";
}
?>
<html>
    <head>
        <title>Marchinhas da Indra</title>
        <style type="text/css">
            body{
                margin:0;
                overflow: hidden;
            }
        </style>
    </head>
    <body>
        <iframe width="100%" height="100%" src="<?php echo $url;?>" border="0"></iframe>
    </body>
</html>