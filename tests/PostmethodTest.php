<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;


class PostMethodTest extends TestCase
{
    public function testWarmUp()
    {
        require './src/PostMethod.php';

        $this->assertTrue(isset($_POST["name"]), "You did not set the correct key/value pairs");
        $this->assertTrue(isset($_POST["email"]), "You did not set the correct key/value pairs");
        $this->assertTrue(isset($_POST["message"]), "You did not set the correct key/value pairs");
        $this->assertTrue($_POST["name"] === "Jane Anderson", "It seems like you've set the wrong value!");
        $this->assertTrue($_POST["email"] === "ja1234@example.tld", "It seems like you've set the wrong value!");
        $this->assertTrue($_POST["message"] === "Hello World!", "It seems like you've set the wrong value!");
    }

    public function testScriptDoesNothingIfNoFormSubmitted()
    {
        $_SERVER["REQUEST_METHOD"] = "GET"; // This means a form was NOT submitted
        // Generate some fake POST data to attempt to fool the script
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "17";
        $_POST["email"] = "donald@example.tld";
        $_POST["rating"] = "10";
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        // Execute the user script
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }

    public function testMissingName()
    {
        $this->expectOutputString("<span style=\"color: red\">Name field is required</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = ""; // The name field was left blank
        // Fill in the rest
        $_POST["age"] = "17";
        $_POST["email"] = "donald@example.tld";
        $_POST["rating"] = "10";
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        // Execute the user script
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }

    public function testEmptyAge()
    {
        $this->expectOutputString("<span style=\"color: red\">Invalid Age provided</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = ""; // No age provided
        $_POST["email"] = "donald@example.tld";
        $_POST["rating"] = "10";
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }

    public function testInvalidAge1()
    {
        $this->expectOutputString("<span style=\"color: red\">Invalid Age provided</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "abcde"; // Invalid Age
        $_POST["email"] = "donald@example.tld";
        $_POST["rating"] = "10";
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }

    public function testInvalidAge2()
    {
        $this->expectOutputString("<span style=\"color: red\">Invalid Age provided</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "123abd"; // Invalid Age
        $_POST["email"] = "donald@example.tld";
        $_POST["rating"] = "10";
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }

    public function testInvalidAge3()
    {
        $this->expectOutputString("<span style=\"color: red\">Invalid Age provided</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "<17>"; // Invalid Age
        $_POST["email"] = "donald@example.tld";
        $_POST["rating"] = "10";
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }

    public function testEmptyEmail()
    {
        $this->expectOutputString("<span style=\"color: red\">Email Address is Invalid</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "17";
        $_POST["email"] = ""; // Email Field left empty
        $_POST["rating"] = "10";
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }

    public function testInvalidEmail1()
    {
        $this->expectOutputString("<span style=\"color: red\">Email Address is Invalid</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "17";
        $_POST["email"] = "blah blah blah"; // Email Invalid
        $_POST["rating"] = "10";
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }

    public function testInvalidEmail2()
    {
        $this->expectOutputString("<span style=\"color: red\">Email Address is Invalid</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "17";
        $_POST["email"] = "donald@example . tld"; // Email Invalid
        $_POST["rating"] = "10";
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }
    public function testInvalidEmail3()
    {
        $this->expectOutputString("<span style=\"color: red\">Email Address is Invalid</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "17";
        $_POST["email"] = "donald@@example.tld"; // Email Invalid
        $_POST["rating"] = "10";
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }

    public function testEmptyRating()
    {
        $this->expectOutputString("<span style=\"color: red\">Rating is invalid, please provide a number from 1 to 10</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "17";
        $_POST["email"] = "donald@example.tld";
        $_POST["rating"] = ""; // Rating field was left empty
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }

    public function testInvalidRating1()
    {
        $this->expectOutputString("<span style=\"color: red\">Rating is invalid, please provide a number from 1 to 10</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "17";
        $_POST["email"] = "donald@example.tld";
        $_POST["rating"] = "a1b2c3"; // Rating Invalid
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }
    public function testInvalidRating2()
    {
        $this->expectOutputString("<span style=\"color: red\">Rating is invalid, please provide a number from 1 to 10</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "17";
        $_POST["email"] = "donald@example.tld";
        $_POST["rating"] = "121"; // Rating Invalid
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }
    public function testInvalidRating3()
    {
        $this->expectOutputString("<span style=\"color: red\">Rating is invalid, please provide a number from 1 to 10</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "17";
        $_POST["email"] = "donald@example.tld";
        $_POST["rating"] = "11"; // Rating Invalid
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }
    public function testInvalidRating4()
    {
        $this->expectOutputString("<span style=\"color: red\">Rating is invalid, please provide a number from 1 to 10</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "17";
        $_POST["email"] = "donald@example.tld";
        $_POST["rating"] = "0"; // Rating Invalid
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }
    public function testInvalidRating5()
    {
        $this->expectOutputString("<span style=\"color: red\">Rating is invalid, please provide a number from 1 to 10</span>");
        $_SERVER["REQUEST_METHOD"] = "POST"; // A form was indeed submitted
        $_POST["name"] = "Donald Leung";
        $_POST["age"] = "17";
        $_POST["email"] = "donald@example.tld";
        $_POST["rating"] = "-5"; // Rating Invalid
        $_POST["compliments"] = "The instructions were clear and concise";
        $_POST["criticism"] = "None - I loved this Kata Series";
        user_script();
        // Check that no global variables were set
        $this->assertFalse(isset($name), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($age), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($email), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($rating), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($compliments), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
        $this->assertFalse(isset($criticism), "Gotcha!  Hint: Try to access the correct key/value pair in the \$_SERVER superglobal");
    }
}
