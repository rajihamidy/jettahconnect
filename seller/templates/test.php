<?php

// Assuming you have two date strings or DateTime objects
$dateString1 = '2022-01-01';
$dateString2 = '2021-12-15';

// Convert date strings to DateTime objects
$date1 = new DateTime($dateString1);
$date2 = new DateTime($dateString2);

// Calculate the difference between the two dates
$interval = $date2->diff($date1);

// Get the total number of days
$daysDifference = $interval->format('%r%a');

// Output the result
echo "The difference between the two dates is $daysDifference days.";

