<div id="member_assign_box" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Assigning Task To Members</h4>
            </div>
            <style>
                #member_list th,#member_list td{
                    padding:8px;
                    text-align: center;
                }
                #member_list input[type="radio"]{
                    border-color: #F00;
                    border:2px solid #F00;
                    cursor: pointer;
                }
            </style>
            <script>
                function change_hidden_value(elem){
                    mem=elem.value;
                    //alert(mem);
                    document.getElementById('hidden_mem_id').value=mem;
                }
                function assign_task(){
                    member_id=document.getElementById('hidden_mem_id').value;
                    pro_id=document.getElementById('hidden_pro_id').value;
                    task_id=document.getElementById('hidden_task_id').value;
                    //alert(member_id);
                    window.location.href="<?php echo base_url(); ?>index_controller/assign_task_controller/"+member_id+"/"+pro_id+"/"+task_id;
                }
            </script>
            <div class="modal-body" style="max-height: 400px;overflow-x: hidden;overflow-y: auto">
                <div id="individual_member_select">
                    <table id="member_list" class="table-striped" style="margin-right: auto; margin-left: auto">
                        <thead>
                        <th>

                        </th>
                        <th>
                            Member Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Type
                        </th>
                        <th title="Current status of the user">
                            Status
                        </th>
                        </thead>
                        <!--has to be done to every member in the project-->
                        <?php 
                        if(isset($u)){
                        foreach($u as $x){ 
                            $id=$x['id'];
                            $username=$x['username'];
                            $firstname=$x['first_name'];
                            $lastname=$x['last_name'];
                            $email=$x['email'];
                            $user_type=$x['type'];
                            $status=$x['state'];
                        ?>
                        <tr>
                            <td>
                                <input type="radio" name="member_select" onclick="change_hidden_value(this)" id="member_select" value="<?php echo $id; ?>">
                            </td>
                            <td>
                                <?php echo $firstname." ".$lastname; ?>
                            </td>
                            <td>
                                <?php echo $email; ?>
                            </td>
                            <td>
                                <?php echo $user_type; ?>
                            </td>
                            <td>
                                <?php echo $status; ?>
                            </td>
                        </tr>
                        <?php }} ?>
                        <!--end-->
                    </table>
                    <input type="hidden" id="hidden_mem_id">
                    <input type="hidden" id="hidden_pro_id">
                    <input type="hidden" id="hidden_task_id">
                </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm pull-left" onclick="assign_task()">
                    <i class="fa fa-bookmark"></i>
                    Assign
                </button>
                <span class="label label-warning">PMT v1.0</span>
            </div>
        </div>
    </div>
</div>