<?php
include ("bd.php");
    $Query = mysql_query("SELECT `user_id`,`message_time`,`message_text`,`message_id`,`login`,`role_id`,`uploaded_doc` FROM `messages` LEFT JOIN `users` USING (`user_id`) WHERE `chat_id` = '$myrow[chat_id]' ORDER By `message_time` DESC LIMIT 30");
    while ($myrow = mysql_fetch_array($Query))
            {
            if ($myrow['role_id']=='client' && (!empty($myrow['uploaded_doc'])))
            {
              echo '<div class="ChatBlock" id='$myrow['message_id']'><span>'.$myrow['login'].' | '.$myrow['message_time'].'</span>'.$myrow['message_text'].'&nbsp<a href="doc/'.$myrow['uploaded_doc'].'">Документ</a></div>';   
            }
            elseif ($myrow['role_id']=='client' && (empty($myrow['uploaded_doc'])))
            {
                echo '<div class="ChatBlock" id='$myrow['message_id']'><span>'.$myrow['login'].' | '.$myrow['message_time'].'</span>'.$myrow['message_text'].'</div>';  
            } 
            if ($myrow['role_id']=='consultant'&& (!empty($myrow['uploaded_doc'])))
            {
              echo '<div class="Consultant" id='$myrow['message_id']'><span>'.$myrow['login'].' | '.$myrow['message_time'].'</span>'.$myrow['message_text'].'&nbsp<a href="doc/'.$myrow['uploaded_doc'].'">Документ</a></div>';   
            }
            elseif ($myrow['role_id']=='consultant' && (empty($myrow['uploaded_doc']))){
                echo '<div class="Consultant" id='$myrow['message_id']'><span>'.$myrow['login'].' | '.$myrow['message_time'].'</span>'.$myrow['message_text'].'</div>';  
            } 
            }
?>