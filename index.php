<?php
include_once"connection.php";
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
	unset($_SESSION['SESS_PICTURE']);
	unset($_SESSION['SESS_USERNAME']);
	unset($_SESSION['SESS_GENDER']);
	
	
?>
<script src="js/signupscript.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript"><!--
function checkPasswordMatch() {
    var password = $("#password1").val();
    var confirmPassword = $("#cpassword1").val();

    if (password != confirmPassword)
        $("#cpassword").html("*not matching..").css('color', 'red');
    else
        $("#cpassword").html("matched").css('color', 'green');
}
//--></script>
<link href="css/bootstrap.min.css" rel="stylesheet">

<script src="js/jquery.min.js"></script>
<style type="text/css" >
body { 
 background: url('images/back.jpg') no-repeat center center fixed; 
 -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: cover;
}

.panel-warning {
 opacity: 1.0;
 margin-top:60%;
}
.form-group.last {
 margin-bottom:0px;
}


   
   #basetop0{position:fixed;
left:0%;
opacity:0.9;
top:0%;
z-index:-999;

border-radius:10px;
   }
  #dropbox-back{
	  position:fixed;
	  margin:0;
	  padding:0;
	  height:100%;
	  width:100%;
	  z-index:1000;
	  cursor:pointer;
	  background-color:black;
	  opacity:0.8;
	 
	  display:none;
  }
  
  #dropbox{
	  padding:0;
	  
	  position:fixed;
	 opacity:1.5;
	 
	  z-index:1005;
	  display:none;
  }
.centered-form{
	margin-top: 20px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 1.5);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}	
  
  
  
  
</style>

<script>
$(document).ready(function(){
	$('#register').click(function(){
		$('#dropbox-back').fadeIn();
		$('#dropbox').fadeIn();
		return false;
	})
	
	$('#dropbox-back').click(function(){
		$('#dropbox-back').fadeOut();
		$('#dropbox').fadeOut();
		return false;
		
		
	})
	
	$('#close_register').click(function(){
		$('#dropbox-back').fadeOut();
		$('#dropbox').fadeOut();
		return false;
		
		
	})
	
	
	
});


</script>

<div id="dropbox">

<div class="container">
        <div class="row centered-form">
        <div class="col-xs-14 col-sm-6 col-md-6 col-sm-offset-2 col-md-offset-6">
        	<div class="panel panel-success">
        		<div class="panel-heading">
			    		<div id="close_register" ><button type="button" style="float:right;"class="btn btn-danger btn-md">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
</button></div>
						<h3 class="panel-title">Please sign up<small>It's free!</small></h3>
						<?php


 function NewUser() 
 { $firstname = $_POST['fname']; 
 $lastname=$_POST['lname'];
 $userName = $_POST['user'];
 $email = $_POST['email']; 
 $password = $_POST['pass'];
 $gender=$_POST['sex'];
 $query = "INSERT INTO member (fname,lname,username,email,password,gender) VALUES ('$firstname','$lastname','$userName','$email','$password','$gender')"; 
 $data = mysql_query ($query)or die(mysql_error());
 if($data) { echo "<p>thank you for signup...</br> Login with your username and password.</p>"; 
 } }
 function SignUp() { if(!empty($_POST['user'])) 
	 //checking the 'user' name which is from Sign-Up.html, is it empty or have some text 
	 { $query = mysql_query("SELECT * FROM member WHERE username = '$_POST[user]' AND password = '$_POST[pass]'") or die(mysql_error());
	 if(!$row = mysql_fetch_array($query) or die(mysql_error())) { newuser();
	 } else { echo "<p>SORRY...YOU ARE ALREADY REGISTERED USER...</p>"; 
	 } } } if(isset($_POST['submit2'])) 
	 { SignUp(); } ?>
			 			</div>
			 			<div class="panel-body">
			    		<form role="form"  >
			    			<div class="row">
			    				<div class="col-xs-12 col-sm-4 col-md-6">
			    					<div class="form-group">
			                <input type="text" name="first_name" id="first_name" class="form-control input-md" placeholder="First Name">
			    					</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-4 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="last_name" id="last_name" class="form-control input-md" placeholder="Last Name">
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-md" placeholder="Email Address">
			    			</div>
                        <div class="row">
						<div class="col-xs-12 col-sm-4 col-md-6">
			    					<div class="form-group">
			                   <label class="btn btn-info"><button type="button" class="btn btn-success btn-md"><span class="glyphicon glyphicon-earphone" aria-hidden="true">&nbsp;Phone</span></button><input type="text" name="phone" id="phone" class="form-control input-md" value="+91"placeholder=""></label>
			    					</div>
			    				</div>
						
						<div class="col-xs-12 col-sm-4 col-md-6">
							<div style="float:right;"class="form-group">	
			    				<label class="btn btn-warning"><input class="form-control input-md" value="female"type="radio" name="optradio">female</label>
							<label class="btn btn-primary"><input class="form-control input-md" value="male"type="radio" name="optradio">male</label>
								
							</div>
							</div>
							</div>
						
							<div class="form-group">
			    				<input type="text" name="user" id="user" class="form-control input-md" placeholder="Username">
			    			</div>
							
							
			    			<div class="row">
			    				<div class="col-xs-12 col-sm-4 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-md" placeholder="Password">
			    					</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-4 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-md" placeholder="Confirm Password">
			    					</div>
			    				</div>
			    			</div>
			    			
			    			<input type="submit" value="Register" class="btn btn-success btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>



</div>



<div id="dropbox-back"></div>


<div class="container">
<img border="0" id="basetop0" src="images/top-barmain.png" height="100%" width="130%"></img>


    <div class="row">

        <div class="col-md-4 col-md-offset-7 pull-left">
		
            <div class="panel panel-warning">
			
                <div class="panel-heading"> <strong class="">Login</strong>

                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" action="login_exec.php" method="post">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                                <input type="username" class="form-control" name="username"id="inputEmail3" placeholder="Username" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password"name="password" class="form-control" id="inputPassword3" placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label class="">
                                        <input type="checkbox" class="">Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button name="submit" type="submit"id="submit" class="btn btn-warning btn-sm">Sign in</button>
                                <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            </div>
                        </div>
                    </form>
					<!--the code bellow is used to display the message of the input validation-->
		 <?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err"  >';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li style="color:red;">',$msg,'</li>'; 
				}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>
                </div>
				
                <div class="panel-footer">Not Registered? <a class="btn btn-primary btn-sm"id="register">Register here</a>
				
	
	
                </div>
				
            </div>
        </div>
    </div>
	
</div>



