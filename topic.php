<?php
	require_once('auth.php');
 include("connection.php");	
	
	        $usern=$_SESSION['SESS_USERNAME'];
	        $firstn=$_SESSION['SESS_FIRST_NAME'];
			$lastn=$_SESSION['SESS_LAST_NAME'];
			$fulln=$firstn." ".$lastn;
			$gender=$_SESSION['SESS_GENDER'];
			$gender= strtolower($gender);
			
		
?>
<?php
function saveimage($name,$image)
            {$usern=$_SESSION['SESS_USERNAME'];
			
                
                $qry="UPDATE member SET picname='$name',picture='$image' WHERE username='$usern'";
                $result=mysql_query($qry);
                if($result)
                {
                    //echo "<br/>Image uploaded.";
                }
                else
                {
                    //echo "<br/>Image not uploaded.";
                }
            }

?>
<?php

                $usern=$_SESSION['SESS_USERNAME'];
                $qry7="SELECT picture FROM member WHERE username='$usern'";
                $ppicture7=mysql_query($qry7);
 $crow = mysql_fetch_row($ppicture7);
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Welcome <?php echo $firstn ?></title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		
		<style type="text/css">
		.marq{font-family:Marquee;
		      font-size:120%;}
			  .cartoon{font-family:tnamefont;
			            font-size:170%;}
		@font-face {
    font-family:tnamefont;
    src: url(fonts/tnamefont.ttf);
}		  
		  @font-face {font-family:"Marquee";src:url("fonts/MARQUEE_.eot?") format("eot"),url("fonts/MARQUEE_.woff") format("woff"),url("fonts/MARQUEE_.ttf") format("truetype"),url("fonts/MARQUEE_.svg#Marquee") format("svg");font-weight:normal;font-style:normal;}
.ubuntu{font-family:Ubuntu;}


 #dropbox-back{
	  position:fixed;
	  margin:0;
	  padding:0;
	  height:100%;
	  width:100%;
	  z-index:1005;
	  cursor:pointer;
	  background-color:black;
	  opacity:0.8;
	 display:none;
	  
  }
  
  #dropbox{
	  padding:0;
	  
	  position:fixed;
	 opacity:1.5;
	 
	  z-index:1009;
	  display:none;
  }
.centered-form{
	margin-top: 20px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 1.5);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}	
  .ri{float:right;}
		</style>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		
<script>
$(document).ready(function(){
	$('#profilepicture').click(function(){
		$('#dropbox-back').fadeIn();
		$('#dropbox').fadeIn();
		return false;
	})
	
	$('#dropbox-back').click(function(){
		$('#dropbox-back').fadeOut();
		$('#dropbox').fadeOut();
		return false;
		
		
	})
	
	$('#closeform').click(function(){
		$('#dropbox-back').fadeOut();
		$('#dropbox').fadeOut();
		return false;
		
		
	})
	
	
	
});


</script>
		
  <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'  type='text/css'>
	</head>
	<body>
<!--ppic upload-->
<div id="dropbox" >
  <div class="container">
        <div class="row centered-form">
        <div class="col-xs-14 col-sm-6 col-md-6 col-sm-offset-2 col-md-offset-6">
        	<div class="panel panel-success">
        		<div class="panel-heading">
			    		<div id="closeform" ><button type="button" style="float:right;"class="btn btn-danger btn-md">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
</button></div>
						<h3 class="panel-title">Upload New Picture</h3>
									 			</div>
			 			<div class="panel-body">
			    		<form  enctype="multipart/form-data" action="home.php" method="post" >
						<div class="form-group">
						<?php 
					
if(!($crow[0])){
if( ($_SESSION['SESS_GENDER'])!='Male' && !($_SESSION['SESS_PICTURE']) )
{$url='ppicdeff';}
else
{$url='ppicdefm';}

  echo '<img class="img-thumbnail" height="100%" width="100%"  src="$url.jpg"> ';
$dimage= "$url.jpg";

                    $name=$url.'.jpg';
                    $dimage= file_get_contents($dimage);
                    $dimage= base64_encode($dimage);
                    saveimage($name,$dimage);



}
else
{
	
	function displayimage()
            {$usern=$_SESSION['SESS_USERNAME'];
                
                $qry9="select picture from member WHERE username='$usern' ";
                $result9=mysql_query($qry9);
                $row = mysql_fetch_row($result9);
                		
							echo '<img class="img-thumbnail" height="100%" width="100%"  src="data:image;base64,'.$row[0].'"> ';

                   
            }
	
	displayimage();
}


