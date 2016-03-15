<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Notifications</title>

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
                            
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have <?php if($notificationCount==0){echo "no" ; } else{ echo $notificationCount; }?> pending notifications</p>
                            </li>
                            <li>
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
                                    <span class="from"><?php echo $msg->member_name;?></span>
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
                      <a href="index.html" class="active"  >
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="http://localhost/codeignitertest/index.php/Home">Home</a></li>
                          <li><a  href="http://localhost/codeignitertest/index.php/Messages">Messages</a></li>
                          <li class="active"><a  href="http://localhost/codeignitertest/index.php/Notifications">Notifications</a></li>
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
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Projects</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="http://localhost/codeignitertest/index.php/Calendar/showCal">Calendar</a></li>
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
          	<h3><i class="fa fa-angle-right"></i>Notifications</h3>
              <!-- page start-->
              <div class="row mt">
                  <aside class="col-lg-4 mt">
                      <section class="panel">
                          <div class="panel-body">
                              <?php
                              foreach($unNotifications as $un)
                              {
                                  $dates = explode("-", $un->date);
                              ?>
                              <a href='<?php echo "http://localhost/codeignitertest/index.php/Calendar/showCal/".$dates[0]."/".$dates[1];?>'>
                                <div class="alert alert-info">
                                    <div class="row">
                                        <aside class="col-lg-9 mt">
                                        <h5><?php echo $un->note ; ?></h5>
                                        </aside>
                                        <aside class="col-lg-3 mt">
                                            <h6><?php echo $un->date_time ;?></h6>
                                        </aside>
                                    </div>
                                </div>
                              </a>
                              <?php
                              }
                              ?>
                              <?php
                              foreach($seenNotifications as $seen)
                              {
                                  $dates = explode("-", $seen->date);
                              ?>
                              <a href='<?php echo "http://localhost/codeignitertest/index.php/Calendar/showCal/".$dates[0]."/".$dates[1];?>'>
                                <div class="alert alert-success">
                                    <div class="row">
                                        <aside class="col-lg-9 mt">
                                        <h5><?php echo $seen->note ; ?></h5>
                                        </aside>
                                        <aside class="col-lg-3 mt">
                                            <h6><?php echo $seen->date_time ;?></h6>
                                        </aside>
                                    </div>
                                </div>
                              </a>
                              <?php
                              }
                              ?>
                          </div>
                          
                      </section>
                  </aside>
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

