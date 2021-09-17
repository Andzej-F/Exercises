<?php
/*
Inside the user_script() function, write a PHP script that 
does the following:

V 1. Make sure that the visitor landed on this PHP script by a 
form submission - if that is not the case, do NOT attempt to 
do anything! This should be achieved by using a suitable 
conditional statement as shown in the lesson.

V 2. Using a suitable built-in PHP function or otherwise, check 
that the visitor actually entered something in the "name" 
field of the feedback form. If the visitor left that input 
field blank, echo the following string as shown: 
"<span style=\"color: red\">Name field is required</span>"

V 3. Now check if the visitor provided a valid age. For the purposes 
of this Kata, there is no limit to the magnitude of a person's 
age, nor do you need to check whether the input age is positive 
or negative; however, you must ensure that the input age is 
numeric using a built-in PHP function or otherwise. If the 
input age is not numeric, echo the following message: 
"<span style=\"color: red\">Invalid Age provided</span>"

v 4. Make sure the visitor provided a valid email address, using 
built-in PHP functions and filters or otherwise. If the email 
provided is invalid or empty echo the string: 
"<span style=\"color: red\">Email Address is Invalid</span>"

v 5. Make sure the rating that the user provided is an integer in 
the range 1 to 10 (both inclusive). However, note that POST 
data is always in the form of a string, so keep that in mind 
when validating the rating. If the rating is invalid, output 
the string "<span style=\"color: red\">Rating is invalid, 
please provide a number from 1 to 10</span>"

6. It has been decided that the last two fields of the feedback 
form are optional so you do not need to ensure that they are 
not empty. Now that you have thoroughly validated the form 
input, it is time to properly sanitize the form input. First 
save each piece of form data into a global variable with the 
exact same name as the name attributes of each input field 
(including the <textarea>s). For example, if there is a 
<textarea> or <input> with name="example", the value of that
form data should be stored into a global variable called 
$example. Then pass each global variable into the sanitation 
functions trim(), stripslashes() and htmlspecialchars() 
respectively and assign the sanitized value back into each 
global variable.

You may now do whatever you like with the form input! You 
may choose to print it back out to the visitor, use it to 
send an email, save it in a database, etc. Note that this 
will not be tested for the purposes of this Kata.
*/
$_POST["name"] = "Jane Anderson";
$_POST["email"] = "ja1234@example.tld";
$_POST["message"] = "Hello World!";

function user_script()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST["name"])) {
            echo "<span style=\"color: red\">Name field is required</span>";
            return;
        }

        if (empty($_POST["age"])) {
            echo "<span style=\"color: red\">Invalid Age provided</span>";
            return;
        }

        if (!is_numeric($_POST["age"])) {
            echo "<span style=\"color: red\">Invalid Age provided</span>";
            return;
        }

        if (!is_numeric($_POST["age"])) {
            echo "<span style=\"color: red\">Invalid Age provided</span>";
            return;
        }

        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            echo "<span style=\"color: red\">Email Address is Invalid</span>";
            return;
        }

        if (
            empty($_POST["rating"]) ||
            !is_numeric($_POST["rating"]) ||
            (intval($_POST["rating"]) != ($_POST["rating"])) ||
            (!((intval($_POST["rating"]) >= 1) && (intval($_POST["rating"]) <= 10)))
        ) {
            echo "<span style=\"color: red\">Rating is invalid, please provide a number from 1 to 10</span>";
            return;
        } else {
            global $name, $age, $email, $rating, $message, $compliments, $criticism;
            $name = $_POST["name"];
            $age = $_POST["age"];
            $email = $_POST["email"];
            $rating = $_POST["rating"];
            $message = $_POST["message"];
            $compliments = $_POST["compliments"];
            $criticism = $_POST["criticism"];

            $name = trim($name);
            $name = stripslashes($name);
            $name = htmlspecialchars($name);

            $age = trim($age);
            $age = stripslashes($age);
            $age = htmlspecialchars($age);

            $email = trim($email);
            $email = stripslashes($email);
            $email = htmlspecialchars($email);

            $rating = trim($rating);
            $rating = stripslashes($rating);
            $rating = htmlspecialchars($rating);

            $message = trim($message);
            $message = stripslashes($message);
            $message = htmlspecialchars($message);

            $compliments = trim($compliments);
            $compliments = stripslashes($compliments);
            $compliments = htmlspecialchars($compliments);

            $criticism = trim($criticism);
            $criticism = stripslashes($criticism);
            $criticism = htmlspecialchars($criticism);
        }
    }
}
/*
                Other solution

$_POST['name'] = 'Jane Anderson';
$_POST['email'] = 'ja1234@example.tld';
$_POST['message'] = 'Hello World!';

function user_script() {
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["name"])) {
      echo "<span style=\"color: red\">Name field is required</span>";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      echo "<span style=\"color: red\">Email Address is Invalid</span>";
    } elseif(!ctype_digit($_POST['age'])) {
      echo "<span style=\"color: red\">Invalid Age provided</span>";
    } elseif($_POST['rating'] < 1 || $_POST['rating'] > 10 ) {
      echo "<span style=\"color: red\">Rating is invalid, please provide a number from 1 to 10</span>";
    } else {
      foreach($_POST as $k => $v) {
        $GLOBALS[$k] = htmlspecialchars(stripslashes(trim($v)));
      }
    }
  }
}
*/

/*

<h2>Get Notifications on PHPWars<sup>TM</sup></h2>
<form action=" //htmlspecialchars($_SERVER[" PHP_SELF"]); " method=" POST">
    <p>
        <input type="text" name="name" placeholder="Your Name">
    </p>
    <p>
        <input type="text" name="age" placeholder="Your Age">
    </p>
    <p>
        <input type="email" name="email" placeholder="Your Email Address">
    </p>
    <p>
        <input type="text" name="rating" placeholder="Rate out of 10">
    </p>
    <p>
        What do you like about this Kata Series?
    </p>
    <p>
        <textarea name="compliments"></textarea>
    </p>
    <p>
        What could be improved about this Kata Series?
    </p>
    <p>
        <textarea name="criticism"></textarea>
    </p>
    <p>
        <input type="submit">
    </p>
</form> 
*/