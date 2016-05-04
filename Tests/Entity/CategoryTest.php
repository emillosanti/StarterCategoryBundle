<?php

namespace Starter\CategoryBundle\Tests\Entity;

class CategoryTest extends \PHPUnit_Framework_TestCase
{
    public function testEntity()
    {
        $categoryClass = '\\Starter\\CategoryBundle\\Entity\\Category';
        $this->assertTrue(class_exists($categoryClass), 'Class "' . $categoryClass . '" does not exist.');
    }

    public function testCategoryEntity()
    {
        $category = $this->getCategoryEntity();

        //check expected methods exist
        $this->assertTrue(method_exists($category, 'getId'),
            'category entity has no getId method'
        );

        $this->assertTrue(method_exists($category, 'setName'),
            'category entity has no setName method'
        );

        $this->assertTrue(method_exists($category, 'getName'),
            'category entity has no getName method'
        );

        $this->assertTrue(method_exists($category, 'setDescription'),
            'category entity has no setDescription method'
        );

        $this->assertTrue(method_exists($category, 'getDescription'),
            'category entity has no getDescription method'
        );

         //check methods work as expected
         $name = 'This is a category name.';

         $category->setName($name);
         $this->assertEquals($name, $category->getName(),
             'category description set through setName is not the same as name retrieved through getName'
         );

         $description = 'This is a category description.';

         $category->setDescription($description);
         $this->assertEquals($description, $category->getDescription(),
             'category description set through setDescription is not the same as description retrieved through getDescription'
         );
     }

     public function getCategoryEntity()
     {
         return new \Starter\CategoryBundle\Entity\Category();
     }
}
