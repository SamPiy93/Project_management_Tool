<?php
    if(isset($row)){
        foreach($row as $row){
            $id=$row['project_id'];
            $name=$row['project_name'];
            echo "<h3 id=\"inner\" style=\"text-align:center\">".$row['project_name']."</h3>";
            echo "Project Name: ".$row['project_name']."<br>"."Description: ".$row['project_description']."<br>"."No Of Members: ".$row['project_member_count']."<br>"."Visibility: ".$row['project_visibility']."<br>";
        }
    }
?>
<div id="task_modal_box" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo $name; ?>::Create Task</h4>
            </div>
            <div class="modal-body">
                <form action="http://localhost/PMT_V0/Index_controller/add_task" method="POST">

                  <div class="form-group">
                      Task Number<input type="number" readonly="readonly" class="form-control" value="<?php echo $task_count; ?>" name="task_number" id="task_number" placeholder="Task Number">
                  </div>
                  <div class="form-group">
                      <textarea class="form-control" rows="12" maxlength="1000" name="task_details" id="task_details" placeholder="Describe the task"></textarea>
                  </div>
                  <div class="form-group">
                      <input type="hidden" id="project_id" name="project_id" value="<?php echo $id; ?>"/>
                  </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary" value="submit">Done</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>