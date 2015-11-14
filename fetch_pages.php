<?php
/* Title : Ajax Pagination with jQuery & PHP
Example URL : http://www.sanwebe.com/2013/03/ajax-pagination-with-jquery-php */

//continue only if $_POST is set and it is a Ajax request
if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	
	require("config.inc.php");  //include config file
	//Get page number from Ajax POST
	if(isset($_POST["page"])){
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
	}else{
		$page_number = 1; //if there's no page number, set it to 1
	}
	
	//get total number of records from database for pagination
	$results = $mysqli_conn->query("SELECT COUNT(*) FROM player");
	$get_total_rows = $results->fetch_row(); //hold total records in variable
	//break records into pages
	$total_pages = ceil($get_total_rows[0]/$item_per_page);
	
	//get starting position to fetch the records
	$page_position = (($page_number-1) * $item_per_page);
	
	//SQL query that will fetch group of records depending on starting position and item per page. See SQL LIMIT clause
	$results = $mysqli_conn->query("SELECT player.id,player.name, player.level, player.exp, player.playtime, player_index.empire, player.level_step,player.job,account.zipcode FROM (player.player) LEFT JOIN account.account ON account.id = player.account_id LEFT JOIN player.player_index on account.id= player_index.id WHERE player.name NOT LIKE '[%' AND (account.status = 'OK' OR status='ONLY_FOR_TEAM' OR status = 'WARTUNG') ORDER BY player.level desc, player.exp, player.playtime desc LIMIT $page_position, $item_per_page");
	
	//Display records fetched from database.
	
	echo '<div align="center">';
	/* We call the pagination function here to generate Pagination link for us. 
	As you can see I have passed several parameters to the function. */
	echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
	echo '</div>';

    $rang = 1;
    if($_POST["page"]==2)
     {
    $rang += 50;
    } elseif($_POST["page"]>2)
     {
     $rang += 50 * intval($_POST["page"]);
    }



	echo '<center><table class="table">
  	<tr>
  	<th>#</th>
     <th>Jugador<a href="#">&nabla;</a> <a href="#">&Delta;</a></th>
     <th>Nivel<a href="#">&nabla;</a> <a href="#">&Delta;</a></th>
     <th>Tiempo de Juego<a href="#">&nabla;</a> <a href="#">&Delta;</a></th>
     <th>Reino<a href="#">&nabla;</a> <a href="#">&Delta;</a></th>
     </tr>
    ';
	while($row = $results->fetch_assoc()) {
	    $time = round($row['playtime'] / 60);
		echo "<tr>";
		echo "<td>".$rang++."</td>";
		echo "<td onmouseout='UnTip()' onabort='UnTip()' onblur='UnTip()'  onmouseover='Tip(&#39;&lt;div class=&quot;rankcol&quot;&gt;&lt;img src=&quot;img/misc/player/job/".$row['job'].".png&quot; width=&quot;100&quot; height=&quot;100&quot;&gt;&lt;br&gt;&lt;img src=&quot;img/misc/player/step/".$row['level_step'].".png&quot;&gt;&lt;br&gt;&lt;br&gt;&lt;/div&gt;&#39;)'><a href='index.php?s=perfil&pid=".$row['name']."' >".$row['name']."</a><span style='float:right;'><img src='img/flags/".$row['zipcode'].".png'></span></td>";
		echo "<td>".$row['level']."</td>";
		echo "<td>".$time." Hrs</td>";
		echo "<td><img src=img/misc/player/empire/empire_".$row['empire'].".jpg></td>";
	}  

	echo '</tr>';
	echo '</table><br>';
	
	
	
	echo '<div align="center">';
	/* We call the pagination function here to generate Pagination link for us. 
	As you can see I have passed several parameters to the function. */
	echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
	echo '</div>';
}
################ pagination function #########################################
function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 3; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
			$previous_link = ($previous==0)?1:$previous;
            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        
              
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
				$next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
    return $pagination; //return pagination links
}
?>

