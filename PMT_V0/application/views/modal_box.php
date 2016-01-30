<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Create Project</h4>
            </div>
            <div class="modal-body">
                <form action="http://localhost/PMT_V0/Index_controller/register" method="POST">

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
</div>