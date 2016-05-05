<?php

namespace Starter\CategoryBundle\Tests\Entity;

use Symfony\Component\Validator\Validation;

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

    public function testCategoryConstraints()
    {
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        $category1 = $this->getCategoryEntity();
        $errors1 = $validator->validate($category1);

        $this->assertEquals(2, count($errors1),
            'empty category should have 2 errors'
        );

        $category1->setName('category name');
        $category1->setDescription('category description');
        $errors2 = $validator->validate($category1);

        $this->assertEquals(0, count($errors2),
            'category with name and description should be valid'
        );

        $category2 = $this->getCategoryEntity();
        $category2->setName('category name');
        $errors3 = $validator->validate($category2);

        $this->assertGreaterThanOrEqual(0, count($errors3),
            'category with name only should not be valid'
        );

        $category3 = $this->getCategoryEntity();
        $category3->setDescription('category description');
        $errors4 = $validator->validate($category3);

        $this->assertGreaterThanOrEqual(0, count($errors4),
            'category with description only should not be valid'
        );
    }

    public function getCategoryEntity()
    {
        return new \Starter\CategoryBundle\Entity\Category();
    }
}
