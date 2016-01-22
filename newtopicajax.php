<?php 
require_once('auth.php');
include("connection.php");
                    
                    $uname=$_POST['usern'];
                    $newtopic= addslashes($_POST['ntopic']);
					$qr="select (category) from topic where category='$newtopic'";
                    $res=mysql_query($qr);
					if($outp=mysql_fetch_row($res))
					{
                   echo "topic already exists";
                }	
					else if($newtopic=="")
					{echo"please enter something";    }
				else
					{savenewtopic($newtopic);}
                
            
            
            function savenewtopic($newtopic)
            {
			$uname=$_POST['usern'];
               
                $qry45="INSERT INTO topic (category,user) VALUES ('$newtopic','$uname')";
                $result45=mysql_query($qry45);
                if($result45)
                {
                   echo "topic added successfully";
                }
                else
                {
                    echo "topic not added.";
			}}
            ?>
			