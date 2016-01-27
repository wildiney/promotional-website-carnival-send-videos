<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo (isset($title)) ? $title : ""; ?></title>
        <meta name="description" content="<?php echo (isset($description)) ? $description : ""; ?>">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url('assets/styles.css'); ?>">
        <?php if ($this->session->userdata('logged_in')): ?>
            <link rel="stylesheet" href="<?php echo base_url('assets/styles-logged.css'); ?>">
        <?php endif; ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.js" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/scripts.js'); ?>"></script>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">Você está utilizando um browser <strong>desatualizado</strong>. Por favor <a href="http://browsehappy.com/">atualize seu browser</a> para assegurar a melhor experiência.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <?php
        if ($this->session->userdata('logged_in')):
            ?>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="<?php echo (uri_string() == base_url()) ? "active" : ""; ?>"><a href="/marchinhasdaindra"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Início</a></li>
                            <li class="<?php echo (uri_string() == "/upload") ? "active" : ""; ?>"><a href="/marchinhasdaindra/index.php/concurso/regulamento"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Regulamento</a></li>
                            <li class="<?php echo (uri_string() == "/upload") ? "active" : ""; ?>"><a href="/marchinhasdaindra/index.php/upload"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span> Participar</a></li>
                            <li class="<?php echo (uri_string() == "/contato") ? "active" : ""; ?>"><a href="/marchinhasdaindra/index.php/contato"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Contato</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class=""><a href="/marchinhasdaindra/index.php/login/logout">Logout</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <a href="<?php echo base_url(); ?>"><?php echo img('assets/img/header.jpg'); ?></a>
            </div>
        </div>
        <div class="container">
            <div style="margin-left:20px; margin-right:20px;">

