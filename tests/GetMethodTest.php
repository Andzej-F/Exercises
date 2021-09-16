<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;


class GetMethodTest extends TestCase
{
    public function testExample()
    {
        require './src/GetMethod.php';
        global $avocado, $banana, $dragonfruit;
        $_GET['avocado'] = "Avocado is my favourite food";
        $_GET['banana'] = '2718281828459045';
        $_GET['dragonfruit'] = "<script>
// Some malicious Javascript code here!  Make sure to sanitize this using htmlspecialchars()
window.location = \"http://www.hacked.com/\"; // Redirects you to a website called \"hacked.com\" if you don't sanitize this properly ;)
</script>";
        user_script();
        $this->assertEquals("Avocado is my favourite food", $avocado);
        $this->assertEquals('2718281828459045', $banana);
        $this->assertEquals("&lt;script&gt;
// Some malicious Javascript code here!  Make sure to sanitize this using htmlspecialchars()
window.location = &quot;http://www.hacked.com/&quot;; // Redirects you to a website called &quot;hacked.com&quot; if you don't sanitize this properly ;)
&lt;/script&gt;", $dragonfruit, "Your script failed to neutralise a malicious script inserted by a hacker into your URL");
    }
}
