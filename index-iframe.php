<?php
header('P3P: CP="IDC DSP COR CURa ADM ADMa DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT PHY ONL COM STA"');
?>
<?php 
@$pagina = $_GET['pagina'];
if(isset($pagina)){
    if($pagina=="regulamento"){
        $url = "http://wildiney.com/marchinhasdaempresa/index.php/concurso/regulamento";
    }
} else {
    $url = "http://www.wildiney.com/marchinhasdaempresa/";
}
?>
<html>
    <head>
        <title>Marchinhas da empresa</title>
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