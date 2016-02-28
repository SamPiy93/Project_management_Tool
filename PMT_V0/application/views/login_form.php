<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Project Management Tool</title>

    <!-- Bootstrap core CSS -->
    <link href="/login/js/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/login/js/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="/login/js/assets/css/style.css" rel="stylesheet">
    <link href="/login/js/assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/login/css/sweetalert.css">
    <script type="text/javascript" src="/login/js/sweetalert.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" id="f1" onsubmit="return login()">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" id="username" name="username" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		            
		            <div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div>
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="<?php echo base_url(); ?>/login/loadSignup">
		                    Create an account
		                </a>
		            </div>
		
		        </div>
		
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/login/js/assets/js/jquery.js"></script>
    <script src="/login/js/assets/js/bootstrap.min.js"></script>
    <script src="/login/js/assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="/login/js/assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="/login/js/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/login/js/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/login/js/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="/login/js/jquery.dataTables.js"></script>


    <!--common script for all pages-->
     
     
     <script>
     
     
    function login(){
     
         var data =  $('#f1').serialize();         
         
         $.ajax({
             type : "GET", 
             url : "loginCheck",
             data : data,
             dataType : "JSON",
             success : function(data){
                 
              console.log(data);   
                 if(data.status == 1){
                     if(data.ustatus == 'activate' || data.ustatus == 'Activate'){
                        if(data.usertype == 'admin'){
                           location.href = "/login/index.php/person/adminindex";
                        }else{
                            location.href = "/login/index.php/person";
                        }
                    }else{
                        swal('Error','You are not authorized!','error');
                        locaation.href = "/login/index.php/login/login1";
                    }
                     
                 }else{
                     
                      swal('ERROR','Username or password incorrectS!','error');
                 }
             },
             error: function(err){
                 
                 console.log(err);
             }
             
         });
         return false;
    }
     
     
     
     </script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="/login/js/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("/login/js/assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