?> 

						</div>
			    			<div class="row">
			    				<div class="col-xs-12 col-sm-4 col-md-6">
			    					<div class="form-group">
			                <input type="file" name="propic" id="propic" class="form-control input-md"/>
			    					</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-4 col-md-6">
			    					<div class="form-group">
			    						<p class="text-primary">
										<?php
 if(isset($_POST['propicsubmit']))
            {
                if(getimagesize($_FILES['propic']['tmp_name']) == FALSE)
                {
                    echo "Please select an image.";
                }
                else
                {
                    $npropic= addslashes($_FILES['propic']['tmp_name']);
                    $npicname= addslashes($_FILES['propic']['name']);
                    $npropic= file_get_contents($npropic);
                    $npropic= base64_encode($npropic);
                    savemyimage($npicname,$npropic);
                }
            }
            
            function savemyimage($mname,$mimage)
            {$usern=$_SESSION['SESS_USERNAME'];
			
               
                $qry5="UPDATE member SET picname='$mname',picture='$mimage' WHERE username='$usern'";
                $result5=mysql_query($qry5);
                if($result5)
                {
                echo'<i class="glyphicon glyphicon-ok"></i>';
					//echo"success";
                }
                else
                {//echo"Below 800kb please";
                   //echo"failed";
                }
				
            }



?>
</p>
			    					</div>
			    				</div>
			    			</div>
                            
			    		
                        	
			    			
			    			<input type="submit" name="propicsubmit"value="Upload" class="btn btn-success btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>


</div>

	<div id="dropbox-back"></div>	


	<div class="wrapper">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
                      
          
            <!-- sidebar -->
            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
              
              	<ul class="nav">
          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
            	</ul>
               
                <ul class="nav hidden-xs" id="lg-menu">
				     
				    <li ><a class="btn btn-sm" id="profilepicture" >
					<?php 
						$usern=$_SESSION['SESS_USERNAME'];
                
                $n2qry="select picture from member WHERE username='$usern' ";
                $n2result=mysql_query($n2qry);
                $n2row = mysql_fetch_row($n2result);
                
				echo '<img class="img-rounded"width="80%" height="85%"alt="Cinque Terre" src="data:image;base64,'.$n2row[0].'"> ';
				

					 ?>
					</a></li>
                    <li  class="ubuntu"><a style="background:#003d99;"href="#featured"><i class="fa fa-<?php echo $gender;?> fa-2x"></i><span style="font-size:25px;"> $<?php echo $usern ?></span></a></li>
                    <li class=" marq "><a  style="color:white; background:#4d93ff;"href="#stories"><i class="glyphicon glyphicon-home"></i> <?php echo $fulln ?></a></li>
                    <li class="active"><a href="home.php"><i class="glyphicon glyphicon-paperclip"></i> Trending</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-film"></i> Favourites</a></li>
					<li><a href="#"><i class="glyphicon glyphicon-euro"></i> Favourites</a></li>
					<li><a href="#"><i class="glyphicon glyphicon-star"></i> Favourites</a></li>
					<li><a href="#"><i class="glyphicon glyphicon-plus"></i> Favourites</a></li>
					<li><a href=""><i class="glyphicon glyphicon-refresh"></i> Refresh</a></li>
                </ul>
                <ul class="list-unstyled hidden-xs" id="sidebar-footer">
                    <li>
                      <a href="http://www.bootply.com"><h3>Bootstrap</h3> <i class="glyphicon glyphicon-heart-empty"></i> Bootply</a>
                    </li>
                </ul>
              
              	<!-- tiny only nav-->
              <ul class="nav visible-xs" id="xs-menu">
                  	<li><a href="#featured" class="text-center"><i class="glyphicon glyphicon-list-alt"></i></a></li>
                    <li><a href="#stories" class="text-center"><i class="glyphicon glyphicon-list"></i></a></li>
                  	<li><a href="#" class="text-center"><i class="glyphicon glyphicon-paperclip"></i></a></li>
                    <li><a href="#" class="text-center"><i class="glyphicon glyphicon-refresh"></i></a></li>
                </ul>
              
            </div>
            <!-- /sidebar -->
          
            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">
                
                <!-- top nav -->
              	<div class="navbar navbar-blue navbar-static-top">  
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
                      </button>
                      <a href="#" class="navbar-brand logo">S</a>
                  	</div>
                  	<nav class="collapse navbar-collapse" role="navigation">
                    <form class="navbar-form navbar-left">
                        <div class="input-group input-group-sm" style="max-width:360px;">
                          <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                          <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
                      </li>
                      <li>
                        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
                      </li>
					  
                      <li>
                        <a href="#"><span class="badge">Trending</span></a>
                      </li>
					  <li>
                        <a href="#"><span class="badge">Favourites</span></a>
                      </li>
					  <li>
                        <a href="#"><i class="fa fa-database"></i></a>
                      </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
                        <ul class="dropdown-menu">
                          <li><a href="">help</a></li>
                          <li><a href="">settings</a></li>
                          <li><a href="">privacy</a></li>
                          <li><a href="">profile</a></li>
                          <li><a href="index.php">logout</a></li>
                        </ul>
                      </li>
                    </ul>
                  	</nav>
                </div>
                <!-- /top nav -->
              
                <div class="padding">
                    <div class="full col-sm-9">
                      
                        <!-- content -->                      
                      	<div class="row">
                          
                         <!-- main col left --> 
                         <div class="col-sm-6">
                           
                              <div class="panel panel-default">
                                 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>More Templates</h4></div>
                                  <div class="panel-body">
                                    <img src="images/pic09.jpg" class="img-circle pull-left"> <a href="#">Free @Bootply</a>
                                    <div class="clearfix"></div>
                                    There<?php echo $src;?> a load of new free Bootstrap 3 ready templates at Bootply. All of these templates are free and don't require extensive customization to the Bootstrap baseline.
                                    <hr>
                                    <ul class="list-unstyled"><li><a href="http://www.bootply.com/templates">Dashboard</a></li><li><a href="http://www.bootply.com/templates">Darkside</a></li><li><a href="http://www.bootply.com/templates">Greenfield</a></li></ul>
                                  </div>
                              </div>
                        
                           
                          </div>
						  </div>
						  <?php
						  
