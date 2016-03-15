<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Progress Tracking</title>

    <!-- Bootstrap core CSS -->
    <link href="http://localhost/codeignitertest/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="http://localhost/codeignitertest/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="http://localhost/codeignitertest/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/codeignitertest/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="http://localhost/codeignitertest/assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="http://localhost/codeignitertest/assets/css/style.css" rel="stylesheet">
    <link href="http://localhost/codeignitertest/assets/css/style-responsive.css" rel="stylesheet">

    <script src="http://localhost/codeignitertest/assets/js/chart-master/Chart.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Links for morris Chart -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!--SCRIPTS FOR DataTables -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#cal_notes').DataTable();
	} );
        </script>
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
                    <!-- settings start -->
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
              
              	  <p class="centered"><a href="profile.html"><img src="http://localhost/codeignitertest/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
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
                          <span>Project</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="http://localhost/codeignitertest/index.php/Calendar/showCal">Calendar</a></li>
                          <li  class="active"><a  href="http://localhost/codeignitertest/index.php/Charts">Progress</a></li>
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
            <h3><i class="fa fa-angle-right"></i>Project Status</h3>
              <div class="row">
                  <div class="col-lg-9 main-chart">
                        <div class="row">
                            <!-- TWITTER PANEL -->
                            <div class="col-md-8">
                                <div class="content-panel">
                                    
                                            <h4><i class="fa fa-angle-right"></i> Calendar Notes</h4>
                                            <hr>
                                        
                                        <table class="table table-hover table-condensed" id="cal_notes">
                                        <thead>
                                        <tr>
                                            
                                            <th><i class="fa fa-calendar"></i> Date</th>
                                            <th><i class="fa fa-bookmark"></i> Note</th>
                                            <th><i class="fa fa-user"></i> Member(s)</th>
                                            <th><i class=" fa fa-edit"></i> Status</th>
                                            <th><i class="fa fa-comments"></i> Open Chat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($projectStatus as $stat){?>
                                                <tr>
                                                    <?php 
                                                        $dates = explode("-", $stat->date);
                                                    ?>
                                                    <td><a href='<?php echo "http://localhost/codeignitertest/index.php/Calendar/showCal/".$dates[0]."/".$dates[1];?>'> <?php echo $stat->date; ?></a></td>
                                                    <td class="hidden-phone"><?php echo $stat->note; ?></td>
                                                    <td><?php echo $stat->first_name; ?> </td>
                                                    <td><?php if($stat->status==0){echo "<span class='label label-info label-mini'> <i class='fa fa-plus-square'></i> Pending </span>";}else if($stat->status==1){echo "<span class='label label-success'><i class='fa fa-check-square'></i> Completed</span>";}else{echo "<span class='label label-danger'><i class='fa fa-minus-square'></i> Expired </span>";}?></td>
                                                    <td>
                                                        <button class="btn btn-default btn-xs"><i class="fa fa-weixin"></i> Chat</button>
                                                        
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        ?>
                                       </tbody>
                                    </table>
                                </div><!-- /content-panel -->
                            </div><!-- /col-md-12 -->
                            <!-- Donut Chart -->
                            <aside class="col-lg-4 mt">
                            <div data-scrollreveal="enter left and move 100px">
                      		<div class="darkblue-panel pn">
                                    <div class="darkblue-header">
					<h5>CALENDAR STATICS</h5>
                                    </div>
                                    <canvas id="serverstatus02" height="120" width="120"></canvas>
                                    <script>
                                        <?php
                                            $pendingCount = $allCount - ($sucCount);
                                            $percentage = ($sucCount/$allCount)*100;
                                        ?>
					var doughnutData = [
                                            {
                                            value: <?php echo $sucCount ; ?>,
                                            color:"#00b33c"
                                            },
                                            {
                                            value : <?php echo $pendingCount ; ?>,
                                            color : "#68dff0"
                                            }
                                            ];
                                            var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                                            </script>
						<p>
                                                    <?php 
                                                    $day = date("dS");
                                                    $month = date("F");
                                                    $year = date("Y");
                                                    
                                                    echo  $day." ".$month.", ".$year;
                                                    
                                                    ?>
                                                </p>
                                                    <footer>
							<div class="pull-left">
                                                            <h5><i class="fa fa-tasks"></i> <?php echo $allCount; ?> Total</h5>
							</div>
							<div class="pull-right">
                                                            <h5><?php echo number_format((float)$percentage, 2, '.', '') ; ?>% Completed</h5>
							</div>
                                                    </footer>
                      		</div><! -- /darkblue panel -->
                            </div><!-- /col-md-4 -->
                            </aside>
                        </div><!-- /row -->
                        <div class="col-md-4 mb"  data-scrollreveal="enter left and move 100px">
                            
                        </div>		
                        <div class="row mt">
                            
			</div><!-- /row -->	
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  

              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="http://localhost/codeignitertest/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="http://localhost/codeignitertest/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="http://localhost/codeignitertest/assets/js/jquery.scrollTo.min.js"></script>
    <script src="http://localhost/codeignitertest/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="http://localhost/codeignitertest/assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="http://localhost/codeignitertest/assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="http://localhost/codeignitertest/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="http://localhost/codeignitertest/assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="http://localhost/codeignitertest/assets/js/sparkline-chart.js"></script>    
    <script src="http://localhost/codeignitertest/assets/js/zabuto_calendar.js"></script>	

    </script>
    <!-- SCROLL REVEL LIBRARY FOR SCROLLING ANIMATIONS-->
        <script src="http://localhost/codeignitertest/assets/js/scrollReveal.js"></script>
        <script>
        window.scrollReveal = new scrollReveal();
        </script>
  </body>
</html>
