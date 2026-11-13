<?php

session_start();

if (array_key_exists('errors', $_SESSION)) {
    $errors = $_SESSION['errors'];
} else {
    $errors = [];
}

// removes errors after refreshing page or fixing them
unset($_SESSION['errors']);

$firstNameError = $errors['firstName'] ?? null;
$lastNameError = $errors['lastName'] ?? null;
$favouriteArtistError = $errors['favouriteArtist'] ?? null;
$favouriteSongError = $errors['favouriteSong'] ?? null;
$favouriteAlbumError = $errors['favouriteAlbum'] ?? null;
$favouriteInstrumentError = $errors['favouriteInstrument'] ?? null;

$musicGenresError = $errors['musicGenres'] ?? null;
$listeningPlacesError = $errors['listeningPlaces'] ?? null;
$musicPlatformsError = $errors['musicPlatforms'] ?? null;

$listeningFrequencyError = $errors['listeningFrequency'] ?? null;
$listeningMethodError = $errors['listeningMethod'] ?? null;
$musicFormatError = $errors['musicFormat'] ?? null;
$musicDiscoveryError = $errors['musicDiscovery'] ?? null;

$concertExperienceError = $errors['concertExperience'] ?? null;
$musicInfluenceError = $errors['musicInfluence'] ?? null;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/grid.css">
    <title>PHP Survey</title>
</head>
<body>
    <header>
        <h1 class="hidden">Hi! Please complete our very fun survey. We're not above begging, so please please pleasee</h1>
    </header>
    <main>
            
