<?php

class VisibilityTest extends TestCase
{
    public function testForPersonClass()
    {
        $this->assertTrue(class_exists('Person'));
    }
    public function testPropertiesAndConstructor()
    {
        $this->assertTrue(property_exists('Person', 'name'));
        $this->assertTrue(property_exists('Person', 'age'));
        $this->assertTrue(property_exists('Person', 'occupation'));
        $this->assertTrue(method_exists('Person', '__construct'));
    }
    public function testThatAllPropertyVisibilitiesAreProtected()
    {
        $this->assertTrue((new ReflectionProperty('Person', 'name'))->isProtected());
        $this->assertTrue((new ReflectionProperty('Person', 'age'))->isProtected());
        $this->assertTrue((new ReflectionProperty('Person', 'occupation'))->isProtected());
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Name must be a string!
     */
    public function testInvalidName1()
    {
        new Person(3, 18, "Web Developer");
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Name must be a string!
     */
    public function testInvalidName2()
    {
        new Person(true, 18, "Web Developer");
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Name must be a string!
     */
    public function testInvalidName3()
    {
        new Person(M_PI, 18, "Web Developer");
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Name must be a string!
     */
    public function testInvalidName4()
    {
        new Person(array(1, 2, 3), 18, "Web Developer");
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Name must be a string!
     */
    public function testInvalidName5()
    {
        new Person(false, 18, "Web Developer");
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Age must be a non-negative integer!
     */
    public function testInvalidAge1()
    {
        new Person("Donald Leung", -1, "Web Developer");
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Age must be a non-negative integer!
     */
    public function testInvalidAge2()
    {
        new Person("Donald Leung", 17.53, "Web Developer");
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Age must be a non-negative integer!
     */
    public function testInvalidAge3()
    {
        new Person("Donald Leung", -17.53, "Web Developer");
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Age must be a non-negative integer!
     */
    public function testInvalidAge4()
    {
        new Person("Donald Leung", false, "Web Developer");
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Age must be a non-negative integer!
     */
    public function testInvalidAge5()
    {
        new Person("Donald Leung", "age", "Web Developer");
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Occupation must be a string!
     */
    public function testInvalidOccupation1()
    {
        new Person("Donald Leung", 17, 17);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Occupation must be a string!
     */
    public function testInvalidOccupation2()
    {
        new Person("Donald Leung", 17, M_E);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Occupation must be a string!
     */
    public function testInvalidOccupation3()
    {
        new Person("Donald Leung", 17, true);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Occupation must be a string!
     */
    public function testInvalidOccupation4()
    {
        new Person("Donald Leung", 17, false);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Occupation must be a string!
     */
    public function testInvalidOccupation5()
    {
        new Person("Donald Leung", 17, array("First Program" => "Hello World"));
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
        $donald = new Person("Donald", 17, "student");
        $this->assertEquals('Donald', $donald->get_name());
        $this->assertEquals(17, $donald->get_age());
        $this->assertEquals('student', $donald->get_occupation());
        $chris = new Person("Chris", 25, "Computer Programmer");
        $this->assertEquals("Chris", $chris->get_name());
        $this->assertEquals(25, $chris->get_age());
        $this->assertEquals("Computer Programmer", $chris->get_occupation());
        $alexandra = new Person("Alexandra", 20, "Web Developer");
        $this->assertEquals("Alexandra", $alexandra->get_name());
        $this->assertEquals(20, $alexandra->get_age());
        $this->assertEquals("Web Developer", $alexandra->get_occupation());
        // Random Assertions
        for ($i = 0; $i < 100; $i++) {
            $person = new Person($name = $this->randomToken(), $age = rand(0, 100), $occupation = $this->randomToken());
            $this->assertEquals($name, $person->get_name());
            $this->assertEquals($age, $person->get_age());
            $this->assertEquals($occupation, $person->get_occupation());
        }
    }
    public function testSettersWithValidInput()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $this->assertEquals("Donald Leung", $person->get_name());
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

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Name must be a string!
     */
    public function testSetterWithInvalidName1()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_name(34);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Name must be a string!
     */
    public function testSetterWithInvalidName2()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_name(-373);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Name must be a string!
     */
    public function testSetterWithInvalidName3()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_name(-M_PI);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Name must be a string!
     */
    public function testSetterWithInvalidName4()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_name(true);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Name must be a string!
     */
    public function testSetterWithInvalidName5()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_name(NULL);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Age must be a non-negative integer!
     */
    public function testSetterWithInvalidAge1()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_age(17.5);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Age must be a non-negative integer!
     */
    public function testSetterWithInvalidAge2()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_age(-35);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Age must be a non-negative integer!
     */
    public function testSetterWithInvalidAge3()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_age(true);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Age must be a non-negative integer!
     */
    public function testSetterWithInvalidAge4()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_age("Goodbye World");
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Age must be a non-negative integer!
     */
    public function testSetterWithInvalidAge5()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_age(array("First Program" => "Hello World"));
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Occupation must be a string!
     */
    public function testSetterWithInvalidOccupation1()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_occupation(7);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Occupation must be a string!
     */
    public function testSetterWithInvalidOccupation2()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_occupation(0);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Occupation must be a string!
     */
    public function testSetterWithInvalidOccupation3()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_occupation((object)(array(1, 2, 3, 4, 5, "Last Program" => "Goodbye World")));
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Occupation must be a string!
     */
    public function testSetterWithInvalidOccupation4()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_occupation(false);
    }

    /**
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Occupation must be a string!
     */
    public function testSetterWithInvalidOccupation5()
    {
        $person = new Person("Donald Leung", 17, "Computer Programmer");
        $person->set_occupation(true);
    }
}
