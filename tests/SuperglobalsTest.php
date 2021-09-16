<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class SuperGlobalsTest extends TestCase
{
    public function testDoubleGlobalNum()
    {
        require './src/Superglobals.php';
        $GLOBALS['num'] = 3;
        double_global_num();
        $this->assertEquals(6, $GLOBALS['num']);

        $GLOBALS['num'] = 17;
        double_global_num();
        double_global_num();
        $this->assertEquals(68, $GLOBALS['num']);

        $GLOBALS['num'] = 31;
        for ($i = 0; $i < 10; $i++) double_global_num();
        $this->assertEquals(31744, $GLOBALS['num']);
    }

    public function testSetQuery()
    {
        set_query("Google");
        $this->assertEquals("Google", $_GET['query']);

        set_query("Superglobals site:w3schools.com");
        $this->assertEquals("Superglobals site:w3schools.com", $_GET['query']);
    }

    public function testSetEmail()
    {
        set_email("james@nowhere.com");
        $this->assertEquals("james@nowhere.com", $_POST['email']);
    }
}