<section>
    <h2>Tell Us About Your Music Taste</h2>
    <p>Share your favourite artists, songs, and music preferences.</p>

    <form action="includes/process.php" method="POST">

        <div>
            <label for="firstName">What is your first name?</label>
            <input name="firstName" id="firstName" type="text">
            <?php if ($firstNameError): ?>
                <span class="error"><?php echo $firstNameError; ?></span>
            <?php endif; ?>
        </div>

        <div>
            <label for="lastName">What is your last name?</label>
            <input name="lastName" id="lastName" type="text">
            <?php if ($lastNameError): ?>
                <span class="error"><?php echo $lastNameError; ?></span>
            <?php endif; ?>
        </div>

        <div>
            <label for="favouriteArtist">Who is your favourite artist?</label>
            <input name="favouriteArtist" id="favouriteArtist" type="text">
            <?php if ($favouriteArtistError): ?>
                <span class="error"><?php echo $favouriteArtistError; ?></span>
            <?php endif; ?>
        </div>

        <div>
            <label for="favouriteSong">What is your favourite song?</label>
            <input name="favouriteSong" id="favouriteSong" type="text">
            <?php if ($favouriteSongError): ?>
                <span class="error"><?php echo $favouriteSongError; ?></span>
            <?php endif; ?>
        </div>

        <div>
            <label for="favouriteAlbum">What is your favourite album?</label>
            <input name="favouriteAlbum" id="favouriteAlbum" type="text">
            <?php if ($favouriteAlbumError): ?>
                <span class="error"><?php echo $favouriteAlbumError; ?></span>
            <?php endif; ?>
        </div>

        <div>
            <label for="favouriteInstrument">What is your favourite instrument?</label>
            <input name="favouriteInstrument" id="favouriteInstrument" type="text">
            <?php if ($favouriteInstrumentError): ?>
                <span class="error"><?php echo $favouriteInstrumentError; ?></span>
            <?php endif; ?>
        </div>


        <!-- Multiple choice, multiple option questions -->

        <div>
            <p>Which music genres do you listen to?</p>

            <input type="checkbox" name="musicGenres[]" id="rock" value="rock">
            <label for="rock">Rock</label>

            <input type="checkbox" name="musicGenres[]" id="jazz" value="jazz">
            <label for="jazz">Jazz</label>

            <input type="checkbox" name="musicGenres[]" id="pop" value="pop">
            <label for="pop">Pop</label>

            <input type="checkbox" name="musicGenres[]" id="metal" value="metal">
            <label for="metal">Metal</label>

            <input type="checkbox" name="musicGenres[]" id="hipHop" value="hipHop">
            <label for="hipHop">Hip-Hop</label>

            <?php if ($musicGenresError): ?>
                <span class="error"><?php echo $musicGenresError; ?></span>
            <?php endif; ?>
        </div>

        <div>
            <p>Where do you usually listen to music?</p>

            <input type="checkbox" name="listeningPlaces[]" id="home" value="home">
            <label for="home">At home</label>

            <input type="checkbox" name="listeningPlaces[]" id="school" value="school">
            <label for="school">At school</label>

            <input type="checkbox" name="listeningPlaces[]" id="transport" value="transport">
            <label for="transport">On public transportation</label>

            <input type="checkbox" name="listeningPlaces[]" id="gym" value="gym">
            <label for="gym">At the gym</label>

            <?php if ($listeningPlacesError): ?>
                <span class="error"><?php echo $listeningPlacesError; ?></span>
            <?php endif; ?>
        </div>

        <div>
            <p>Which music platforms do you use?</p>

            <input type="checkbox" name="musicPlatforms[]" id="spotify" value="spotify">
            <label for="spotify">Spotify</label>

            <input type="checkbox" name="musicPlatforms[]" id="appleMusic" value="appleMusic">
            <label for="appleMusic">Apple Music</label>

            <input type="checkbox" name="musicPlatforms[]" id="youtubeMusic" value="youtubeMusic">
            <label for="youtubeMusic">YouTube Music</label>

            <input type="checkbox" name="musicPlatforms[]" id="soundcloud" value="soundcloud">
            <label for="soundcloud">SoundCloud</label>

            <?php if ($musicPlatformsError): ?>
                <span class="error"><?php echo $musicPlatformsError; ?></span>
            <?php endif; ?>
        </div>


        <!-- Multiple options, single choice questions -->

        <div>
            <p>How often do you listen to music?</p>

            <input type="radio" name="listeningFrequency" id="daily" value="daily">
            <label for="daily">Every day</label>

            <input type="radio" name="listeningFrequency" id="weekly" value="weekly">
            <label for="weekly">A few times a week</label>

            <input type="radio" name="listeningFrequency" id="rarely" value="rarely">
            <label for="rarely">Rarely</label>

            <?php if ($listeningFrequencyError): ?>
                <span class="error"><?php echo $listeningFrequencyError; ?></span>
            <?php endif; ?>
        </div>

        <div>
            <p>How do you prefer listening to music?</p>

            <input type="radio" name="listeningMethod" id="headphones" value="headphones">
            <label for="headphones">Headphones</label>

            <input type="radio" name="listeningMethod" id="speakers" value="speakers">
            <label for="speakers">Speakers</label>

            <input type="radio" name="listeningMethod" id="live" value="live">
            <label for="live">Live performances</label>

            <?php if ($listeningMethodError): ?>
                <span class="error"><?php echo $listeningMethodError; ?></span>
            <?php endif; ?>
        </div>

        <div>
            <p>What is your preferred music format?</p>

            <input type="radio" name="musicFormat" id="streaming" value="streaming">
            <label for="streaming">Streaming</label>

            <input type="radio" name="musicFormat" id="vinyl" value="vinyl">
            <label for="vinyl">Vinyl records</label>

            <input type="radio" name="musicFormat" id="cd" value="cd">
            <label for="cd">CDs</label>

            <input type="radio" name="musicFormat" id="digital" value="digital">
            <label for="digital">Downloaded music files</label>

            <?php if ($musicFormatError): ?>
                <span class="error"><?php echo $musicFormatError; ?></span>
            <?php endif; ?>
        </div>

        <div>
            <p>How do you usually discover new music?</p>

            <input type="radio" name="musicDiscovery" id="socialMedia" value="socialMedia">
            <label for="socialMedia">Social media</label>

            <input type="radio" name="musicDiscovery" id="friends" value="friends">
            <label for="friends">Friends and family</label>

            <input type="radio" name="musicDiscovery" id="recommendations" value="recommendations">
            <label for="recommendations">Streaming recommendations</label>

            <input type="radio" name="musicDiscovery" id="radio" value="radio">
            <label for="radio">Radio</label>

            <?php if ($musicDiscoveryError): ?>
                <span class="error"><?php echo $musicDiscoveryError; ?></span>
            <?php endif; ?>
        </div>


        <!-- Long answers using textarea inputs -->

        <div>
            <label for="concertExperience">Describe your favourite concert experience.</label>

            <textarea name="concertExperience" id="concertExperience" rows="5" cols="40"></textarea>

            <?php if ($concertExperienceError): ?>
                <span class="error"><?php echo $concertExperienceError; ?></span>
            <?php endif; ?>
        </div>

        <div>
            <label for="musicInfluence">How has music influenced your life?</label>

            <textarea name="musicInfluence" id="musicInfluence" rows="5" cols="40"></textarea>

            <?php if ($musicInfluenceError): ?>
                <span class="error"><?php echo $musicInfluenceError; ?></span>
            <?php endif; ?>
        </div>


        <!-- Special input types  -->

        <div>
            <label for="lastConcert">When did you last attend a concert?</label>
            <input type="date" name="lastConcert" id="lastConcert">
        </div>

        <div>
            <label for="musicColor">What colour do you associate with music?</label>
            <input type="color" name="musicColor" id="musicColor">
        </div>

        <div>
            <label for="artistWebsite">What is your favourite artist's website?</label>
            <input type="url" name="artistWebsite" id="artistWebsite" placeholder="https://example.com">
        </div>

        <button type="submit">Submit Survey</button>

    </form>
</section>

        </main>
</body>
</html>