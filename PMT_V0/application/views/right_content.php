<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<style>
    
</style>
<div class="col-md-12" id="right-content">
    <script>
        function click_button(){
            document.getElementById('task-div').hidden=false;        
        }
    </script>
    <div class="row">
        <?php if(isset($row)){ ?>
        <div class="col-md-12" id="task-div">
            <?php
                
                foreach($row as $row){
                    $id=$row['project_id'];
                    echo "<h3 id=\"inner\" style=\"text-align:center\">".$row['project_name']."</h3>";
                    echo "Project Name: ".$row['project_name']."<br>"."Description: ".$row['project_description']."<br>"."No Of Members: ".$row['project_member_count']."<br>"."Visibility: ".$row['project_visibility']."<br>";
                }
                
            ?>
            <a data-toggle="modal" href="#task_modal_box" data-toggle="tooltip" title="Create Project" class="btn btn-danger add-task-button">Add Task</a>
    
            
        </div>
        <?php } ?>
    </div>
</div>
</div>
        </div>
    </body>
</html>