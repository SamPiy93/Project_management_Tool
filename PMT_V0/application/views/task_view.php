<style>
    .modal-header{
        background: #ffd777;
        font-family: 'Ruda', sans-serif;
    }
    
</style>

<div id="task_view_modal_box" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Task List</h4>
            </div>
            <div class="modal-body">
                <style>
                    .task_link{
                        font-size: large;
                        text-decoration: none;
                    }
                    #task_button{
                        margin: 4px;
                        border: 1px solid #ccc;
                        box-shadow:2px 2px 4px #AAA;
                        border-radius: 3px;
                    }  
                </style>
                <?php
                    if(isset($row) && isset($task_data)){
                        foreach($task_data as $task_data){
                            //$id=$row['project_id'];
                            $t_number=$task_data['task_number'];
                            $t_details=$task_data['task_details'];
                            $p_id=$task_data['project_id'];
                            $details=$t_number.",".$t_details.",".$p_id;
                            //onMC(this);getID()
                            echo "<button id=\"task_button\" type=\"button\" onclick=\"onMC(this);getID()\" value=\"$details\"><a data-toggle=\"modal\" href=\"#individual_task_view\" class=\"task_link\" id=\"id_hidden\" data-custom-value=\"$t_number\"><i class=\"fa fa-tasks\"></i>&nbsp;&nbsp;&nbsp;Task ".$t_number."</a></button><br>";
                            
                        }
                    }
                ?>
                <script>
                    
                    function getID(){
                        //alert('hey get id');
                        
                        var somestring = document.getElementById('task_modal_box_hidden_id').value;
                        separated = somestring.split(",");
                        var i=0;
                        $.each(separated, function(index, chunk) {
                            i++;
                            document.getElementById('p'+i).innerHTML=chunk;
                    });
                        
                        
                    }
                    function onMC(objButton){
                        
                        id_val=objButton.value;
                        
                        document.getElementById('task_modal_box_hidden_id').value=id_val;
                    }
                </script>
            </div>
            <div class="modal-footer">
                <span class="label label-warning">PMT v1.0</span>
            </div>
        </div>
    </div>
</div>


<div id="individual_task_view" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Details of the task</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="task_modal_box_hidden_id" name="task_modal_box_hidden_id">
                <style>
                    .para{
                        display: block;
                        text-indent: 5px;
                        font-size: small;
                        font-family: cursive;
                        color: #999;
                    }
                </style>
                
                <h4>Task Number</h4><p id="p1" class="para"></p>
                <h4>Details</h4><p id="p2" class="para"></p>
                <h4>Project</h4><p id="p3" class="para" ></p>
                <script>
                    function pass_pro_id(){
                        document.getElementById('hidden_pro_id').value=document.getElementById('p3').innerHTML;
                        document.getElementById('hidden_task_id').value=document.getElementById('p1').innerHTML;
                    }
                </script>
                <!--input type="button" style="margin: 10px;" class="btn btn-danger btn-sm" onclick="test()" id="remove-button" value="Remove"-->
                <a class="btn btn-primary btn-sm" href="#member_assign_box" data-toggle="modal" onclick="pass_pro_id()">
                    <i class="fa fa-bookmark"></i>
                    Assign Task
                </a>
                <a class="btn btn-danger btn-sm" href="#confirm_box" data-toggle="modal" onclick="edit_confirmation_body_message('Are you sure you want to delete this task?');">
                    <i class="fa fa-minus-circle"></i>
                    Remove
                </a>
                
                <script>
                    function edit_confirmation_body_message(message){
                        document.getElementById('confirmation_message').innerHTML=message;
                    }
                    //getting the value of the confirmation box
                    window.onload = myMain;

                    function myMain() {
                      document.getElementById("modal-body").onclick = buton;
                    }

                    function buton(e) {
                      if (e.target.tagName == 'BUTTON') {
                        var result=e.target.value;
                        if(result == "true"){
                            delete_task(result);
                        }else{
                            return false;
                        }
                      }
                    }
                    //end of confirmation box
                    function delete_task(r){
                        var taskNo=document.getElementById('p1').innerHTML;
                        var detail=document.getElementById('p2').innerHTML;
                        var p_id=document.getElementById('p3').innerHTML;
                        //alert(p_id);
                        //var confirm_dialog=document.get//confirm("Are you sure you want to delete this task?");
                        if(r=="true"){
                            window.location.href="http://localhost/PMT_V0/Index_controller/delete_task/"+p_id+"/"+taskNo;
                        }else{
                            return false;
                        }
                    }
                    
                </script>
            </div>
            <div class="modal-footer">
                <span class="label label-warning">PMT v1.0</span>
            </div>
        </div>
    </div>
</div>