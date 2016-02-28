<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div id="confirm_box" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="color:#990000"><i class="fa fa-warning"></i>&nbsp;&nbsp;Warning</h4>
            </div>
            <div class="modal-body" id="modal-body">
                  <div class="form-group">
                      <!--text appears here-->
                      <p style="font-size: 20px;text-align: justify" id="confirmation_message"></p>
                  </div>
                <button type="button" class="btn btn-default" data-dismiss="modal" value="false">Cancel</button>
                <button type="button" name="confirm" id="confirm" class="btn btn-primary" value="true">Confirm</button>
            </div>
            <div class="modal-footer">
                <span class="label label-warning">PMT v1.0</span>
            </div>
        </div>
    </div>
</div>