function otherdisplayimage()
            {$usern=$_SESSION['SESS_USERNAME'];
                
                $nqry="select picture from member WHERE username='$usern' ";
                $nresult=mysql_query($nqry);
                $nrow = mysql_fetch_row($nresult);
                
				echo '<img class="img-circle pull-right"  src="data:image;base64,'.$nrow[0].'"> ';
				
                					 
            }
							  ?>
                          <div class="row">
                          <!-- main col right -->
                          <div class="col-sm-6 ri">
                               
                               
                      
                               <div class="panel panel-default">
                                 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootply Editor &amp; Code Library</h4></div>
                                  <div class="panel-body">
                                    <p><?php
									      otherdisplayimage();
									?> <a href="#">The Bootstrap Playground</a></p>
                                    <div class="clearfix"></div>
                                    <hr>
                                    Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code repository.
                                  </div>
                               </div>
                  
                            
                          </div>
						  </div>
						  <div class="row">
						   <!-- main col right -->
                          <div class="col-sm-6 ri">
                               
                               
                      
                               <div class="panel panel-default">
                                 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootply Editor &amp; Code Library</h4></div>
                                  <div class="panel-body">
                                    <p><?php
									      otherdisplayimage();
									?> <a href="#">The Bootstrap Playground</a></p>
                                    <div class="clearfix"></div>
                                    <hr>
                                    Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code repository.
                                  </div>
                               </div>
            
                          </div>
						  </div>
						  <div class="row">
						  <!-- main col left --> 
                         <div class="col-sm-6">
                           
                              <div class="panel panel-default">
                                 <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>More Templates</h4></div>
                                  <div class="panel-body">
                                    <img src="images/pic09.jpg" class="img-circle pull-left"> <a href="#"> a load of new free Bootstrap 3 ready templates at Bootply. All of these templates are free and don't require extensive customization to the Bootstrap baseline.</a>
                                    <div class="clearfix"></div>
                                    There<?php echo $src;?>
                                    <hr>
                                    <ul class="list-unstyled"><li><a href="http://www.bootply.com/templates">Dashboard</a></li><li><a href="http://www.bootply.com/templates">Darkside</a></li><li><a href="http://www.bootply.com/templates">Greenfield</a></li></ul>
                                  </div>
                              </div>
                        
                           
                          </div>
						  
                       </div><!--/row-->
                      
                        <div class="row">
                          <div class="col-sm-6">
                            <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small class="text-muted">|</small> <a href="#">Google+</a>
                          </div>
                        </div>
                      
                        <div class="row" id="footer">    
                          <div class="col-sm-6">
                            
                          </div>
                          <div class="col-sm-6">
                            <p>
                            <a href="#" class="pull-right">©Copyright 2013</a>
                            </p>
                          </div>
                        </div>
                      
                      <hr>
                      
                      <h4 class="text-center">
                      <a href="http://bootply.com/96266" target="ext">Download this Template @Bootply</a>
                      </h4>
                        
                      <hr>
                        
                      
                    </div><!-- /col-9 -->
                </div><!-- /padding -->
            </div>
            <!-- /main -->
          
        </div>
    </div>
</div>


<!--post modal-->

<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			Update Status
      </div>
      <div class="modal-body">
          <form class="form center-block">
            <div class="form-group">
              <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div>
          <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
            <ul class="pull-left list-inline"><li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li><li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li><li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li></ul>
		  </div>	
      </div>
  </div>
  </div>
</div>







	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
		
	</body>
</html>