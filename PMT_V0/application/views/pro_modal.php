<div id="pdmb" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="pro_head_1"></h4>
            </div>
            <div class="modal-body">
                <div><strong>Project Description : </strong><p id="pro_para_1" style="text-indent: 30px;"></p></div>
                <div><strong>Project Visibility : </strong><p id="pro_para_2" style="text-indent: 30px;"></p></div>
                <div style="clear: both">
                    <style>
                        :checked + label,:checked + span {
                            background-color: peru;
                            color:black;
                            padding: 5px;
                            border-radius: 5px;
                         }
                    </style>
                    <label id="label1">
                        <input type="checkbox" hidden="true" id="addMembers" >
                        <span id="span1" style="text-decoration: underline;border-radius: 5px;padding: 5px; font-weight: 600">Add Members</span>
                    </label>
                    <script>
                        $(document).ready(function(){
                            $("#addMembers").click(function(){
                               $("#select_div").toggle();
                               getMemCount();
                        })});
                    </script>
                </div>
                <div style="clear: both" id="select_div" hidden="true">
                    <input type="hidden" name="hidden_pro_mem_count" id="hidden_pro_mem_count">
                    <script>
                        function getMemCount(){
                            count=document.getElementById('hidden_pro_mem_count').value;
                            
                            if(count==1){
                                document.getElementById('individual').hidden=false;
                                document.getElementById('group').hidden=true;
                            }else{
                                document.getElementById('individual').hidden=true;
                                document.getElementById('group').hidden=false;
                            }
                        }
                    </script>
                    <style>
                        #member_list{
                            background: #FFF;
                        }
                        #member_list th{
                            
                        }
                        #member_list td,#member_list th{
                            padding: 10px;
                            font-family: sans-serif;
                            text-align: center;
                            border: 2px #ccc;
                            border-style: double;
                        }
                        #group,#individual{
                            height: 400px;
                            max-height: 400px;
                            overflow-x:hidden;
                            overflow-y: auto;
                        }
                        
                    </style>
                    <div id="individual" hidden="true">
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
                    
                    <div id="group" hidden="true">
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
                                foreach($u as $v){ 
                                    $id=$v['id'];
                                    $username=$v['username'];
                                    $firstname=$v['first_name'];
                                    $lastname=$v['last_name'];
                                    $email=$v['email'];
                                    $user_type=$v['type'];
                                    $status=$v['state'];
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="memberSelectCheckBox[]" onclick="change_hidden_value(this)" value="<?php echo $id; ?>">
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
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm pull-left" onclick="">
                    <i class="fa fa-bookmark"></i>
                    Assign
                </button>
                <span class="label label-warning">PMT v1.0</span>
            </div>
        </div>
    </div>
</div>