<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--html>
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
        </script-->
        <!--add project model box start-->
        <!--div id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Create Project</h4>
                    </div>
                    <div class="modal-body">
                        <form action="Index_controller/register" method="POST">
                            
                          <div class="form-group">
                              <input type="text" class="form-control" name="project_name" id="project-name" placeholder="Project Name">
                          </div>
                          <div class="form-group">
                              <textarea class="form-control" name="project_description" id="project-description" placeholder="Description about the project"></textarea>
                          </div>
                          <div class="form-group">
                              <label for="form-visibility">Project Visibility &nbsp;</label>
                              <input type="radio" checked="checked" class="form-horizontal" id="project_visibility" name="project_visibility" value="1">Public
                              <input type="radio" class="form-horizontal" id="project_visibility" name="project_visibility" value="0">Private
                          </div>
                          <div class="form-group">
                              <input type="number" class="form-control" name="project_member_count" id="project_member_count" placeholder="Number of Members">
                          </div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" id="submit" class="btn btn-primary" value="submit">Done</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div-->
        <!--add project model box end-->
        <!--a class="btn btn-primary pull-left" data-toggle="modal" href="#myModal" >Create Project</a-->
        <!--div class="container-fluid" id="body">
            <div class="row">
                <div class="col-md-12" id="header">
                    <img src="site_images/header_image.jpg" class="" width="100%" height="100%">
                </div-->
                <!--div class="col-md-12" id="left-content">
                    <p style="font-weight: 600;color: #FFFFFF;font-size: 18px">Projects &nbsp;<a class="create-button" data-toggle="modal" href="#myModal" data-toggle="tooltip" title="Create Project" ><img class="img-circle" style="vertical-align: middle;float: right" src="site_images/project_add_button.png" width="15%" height="15%"></a></p>
                   
                    <?php
                        /*foreach ($projects as $projects){
                            $p_id=$projects['project_id'];
                            $p_name=$projects['project_name'];
                            $p_description=$projects['project_description'];
                            $p_visibility=$projects['project_visibility'];
                            $p_member_count=$projects['project_member_count'];
                        
                            echo "<p class=\"inner_para\"><a class=\"project_link\" href=\"Index_controller/project_tasks/$p_id\">".$p_name."</a></p>";
                            }*/
                    ?>
                    
                </div-->
                <!--div class="col-md-12" id="right-content">
                    <script>
                        function click_button(){
                            document.getElementById('task-div').hidden=false;        
                        }
                    </script>
                    <div class="row">
                        <input type="button" value="click" onclick="click_button()">
                        
                        <div class="col-md-12" id="task-div" hidden="true">
                            <p id="inner">task div</p>
                            <?php
                      //          foreach($row as $row){
                        //            echo $row['project_name']."<br>";
                          //      }
                            ?>
                        </div>
                    </div>
                </div-->
                
            <!--/div>
        </div>
    </body>
</html-->
