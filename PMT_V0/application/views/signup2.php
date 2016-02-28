<!DOCTYPE html>
<html>
<head>
<title>Project Management Tool</title>
    
     <link rel="stylesheet" type="text/css" href="/login/css/login_style.css">
     <link rel="stylesheet" type="text/css" href="/login/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="/login/css/sweetalert.css">
 
 <style>  
   body{
   background:url(../../img/intro-bg.jpg)
   }
   </style> 
    
</head>

<body >

<div class="container" style="margin-top:10%">

     <h1> <center> Sign Up </center></h1>
      
     <br>

    <?php echo form_open_multipart( base_url().'login/signupData', 
            array('id' => 'f1', 'class' => 'form-horizontal', 'onsubmit'=>'return signUpData()'));?>
<div class="">
     
    <div class="form-group row">
    
        <label class="label-control col-md-offset-2  col-md-1">First name</label>

        <div class="col-md-6">
        
         <input type="text" id="firstname" name="firstname" placeholder="Enter Firstname" class="form-control" required>
    
        </div>
    </div>
    
    <div class="form-group row">
    
        <label class="label-control col-md-offset-2  col-md-1">Last name</label>

        <div class="col-md-6">
        
         <input type="text" id="lastname" name="lastname" placeholder="Enter Lastname" class="form-control" required>
    
        </div>
    </div>
    
    <div class="form-group row">
        
        <label class="label-control col-md-offset-2 col-md-1">Email address</label>
        
        <div class="col-md-6">
            
    <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" required >
  </div>
     </div>  
        
    <div class="form-group row">
    
        <label class="label-control col-md-offset-2  col-md-1">User Name</label>

        <div class="col-md-6">
        
         <input type="text" id="username" name="username" placeholder="Enter User name" class="form-control" required>
    <input type="file" name="userfile" size="120" />
        </div>
    </div>    
        
     <div class="form-group row">
    
        <label class="label-control col-md-offset-2 col-md-1" >Password</label>
     
        <div class="col-md-6">
        
      <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control" required>
    
        </div>
    </div>
        
        <div class="form-group row">
    
        <label class="label-control col-md-offset-2 col-md-1" >Confirm Password</label>
     
        <div class="col-md-6">
        
      <input type="password" id="password2" name="password2" placeholder="Confirm Password" class="form-control" required>
    
        </div>
    </div>
    
    <div class="form-group row">
         <div class="col-md-3"></div>
         <div class="col-md-3"> <button type="submit"   
class="btn btn-success btn-block">Sign up</button></div>
         <div class="col-md-3"> <a href="../login/login1"  class="btn btn-primary btn-block">login</a></div>
        
      </div>
</div>
     
     </form>
     
     
     <script>
     
     
    function signUpData(){ 
         
         if(document.getElementById("password").value != document.getElementById("password2").value){
        
             swal('Error','Passwords do not match!','error');
             return false;
         }
         
         
         $.ajax({
             url : "<?php echo base_url(); ?>login/signupData",
             type: "post",
             data : $('#f1').serialize(),
             complete: function(data){
                 console.log(data);
                 
                 //alert(data.responseText);
               
                 if(data.responseText == 1){
                 swal('success','successfully registered','success');
                
                 
                 setTimeout(function(){
                     
                     window.location.href="login1";
                     
                 },2000);
				 
                 }
                 else{
                     
                     swal('ERROR','email or username already exists!');   
                 }
             }
       
         });
         
          return false;
}
         

     
     </script>
    
     <script type="text/javascript" src="/login/js/jquery-2.2.0.min.js"></script>
     <script type="text/javascript" src="/login/js/bootstrap.js"></script>
     <script type="text/javascript" src="/login/js/login_effect.js"></script>
     
     
     <script type="text/javascript" src="/login/js/sweetalert.min.js"></script>
  
</body>
 </html>