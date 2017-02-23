<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


// include db connect class
//require_once  '../config/db_connect.php';"
    
require_once "$absoluteurl"."core/config/db_connect.php";
	
// connecting to db
$db = new DB_CONNECT();
/**
 * 
 * @return JSON
 */
function getCategories() {
    $sql=mysql_query("SELECT * FROM `podcast_categories`");
    while($row=mysql_fetch_assoc($sql))
    // array for JSON response
     $output[]=$row;
 //       print(json_encode($output));
    
    return json_encode($output);

}


function insetData($title, $short_dec, $long_dec, $keywords, $explicit_content, $author_name, $author_email, $file_size, $file_duration, $file_bitrate, $file_frequency,
        $file_name_with_ext, $date, $time) {
    
    if($explicit_content == "no") {
        $explicit_content = "0";
    } else {
        $explicit_content ="1";
    }
    
    $query = "INSERT INTO `podcast_episode_metadata` (`id`, `user_id`, `title`, `short_desc`, `long_desc`, `keywords`, 
            `explicit_content`, `author_name`, `author_email`, `file_size`, `file_duration`, `file_bitrate`, `file_frequency`, 
            `file_name_with_ext`, `publish_date`, `publish_time`) 
                                              VALUES (NULL, '1', '$title', '$short_dec','$long_dec', '$keywords',
            '$explicit_content', '$author_name', '$author_email', '$file_size', '$file_duration', '$file_bitrate', '$file_frequency', 
            '$file_name_with_ext', '$date', '$time');";
    
   // echo $query;
    $sql=mysql_query($query);
}

?>