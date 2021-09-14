<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class Person6Test extends TestCase
{
    public function testForPersonClass()
    {
        $this->assertTrue(class_exists('Person6'));
    }

    public function testPropertiesAndConstructor()
    {
        $this->assertTrue(property_exists('Person6', 'name'));
        $this->assertTrue(property_exists('Person6', 'age'));
        $this->assertTrue(property_exists('Person6', 'occupation'));
        $this->assertTrue(method_exists('Person6', '__construct'));
    }

    public function testThatAllPropertyVisibilitiesAreProtected()
    {
        $this->assertTrue((new ReflectionProperty('Person6', 'name'))->isProtected());
        $this->assertTrue((new ReflectionProperty('Person6', 'age'))->isProtected());
        $this->assertTrue((new ReflectionProperty('Person6', 'occupation'))->isProtected());
    }

    public function testInvalidName1()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Name must be a string!");
        new Person6(3, 18, "Web Developer");
    }

    public function testInvalidName2()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Name must be a string!");
        new Person6(true, 18, "Web Developer");
    }

    public function testInvalidName3()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Name must be a string!");
        new Person6(M_PI, 18, "Web Developer");
    }

    public function testInvalidName4()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Name must be a string!");
        new Person6([1, 2, 3], 18, "Web Developer");
    }

    public function testInvalidName5()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Name must be a string!");
        new Person6(false, 18, "Web Developer");
    }

    public function testInvalidAge1()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Age must be a non-negative integer!");
        new Person6('Rita Carr', -1, "Web Developer");
    }

    public function testInvalidAge2()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Age must be a non-negative integer!");
        new Person6('Rita Carr', 17.53, "Web Developer");
    }

    public function testInvalidAge3()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Age must be a non-negative integer!");
        new Person6('Rita Carr', -17.53, "Web Developer");
    }

    public function testInvalidAge4()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Age must be a non-negative integer!");
        new Person6('Rita Carr', false, "Web Developer");
    }

    public function testInvalidAge5()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Age must be a non-negative integer!");
        new Person6('Rita Carr', "age", "Web Developer");
    }

    public function testInvalidOccupation1()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Occupation must be a string!");
        new Person6('Rita Carr', 17, 17);
    }

    public function testInvalidOccupation2()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Occupation must be a string!");
        new Person6('Rita Carr', 17, M_E);
    }

    public function testInvalidOccupation3()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Occupation must be a string!");
        new Person6('Rita Carr', 17, true);
    }

    public function testInvalidOccupation4()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Occupation must be a string!");
        new Person6('Rita Carr', 17, false);
    }

    public function testInvalidOccupation5()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Occupation must be a string!");
        new Person6('Rita Carr', 17, ["First Program" => "Hello World"]);
    }

    protected function randomToken()
    {
        $result = "";
        for ($i = 0; $i < 20; $i++) {
            $result .= "abcdefghijklmnopqrstuvwxyz0123456789"[rand(0, 35)];
        }

        return $result;
    }

    public function testGetters()
    {
        // Fixed Assertions
        $donald = new Person6("Donald", 17, "student");
        $this->assertEquals('Donald', $donald->get_name());
        $this->assertEquals(17, $donald->get_age());
        $this->assertEquals('student', $donald->get_occupation());

        $chris = new Person6("Chris", 25, "Computer Programmer");
        $this->assertEquals('Chris', $chris->get_name());
        $this->assertEquals(25, $chris->get_age());
        $this->assertEquals('Computer Programmer', $chris->get_occupation());

        $alexandra = new Person6("Alexandra", 20, "Web Developer");
        $this->assertEquals('Alexandra', $alexandra->get_name());
        $this->assertEquals(20, $alexandra->get_age());
        $this->assertEquals('Web Developer', $alexandra->get_occupation());

        //Random Assertions
        for ($i = 0; $i < 100; $i++) {
            $name = $this->randomToken();
            $age = rand(0, 100);
            $occupation = $this->randomToken();
            $person = new Person6($name, $age, $occupation);

            $this->assertEquals($name, $person->get_name());
            $this->assertEquals($age, $person->get_age());
            $this->assertEquals($occupation, $person->get_occupation());
        }
    }

    public function testSettersWithValidInput()
    {
        $person = new Person6("Antonio McDyess", 17, "Computer Programmer");
        $this->assertEquals("Antonio McDyess", $person->get_name());
        $this->assertEquals(17, $person->get_age());
        $this->assertEquals("Computer Programmer", $person->get_occupation());

        // Fixed Assertions
        $person->set_name("Lincoln");
        $person->set_age(16);
        $person->set_occupation("Politician");
        $this->assertEquals("Lincoln", $person->get_name());
        $this->assertEquals(16, $person->get_age());
        $this->assertEquals("Politician", $person->get_occupation());

        $person->set_name("Ella");
        $person->set_age(18);
        $person->set_occupation("Doctor");
        $this->assertEquals("Ella", $person->get_name());
        $this->assertEquals(18, $person->get_age());
        $this->assertEquals("Doctor", $person->get_occupation());

        $person->set_name("Jon");
        $person->set_age(25);
        $person->set_occupation("Lawyer");
        $this->assertEquals("Jon", $person->get_name());
        $this->assertEquals(25, $person->get_age());
        $this->assertEquals("Lawyer", $person->get_occupation());

        // Random Assertions
        for ($i = 0; $i < 100; $i++) {
            $person->set_name($name = $this->randomToken());
            $person->set_age($age = rand(0, 100));
            $person->set_occupation($occupation = $this->randomToken());
            $this->assertEquals($name, $person->get_name());
            $this->assertEquals($age, $person->get_age());
            $this->assertEquals($occupation, $person->get_occupation());
        }
    }

    public function testSetterWithInvalidName1()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Name must be a string!');
        $person = new Person6('Donal Leung', 17, "Computer Programmer");
        $person->set_name(34);
    }

    public function testSetterWithInvalidName2()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Name must be a string!');
        $person = new Person6('Donal Leung', 17, "Computer Programmer");
        $person->set_name(-373);
    }

    public function testSetterWithInvalidName3()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Name must be a string!');
        $person = new Person6('Donal Leung', 17, "Computer Programmer");
        $person->set_name(-M_PI);
    }

    public function testSetterWithInvalidName4()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Name must be a string!');
        $person = new Person6('Donal Leung', 17, "Computer Programmer");
        $person->set_name(true);
    }

    public function testSetterWithInvalidName5()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Name must be a string!');
        $person = new Person6('Donal Leung', 17, "Computer Programmer");
        $person->set_name(NULL);
    }

    public function testSetterWithInvalidAge1()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Age must be a non-negative integer!');
        $person = new Person6("Donald Leung", 17, "Computer Programmer");
        $person->set_age(17.5);
    }

    public function testSetterWithInvalidAge2()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Age must be a non-negative integer!');
        $person = new Person6("Donald Leung", 17, "Computer Programmer");
        $person->set_age(-35);
    }

    public function testSetterWithInvalidAge3()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Age must be a non-negative integer!');
        $person = new Person6("Donald Leung", 17, "Computer Programmer");
        $person->set_age(TRUE);
    }

    public function testSetterWithInvalidAge4()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Age must be a non-negative integer!');
        $person = new Person6("Donald Leung", 17, "Computer Programmer");
        $person->set_age("Goodbye World");
    }

    public function testSetterWithInvalidAge5()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Age must be a non-negative integer!');
        $person = new Person6("Donald Leung", 17, "Computer Programmer");
        $person->set_age(["First Program" => "Hello World"]);
    }

    public function testSetterWithInvalidOccupation1()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Occupation must be a string!');
        $person = new Person6("Donald Leung", 17, "Computer Programmer");
        $person->set_occupation(7);
    }

    public function testSetterWithInvalidOccupation2()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Occupation must be a string!');
        $person = new Person6("Donald Leung", 17, "Computer Programmer");
        $person->set_occupation(0);
    }

    public function testSetterWithInvalidOccupation3()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Occupation must be a string!');
        $person = new Person6("Donald Leung", 17, "Computer Programmer");
        $person->set_occupation(
            (object)[1, 2, 3, 4, 5, "Last Program" => "Goodbye World"]
        );
    }

    public function testSetterWithInvalidOccupation4()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Occupation must be a string!');
        $person = new Person6("Donald Leung", 17, "Computer Programmer");
        $person->set_occupation(FALSE);
    }

    public function testSetterWithInvalidOccupation5()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Occupation must be a string!');
        $person = new Person6("Donald Leung", 17, "Computer Programmer");
        $person->set_occupation(TRUE);
    }
}
