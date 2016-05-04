<?php

namespace Starter\CategoryBundle\Tests\Entity;

class CategoryTest extends \PHPUnit_Framework_TestCase
{
    public function testEntity()
    {
        $categoryClass = '\\Starter\\CategoryBundle\\Entity\\Category';
        $this->assertTrue(class_exists($categoryClass), 'Class "' . $categoryClass . '" does not exist.');
    }
}
