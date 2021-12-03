<?php
$code_1 = file_get_contents("code_1_file"); //read file
$code_lines = explode(PHP_EOL, $code_1); //explode file into an array and use PHP_EOL to detect line endings
$counter = 0; //set empty vars
$last_val = 0;
$first_val = 0;
$secound_val = 0;
$third_val = 0;
$other_counter = 0;
$new_list = []; //create an empty array that we will need later

foreach ($code_lines as $ix => $read) { //iterate over the new array we created

	if($ix == 0){ //if we are at index zero then we just want the first val
		$first_val = $read;
		continue; //stop here and continue the loop  
	}
	if($ix == 1){ //if we are at index 1 we want the secound val
		$secound_val = $read;
		continue;
	}
	
	//now that we have first and secound we just need the third
	$third_val = $read;
	
	//create new list entry on the first three values
	$calc = $first_val + $secound_val + $third_val;
	echo "$first_val + $secound_val + $third_val = $calc\r\n";
	$new_list[] = $calc; // this will take the caculated values per line and add them to the new array
	
	//update rolling list
	$first_val = $secound_val; // we are now going to update the first val with the secound val we just had so if the list starts with 132, 146, 153 ww just added those
	//so  the new first val becomes 146
	$secound_val = $third_val; //146 becomes 153 so on the next loop the third val will be 175 so the secound line will be 
	//146 + 153 + 175 = 474;

}//end first foreach

foreach ($new_list as $ix => $value) { //iterate over the new list we made
	if ($last_val < $value){
		//skip the first one.
		if ($last_val == 0){
			$last_val = $value;
			continue; //move on
		}
		$counter++; //up counter
	}else{
		$other_counter++; //else add one to the other counter, meaning it could be equal to also
	}
	$last_val = $value; //store current read value as last value
}//end foreach
echo "increased $counter \r\n";
echo "other_counter $other_counter \r\n";
$total = $counter + $other_counter;
echo "Total $total"; //thee less bc we just skipped the first one and our new list is shorter by 2 as we skipped the first two to create the first value
?>