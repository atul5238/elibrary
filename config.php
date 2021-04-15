<?php
$mail->SMTPDebug = 0;                               
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';                    
$mail->SMTPAuth = true;                            
$mail->Username   = 'dirtyhopper5238@gmail.com';
$mail->Password   = 'd1rtyhopper';              
$mail->SMTPSecure = 'ssl';  
$mail->Host = 'ssl://smtp.gmail.com:465';
$mail->Port = 465;   
$mail->setFrom('dirtyhopper5238@gmail.com', 'eLibrary | Do Not Reply');
$mail->isHTML(true);           
?>