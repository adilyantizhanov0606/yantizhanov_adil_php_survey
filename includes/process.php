<?php

session_start();

$data = $_POST;

// it's always best practice to have Backend validation
// in addition to Frontend validation

$errors = [];

// validating text inputs

$firstName = $data['firstName'] ?? '';

if (strlen($firstName) < 2) {
    $errors['firstName'] = 'First name must be at least 2 characters';
}

if (strlen($firstName) > 50) {
    $errors['firstName'] = 'First name cannot exceed 50 characters';
}

if (empty($firstName)) {
    $errors['firstName'] = 'First name cannot be empty';
}


$lastName = $data['lastName'] ?? '';

if (strlen($lastName) < 2) {
    $errors['lastName'] = 'Last name must be at least 2 characters';
}

if (strlen($lastName) > 50) {
    $errors['lastName'] = 'Last name cannot exceed 50 characters';
}

if (empty($lastName)) {
    $errors['lastName'] = 'Last name cannot be empty';
}


$favouriteArtist = $data['favouriteArtist'] ?? '';

if (strlen($favouriteArtist) < 2) {
    $errors['favouriteArtist'] = 'Favourite artist must be at least 2 characters';
}

if (strlen($favouriteArtist) > 100) {
    $errors['favouriteArtist'] = 'Favourite artist cannot exceed 100 characters';
}

if (empty($favouriteArtist)) {
    $errors['favouriteArtist'] = 'Favourite artist cannot be empty';
}


$favouriteSong = $data['favouriteSong'] ?? '';

if (strlen($favouriteSong) < 2) {
    $errors['favouriteSong'] = 'Favourite song must be at least 2 characters';
}

if (strlen($favouriteSong) > 100) {
    $errors['favouriteSong'] = 'Favourite song cannot exceed 100 characters';
}

if (empty($favouriteSong)) {
    $errors['favouriteSong'] = 'Favourite song cannot be empty';
}


$favouriteAlbum = $data['favouriteAlbum'] ?? '';

if (strlen($favouriteAlbum) < 2) {
    $errors['favouriteAlbum'] = 'Favourite album must be at least 2 characters';
}

if (strlen($favouriteAlbum) > 100) {
    $errors['favouriteAlbum'] = 'Favourite album cannot exceed 100 characters';
}

if (empty($favouriteAlbum)) {
    $errors['favouriteAlbum'] = 'Favourite album cannot be empty';
}


$favouriteInstrument = $data['favouriteInstrument'] ?? '';

if (strlen($favouriteInstrument) < 2) {
    $errors['favouriteInstrument'] = 'Favourite instrument must be at least 2 characters';
}

if (strlen($favouriteInstrument) > 100) {
    $errors['favouriteInstrument'] = 'Favourite instrument cannot exceed 100 characters';
}

if (empty($favouriteInstrument)) {
    $errors['favouriteInstrument'] = 'Favourite instrument cannot be empty';
}


// Validate checkboxes

$musicGenres = $data['musicGenres'] ?? [];

if (empty($musicGenres)) {
    $errors['musicGenres'] = 'Please select at least one music genre';
}


$listeningPlaces = $data['listeningPlaces'] ?? [];

if (empty($listeningPlaces)) {
    $errors['listeningPlaces'] = 'Please select at least one listening place';
}


$musicPlatforms = $data['musicPlatforms'] ?? [];

if (empty($musicPlatforms)) {
    $errors['musicPlatforms'] = 'Please select at least one music platform';
}

// validate the radio inputs

$listeningMethod = $data['listeningMethod'] ?? '';

if (empty($listeningMethod)) {
    $errors['listeningMethod'] = 'Please select your preferred listening method';
}


$musicFormat = $data['musicFormat'] ?? '';

if (empty($musicFormat)) {
    $errors['musicFormat'] = 'Please select your preferred music format';
}


$musicDiscovery = $data['musicDiscovery'] ?? '';

if (empty($musicDiscovery)) {
    $errors['musicDiscovery'] = 'Please select how you discover new music';
}


 // validating the textarea inputs

$concertExperience = $data['concertExperience'] ?? '';

if (strlen($concertExperience) < 10) {
    $errors['concertExperience'] = 'Concert experience must be at least 10 characters';
}

if (strlen($concertExperience) > 1000) {
    $errors['concertExperience'] = 'Concert experience cannot exceed 1000 characters';
}

if (empty($concertExperience)) {
    $errors['concertExperience'] = 'Concert experience cannot be empty';
}


$musicInfluence = $data['musicInfluence'] ?? '';

if (strlen($musicInfluence) < 10) {
    $errors['musicInfluence'] = 'Music influence must be at least 10 characters';
}

if (strlen($musicInfluence) > 1000) {
    $errors['musicInfluence'] = 'Music influence cannot exceed 1000 characters';
}

if (empty($musicInfluence)) {
    $errors['musicInfluence'] = 'Music influence cannot be empty';
}


// print the errors on the session
$_SESSION['errors'] = $errors;

if (count($errors) > 0) {
    // redirect back to index.php with our errors
    header('Location: ../index.php');
    exit;
}


// show that we were successful in the session
$_SESSION['success'] = true;

// redirect back to index.php
header('Location: ../index.php');
exit;
