<?php

session_start();

$data = $_POST;

// it's always best practice to have Backend validation
// in addition to Frontend validation

$errors = [];

// validating text inputs

function validateText($value,$fieldName,$minLength,$maxLength) {

    if (empty($value)) {
        return $fieldName . ' cannot be empty';
    }

    if (strlen($value) < $minLength) {
        return $fieldName . ' must be at least ' . $minLength . ' characters';
    }

    if (strlen($value) > $maxLength) {
        return $fieldName . ' cannot exceed ' . $maxLength . ' characters';
    }

    return null;
}

$firstName = $data['firstName'] ?? '';
$firstNameError = validateText($firstName, 'First name', 2, 50);
if ($firstNameError) {
    $errors['firstName'] = $firstNameError;
}

$lastName = $data['lastName'] ?? '';
$lastNameError = validateText($lastName, 'Last name', 2, 50);
if ($lastNameError) {
    $errors['lastName'] = $lastNameError;
}

$favouriteArtist = $data['favouriteArtist'] ?? '';
$favouriteArtistError = validateText($favouriteArtist, 'Favourite artist', 2, 100);
if ($favouriteArtistError) {
    $errors['favouriteArtist'] = $favouriteArtistError;
}

$favouriteSong = $data['favouriteSong'] ?? '';
$favouriteSongError = validateText($favouriteSong, 'Favourite song', 2, 100);
if ($favouriteSongError) {
    $errors['favouriteSong'] = $favouriteSongError;
}

$favouriteAlbum = $data['favouriteAlbum'] ?? '';
$favouriteAlbumError = validateText($favouriteAlbum, 'Favourite album', 2, 100);
if ($favouriteAlbumError) {
    $errors['favouriteAlbum'] = $favouriteAlbumError;
}

$favouriteInstrument = $data['favouriteInstrument'] ?? '';
$favouriteInstrumentError = validateText($favouriteInstrument, 'Favourite instrument', 2, 100);
if ($favouriteInstrumentError) {
    $errors['favouriteInstrument'] = $favouriteInstrumentError;
}




// Validating checkboxes

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


 // validating the textarea inputs using the same function as with text inputs

$concertExperience = $data['concertExperience'] ?? '';
$concertExperienceError = validateText($concertExperience, 'Concert experience', 10, 1000);

if ($concertExperienceError) {
    $errors['concertExperience'] = $concertExperienceError;
}

$musicInfluence = $data['musicInfluence'] ?? '';
$musicInfluenceError = validateText($musicInfluence, 'Music influence', 10, 1000);

if ($musicInfluenceError) {
    $errors['musicInfluence'] = $musicInfluenceError;
}


// print the errors on the session
$_SESSION['errors'] = $errors;

if (count($errors) > 0) {
    // redirect back to index.php with our errors
    header('Location: ../index.php');
    exit;
}

// send answers to my email

$to = 'ilovephpimnotlyingplshelp@fanshaweonline.ca';
$subject = 'Music Preferences Survey';

$message = "Music Preferences Survey Answers\n\n";

foreach ($data as $question => $answer) {

    if (is_array($answer)) {
        $answer = implode(', ', $answer);
    }

    $message .= $question . ': ' . $answer . "\n";
}

mail($to, $subject, $message);

// show that we were successful in the session
$_SESSION['success'] = true;

// redirect to the success page
header('Location: ../success.html');
exit;
