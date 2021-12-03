<?php
$code_1 = file_get_contents("code_1_file"); //read file
$code_lines = explode(PHP_EOL, $code_1); //explode file
$counter = 0; //set empty var
$last_val  = 0;
$other_counter = 0;
foreach ($code_lines as $ix => $value) { //iterate over the list
	if ($last_val < $value){

		//skip the first one.
		if ($last_val == 0){
			$last_val = $value; //store current 132 over 0
			continue; //move on
		}
		$counter++; //up counter
	}else{
		$other_counter++; //else add one to the other counter, meaning it could be equal to also
	}
	$last_val = $value; //store current read value as last value so 132->146 //loop two last val becomes 153
}//end foreach
echo "increased $counter \r\n";
echo "other_counter $other_counter \r\n";
$total = $counter + $other_counter;
echo "Total $total"; //one less bc we just skipped the first one
?>