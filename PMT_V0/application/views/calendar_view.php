<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Project Calendar</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/codeignitertest/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="http://localhost/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="http://localhost/assets/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="http://localhost/assets/css/style.css" rel="stylesheet">
    <link href="http://localhost/assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    
    <![endif]-->
    <!-- INSERT AJAX LIBRARY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     
    <!--CSS FOR SWITCHES-->
    <link href="http://localhost/assets/css/switch.css" rel="stylesheet" />
    
    <!--CSS FOR FA FA ICON LIBRARY-->
    <link href="http://localhost/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
      
      .calendar{
          
          color: #ffffff;
          font-size: 16px;
          font-weight: 300;
          padding: 0 10px;
          line-height: 40px;
          height: 60px;
          margin: 0;
          text-shadow: 2px 2px #000000;
          background: #e0ebeb;
      }
      table.calendar{
          margin: auto;
          border-collapse: collapse;
      }
      .calendar .days td{
          color: #000000;
          width: 200px;
          height: 100px;
          padding: 4px;
          border: 1px solid #999;
          vertical-align: top;
          background-color: #f0f5f5;
          text-shadow: 2px 2px #ffffff;
      }
      .calendar .days td:hover{
          background-color:  #ffeb99;
      }
      .calendar .highlight {
          font-size: 24px;
          font-weight: bold;
          color: #00F;
          
      }
      .content{
          font-family: 'Comic Sans MS';
          font-size: 16px;
          color: #999;
      }
      .cal_head{
          text-align: center !important;
      }
  </style>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>DASHGUM FREE</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- notifications start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle"  href="index.html#" id="notify">
                            <i class="fa fa-tasks"></i>
                            <?php if($notificationCount > 0){
                            ?>
                            <span class="badge bg-theme" id='notify'><?php echo $notificationCount; ?></span>
                            <?php
                            }
                            ?>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have <?php if($notificationCount==0){echo "no" ; } else{ echo $notificationCount; }?> pending notifications</p>
                            </li>
                            <li><?php
                                    
                                    foreach ($notifications as $notify){
                                        $dates = explode("-", $notify->date);
                                ?>
                                <a href='<?php echo "http://localhost/codeignitertest/index.php/Calendar/showCal/".$dates[0]."/".$dates[1];?>'>
                                    <div class="task-info">
                                        <h5><?php echo $notify->note ; ?></h5>
                                        <h6><?php echo $notify->date_time ;?></h6>
                                    </div>
                                </a>
                                <?php
                                    }
                                ?>
                                
                            </li>
                            <li class="external">
                                <a href="http://localhost/codeignitertest/index.php/Notifications" id="notify2">See All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- NOTIFICATION END -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <?php if($messageCount > 0){
                            ?>
                            <span class="badge bg-theme" id='notify'><?php echo $messageCount; ?></span>
                            <?php
                            }
                            ?>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have <?php if($messageCount==0){echo "no" ; } else{ echo $messageCount; }?> pending messages</p>
                            </li>
                            <?php
                                    
                                    foreach ($unMsgs as $msg){
                            ?>
                            <li>
                                <div id="message">
                                <a href="http://localhost/codeignitertest/index.php/Messages/index/<?php echo $msg->sender; ?>">
                                    <span class="photo"><img alt="avatar" src="http://localhost/assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                    <span class="from"><?php echo $msg->first_name;?></span>
                                    <span class="time"><?php echo $msg->date_time;?></span>
                                    </span>
                                    <span class="message">
                                        <?php echo $msg->message;?>
                                    </span>  
                                </a>
                                </div>  
                            </li>
                            <?php
                                    }
                            ?>
                           
                            <li>
                                <a href="http://localhost/codeignitertest/index.php/Messages"> See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    
                    
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="http://localhost/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Marcel Newman</h5>
              	  	
                  <li class="sub-menu">
                      <a href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="http://localhost/codeignitertest/index.php/Home">Home</a></li>
                          <li><a  href="http://localhost/codeignitertest/index.php/Messages">Messages</a></li>
                          <li><a  href="http://localhost/codeignitertest/index.php/Notifications">Notifications</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>UI Elements</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="general.html">General</a></li>
                          <li><a  href="buttons.html">Buttons</a></li>
                          <li><a  href="panels.html">Panels</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Projects</span>
                      </a>
                      <ul class="sub">
                          <li class="active"><a  href="http://localhost/codeignitertest/index.php/Calendar/showCal">Calendar</a></li>
                          <li><a  href="http://localhost/codeignitertest/index.php/Charts">Progress</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Extra Pages</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="blank.html">Blank Page</a></li>
                          <li><a  href="login.html">Login</a></li>
                          <li><a  href="lock_screen.html">Lock Screen</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Forms</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="form_component.html">Form Components</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="basic_table.html">Basic Table</a></li>
                          <li><a  href="responsive_table.html">Responsive Table</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Charts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Project Calendar</h3>
              <!-- page start-->
              <div class="row mt">
                  <aside class="col-lg-9 mt">
                      <section class="panel">
                          <div class="panel-body">
                              <?php echo $calendar; ?>
                          </div>
                          <!-- Start of Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add Calendar Note : <label for="date" id="selected_date">  </h4>
                                        </div>
                                        <form class="form-inline" role="form" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="tmember" class="control-label col-sm-4">Notify Member:</label>
                                                <div class="col-sm-8">
                                                    <select multiple class="form-control" id="multipleSelect" name="members[]">
                                                      <?php foreach($memberData as $mem){?>
                                                      <option value="<?php echo $mem->id;?>"><?php echo $mem->first_name;?></option>
                                                      <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="note" class="control-label col-sm-4"> Note: </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control note" id="note" name="data">
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-success btnSave" data-dismiss="modal"> <i class="fa fa-floppy-o"></i> </button>
                                            <button type="button" class="btn btn-default btn-warning" data-dismiss="modal"><i class="fa fa-close"></i></button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal -->
    
                    <!-- START OF JQUERY FUNCTION -->
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('.day').click(function(){
                                day_num = $(this).find('.day_num').html();  
                                <?php
                                    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                    $pieces = explode("/", $url);

                                    if(strlen($url)==59){
                                        $sel_year = date('Y');
                                        $sel_month = date('m');
                                    }
                                    else{
                                        $sel_year = $pieces[7];
                                        $sel_month = $pieces[8];
                                    }

                                    $cur_date = date('d');
                                    $cur_month = date('m');
                                    $cur_year = date('Y');

                                    if($sel_year < $cur_year){
                                        $value = 31 ;
                                    }
                                    else if($sel_year == $cur_year){
                                        if($sel_month < $cur_month){
                                            $value = 31 ;
                                        }
                                        else if($sel_month == $cur_month){
                                            $value = $cur_date;
                                        }
                                        else {
                                            $value = 1 ;
                                        }
                                    }
                                    else {
                                         $value = 1;
                                    }
                                    ?>
                                value = <?php echo $value; ?> ;
                                if(day_num>=value && day_num<=31){
                                $('#myModal').modal('show');
                                $('#selected_date').html(day_num);
                                $("input:text").val($(this).find('.content').html());
                                $(".btnSave").click(function(){
                                    var day_data = $('#note').val();
                                    var membersArr = $('#multipleSelect').val();
                                    $.ajax({
                                        url: window.location,
                                        type: "POST",
                                        data:{
                                            day : day_num,
                                            data : day_data,
                                            members : membersArr 
                                        },
                                        success: function(msg){
                                        location.reload();
                                        }
                                    });
                                });
                                }
                            });

                        });
                    </script>
                    <!-- END OF J QUERY FUNCTION -->
                      </section>
                  </aside>
                  <!--Project Details-->
                  <aside class="col-lg-3 mt">
                      <section class="panel" data-scrollreveal="enter left and move 100px, wait 0.8s">
                          <div class="panel-body" >
                            <h4><i class="fa fa-angle-right"></i> Project Description</h4>
                            <?php foreach($proData as $pro){?>
                            <hr/>
                            Title : <?php echo $pro->project_name;?>
                            <br/><br/>
                            Start Date : <?php echo $pro->start_date;?>
                            <br/><br/>
                            End Date : <?php echo $pro->end_date;?>
                            <br/><br/>
                            Member Count : <?php echo $pro->project_member_count;?>
                            <br/><br/>
                            Description : <?php echo $pro->project_description;?>
                            <br/><br/>
                            <?php
                            } ?>
                          </div>
                      </section>
                  </aside>
                  <!-- Task Clear Window -->
                  <aside class="col-lg-3 mt">
                      <section class="panel" data-scrollreveal="enter left and move 100px, wait 0.8s" >
                          <div class="panel-body" style="overflow-y: scroll; overflow-x: hidden; width: 100%; height: 284px;">
                            <h4><i class="fa fa-angle-right"></i> Individual Notes</h4>
                            <hr/>
                            <?php 
                            if(empty($taskData)){?>
                                You Dont Have Any Notes <br/>
                                <img src="http://www.compusurf.es/wordpress/wp-content/uploads/2014/04/smiley.jpeg" alt="Smiley face" height="153" width="160" align="right">
                            <?php
                            }
                            else{
                            
                                foreach($taskData as $task){
                                    if($task->status == 2){ 
                                        echo "<div class='alert alert-danger'>";
                                    }
                                    else{
                                        echo "<div class='alert alert-info'>";
                                    }
                                    echo $task->date.": ";
                                    echo $task->note; 
                                    ?>
                                <br/>
                                      Have You Completed this?
                                      <label class="switch">
                                        <input type="checkbox" name="mycheck" class="switch-input" id="task<?php echo $task->noteID;?>" value="<?php echo $task->noteID;?>">
                                        <span class="switch-label" data-on="Yes" data-off="No"></span>
                                        <span class="switch-handle"></span>
                                      </label>
                                    <?php
                                    echo "<br/><br/>";
                                    echo "</div>";
                                    echo "<hr>";
                                }
                                ?>
                                      <button type="button" class="btn btn-default btn-success" id="btnSubmit"> <i class="fa fa-floppy-o"></i> </button>
                                      <script>
                                          $(document).ready(function() {
                                                $("#btnSubmit").click(function(){
                                                    
                                                    <?php
                                                          foreach($taskData as $task){?>
                                                               if($('#task<?php echo $task->noteID;?>').is(':checked')){
                                                                   $.ajax({
                                                                        url: window.location,
                                                                        type: "POST",
                                                                        data:{
                                                                            task : <?php echo $task->noteID;?>
                                                                        },
                                                                        success: function(msg){
                                                                        location.reload();
                                                                        }
                                                                    });
                                                               }
                                                          <?php
                                                          }  
                                                    ?>   
                                                }); 
                                            });
                                      </script>
                                            
                                <?php
                            }
                            ?>
                          </div>
                      </section>
                  </aside>
              </div>
              <!-- page end-->
              </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2016 Yasantha K. D. M.
              <a href="calendar.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="http://localhost/codeignitertest/assets/js/jquery.js"></script>
    <script src="http://localhost/codeignitertest/assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="http://localhost/codeignitertest/assets/js/fullcalendar/fullcalendar.min.js"></script>    
    <script src="http://localhost/codeignitertest/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="http://localhost/codeignitertest/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="http://localhost/codeignitertest/assets/js/jquery.scrollTo.min.js"></script>
    <script src="http://localhost/codeignitertest/assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="http://localhost/codeignitertest/assets/js/common-scripts.js"></script>

    <!--script for this page-->
	<script src="http://localhost/codeignitertest/assets/js/calendar-conf-events.js"></script>    
    <!-- SCROLL REVEL LIBRARY FOR SCROLLING ANIMATIONS-->
        <script src="http://localhost/codeignitertest/assets/js/scrollReveal.js"></script>
        <script>
        window.scrollReveal = new scrollReveal();
        </script>
  <script>
      //custom select box

      $(function(){
          $("select.styled").customSelect();
      });

  </script>

  </body>
</html>
