<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <style>
            body{
                margin:0;
                padding: 0;
            }
            #header{
                margin-top: 0;
                width: 100%;
                height:40vh;
                background: #ccc;
                border: 0px solid black;
                clear: both;
                padding: 0;
            }
            #right-content{
                width: 80%;
                height:60vh;
                background: #00c5de;
                border: 0px solid yellow;
                float: right;
            }
            #left-content{
                width: 20%;
                height:60vh;
                background: #0086b3;
                border: 0px solid yellow;
                float: left;
                padding-top: 5px;
                padding-left: 10px;
                padding-right: 10px;
                overflow-x: hidden;
                overflow-y: auto;
            }
            .project_link {
                
            }
            .inner_para{
                text-align: justify;
                margin-left: 10px;
            }
            .inner_para a{
                text-decoration: none;
                color:#ccc;
                text-align: center;
                font-family: sans-serif;
                font-size: 16px;
                font-feature-settings: normal;
            }
            .inner_para a:hover{
                text-decoration: none;
                color:#fff;
                text-align: center;
            }
            .create-button img{
                border: 2px solid white;
                padding: 1px;
            }
            .create-button img:hover{
                border: 4px solid white;
                padding: 1px;
            }
            #task-div{
                width: 80%;
                height: 100%;
                margin-left: auto;
                margin-right: auto;
                float: none;
                background: #FFFFFF;
            }
        </style>
    </head>
    <body>
        <?php
        //defined('BASEPATH') OR exit('No direct script access allowed');
        ?>
        <script>
            function success(){
                alert("success");
            }
        </script>
<div class="container-fluid" id="body">
    <div class="row">
        <div class="col-md-12" id="header">
            <img src="<?php echo IMAGE_PATH."header_image.jpg";?>" class="" width="100%" height="100%">
        </div>