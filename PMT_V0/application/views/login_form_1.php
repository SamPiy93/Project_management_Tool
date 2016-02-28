 <html>
<head>
<title>Project Management Tool</title>
    
      <link href="/login/js/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/login/js/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="/login/js/assets/css/style.css" rel="stylesheet">
    <link href="/login/js/assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/login/css/sweetalert.css">
    <script type="text/javascript" src="/login/js/sweetalert.min.js"></script>
</head>

<body >


<div class="container" style="margin-top:10%">

     <h1> <center> Project Management System </center></h1>
      
     <br>
<form class="form-horizontal" id="f1" onsubmit="return login()">
<div class="">
     
    <div class="form-group row">
    
        <label class="label-control col-md-offset-2  col-md-1">Username</label>

        <div class="col-md-6">
        
         <input type="text" id="username" name="username" placeholder="Enter Username" class="form-control" required>
    
        </div>
    </div>
    
     <div class="form-group row">
    
    
        <label class="label-control col-md-offset-2 col-md-1" >Password</label>
     
        <div class="col-md-6">
        
      <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control" required>
    
        </div>
    </div>
   
     <div class="form-group row">
         <div class="col-md-3"></div>
         <div class="col-md-3"> <button type="submit" class="btn btn-primary btn-block">Login</button></div>
         <div class="col-md-3"> 
           <p><a href="<?php echo base_url(); ?>/login/loadSignup"  class="btn btn-success btn-block">Register</a>           </p>
           
           
        
     
    </div>
    
</div>
     
     </form>
    
    
    
    
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
                     //alert('login unsuccessful');
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
     
   
</body>
 </html>