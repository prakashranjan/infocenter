<?php
 require_once('auth.php');
include("connection.php");

 
$term=$_POST['term'];


                 $kqry="SELECT topic_id,category FROM topic where category like '$term%' ORDER BY views DESC ";


$p=0;

                $kresult=mysql_query($kqry);
				
                while($krow = mysql_fetch_row($kresult))
                {$n = rand(3 , 7 );
			if($p==0||$p==1)
			{echo'<div class="col-lg-6 col-sm-6 cartoon "><a href="topic.php?tno='.$krow[0].'"><div class="well ttext c'.$n.'">'.$krow[1].'</div></a></div>';      
			        $p++;}
					else if($p==2||$p==3||$p==4)
					{ echo'<div class="col-lg-4 col-sm-6 cartoon "><a href="topic.php?tno='.$krow[0].'"><div class="well ttext c'.$n.'">'.$krow[1].'</div></a></div>';
					$p++;
					if($p==5){$p=0;}
					}
					
		 }
				if(!$krow[1]&& $p==0) 
{echo'<img height="20%" width="20%"src="images/sorry.png"></img><br /><h2>Sorry no topic</h2>';}				
 ?>
 
        
    
	
	