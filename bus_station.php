<?php // PHP version 7.0.3

$groupsAmount = intval(readline("Type the amount of groups:"));

$membersAmount = array_map('intval', explode(" ", readline("Please enter the number of members of each group, separated by space:")));

if(sizeof($membersAmount) < $groupsAmount || sizeof($membersAmount) > $groupsAmount){
	die("\n\nThe number of groups doesn't match.\n For Example:\n If the total of groups is 4, the total members of each group should be represented like: 'x y z w'\n");
}

$maximumNumberSeats = array_sum($membersAmount);

$results = array();


foreach (range(1, $maximumNumberSeats) as $x) {
	$busySeats = array();
	$trips = array();
	foreach($membersAmount as $totalMembers){


		if($totalMembers <= $x && (array_sum($busySeats) + $totalMembers) <= $x){
			array_push($busySeats, $totalMembers);
		}
		else{
			$trips = array();
			break;
		}

		if(array_sum($busySeats) === $x){
			$trips = array_merge($trips, $busySeats);
			$busySeats = array();
		}

	}

	if($trips === $membersAmount){
		array_push($results, $x);
	}

}

echo "Result: ".implode(' ', $results);

?>