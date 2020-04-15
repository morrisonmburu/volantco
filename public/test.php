<?php 

	$test = ["-1.2572267 ,36.8032074 ,Westgate Shopping MallKE Spring Valley Nairobi","-1.2591663 ,36.8156131 ,Royal Snacks LtdThird Parklands Ave Parklands Nairobi City"];

    // $show = json_decode($test);
   	// print_r($test);
	$i = 0;
	$latitude = array();
   	foreach ($test as $key) {
   		$see = explode(',', $key);
   		$latitude[] = $see[0];
   	}

   	print_r($latitude[0]);

 ?>