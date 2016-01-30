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
                            $details=$t_number.",".$t_details;
                            echo "<button id=\"task_button\" type=\"button\" onclick=\"onMC(this);getID()\" value=\"$details\"><a data-toggle=\"modal\" href=\"#individual_task_view\" class=\"task_link\" id=\"id_hidden\" data-custom-value=\"$t_number\"><i class=\"fa fa-tasks\"></i>&nbsp;&nbsp;&nbsp;Task ".$t_number."</a></button><br>";
                            
                        }
                    }
                ?>
                <script>
                    
                    function getID(){
                        var somestring = document.getElementById('task_modal_box_hidden_id').value,
                        separated = somestring.split(",");
                        var i=0;
                        $.each(separated, function(index, chunk) {
                            i++;
                            document.getElementById('p'+i).innerHTML=chunk;
                    });
                        
                        //document.getElementById('p2').innerHTML=document.getElementById('task_modal_box_hidden_id').value;
                    }
                    function onMC(objButton){
                        id_val=objButton.value;
                        //alert(id_val);
                        document.getElementById('task_modal_box_hidden_id').value=id_val;
                    }
                </script>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<div id="individual_task_view" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Task List</h4>
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
                
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>