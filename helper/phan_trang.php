<?php
$page =0;
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 1;
		}
		$limit = 6;
        $start = ($page - 1) * $limit;
?>        