<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="col-md-12" id="left-content">
    <p style="font-weight: 600;color: #FFFFFF;font-size: 18px">Projects &nbsp;<a class="create-button" data-toggle="modal" href="#myModal" data-toggle="tooltip" title="Create Project" ><img class="img-circle" style="vertical-align: middle;float: right" src="<?php echo IMAGE_PATH."project_add_button.png";?>" width="10%" height="10%"></a></p>
    <?php
        foreach ($projects as $projects){
            $p_id=$projects['project_id'];
            $p_name=$projects['project_name'];
            $p_description=$projects['project_description'];
            $p_visibility=$projects['project_visibility'];
            $p_member_count=$projects['project_member_count'];

            echo "<p class=\"inner_para\"><a class=\"project_link\" href=\"";
            echo base_url()."Index_controller/project_tasks/$p_id";
            echo "\">".$p_name."</a><a href=\"";
            echo base_url()."Index_controller/delete_project/$p_id";
            echo "\" class=\"remove-project-btn pull-right\" style=\"\"><img src=\"";
            echo IMAGE_PATH."remove.png";
            echo "\" width=\"50%\" height=\"50%\" data-toggle=\"tooltip\" title=\"Remove\"></a></p>";
            }
    ?>

</div>