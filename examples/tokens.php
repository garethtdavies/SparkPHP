<?php
use Wensleydale\SparkCore;
use Wensleydale\SparkTokenException;

/*
 * This example lists all Spark tokens, then creates a new token and deletes the token
 * Demonstrates all token methods and the handling of SparkTokenExceptions
 */

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

//Create a new Spark instance
$tokenInstance = SparkCore::token();

//Add our Spark.io information to list all tokens
$tokenInstance->setUsername('your_spark_username');
$tokenInstance->setPassword('your_spark_password');

//List all tokens
try {
    $listTokens = $tokenInstance->listTokens();
} catch (SparkTokenException $e) {
    echo 'There was an error in the token request';
}

foreach ($listTokens as $token) {
    $tokens[] = $token->token;
}

//Echo the first token we have if there is one
if (isset($tokens[0]))
{
    echo $tokens[0];
}

//Create a new token
try {
    $createToken = $tokenInstance->generateToken();

    //Our newly created token
    $newToken = $createToken->access_token;
    echo $newToken;
} catch (SparkTokenException $e) {
    echo "There was an error generating a token";
}

//Assuming that we created a token above, lets delete it
if (isset($newToken)) {
    try {
        $deleteToken = $tokenInstance->deleteToken($newToken);

        if ($deleteToken->ok) {
            echo 'We have deleted that token';
        }
    } catch (SparkTokenException $e) {
        echo 'There was an error deleting the token';
    }
}


