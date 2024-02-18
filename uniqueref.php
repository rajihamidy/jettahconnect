<?php

function generateUniqueReference($length = 20) {
    // Characters to be used in the reference number
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    // Get current timestamp
    $timestamp = time();
    
    // Generate random string
    $randomString = '';
    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    
    // Combine timestamp and random string
    $uniqueReference = $timestamp . '-' . $randomString;
    
    return $uniqueReference;
}

// Generate a unique reference number
$uniqueReference = generateUniqueReference();

//echo "Unique Reference Number: " . $uniqueReference;

