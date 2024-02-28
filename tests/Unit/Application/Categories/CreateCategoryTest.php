<?php

namespace AirzoneUnitTests\Application\Categories;

use Airzone\Domain\Category\Category;
use PHPUnit\Framework\TestCase;
use Airzone\Application\Categories\CreateCategory;
use Airzone\Domain\Category\CategoryRepository;

class CreateCategoryTest extends TestCase
{
    protected $categoryRepositoryMock;

    public function setUp(): void
    {
        $this->categoryRepositoryMock = $this->getMockBuilder(CategoryRepository::class)->disableOriginalConstructor()->getMock();
    }

    public function testHappyPath(): void
    {
        $testData = [
            'name' => 'test',
            'slug' => 'test',
        ];

        $this->categoryRepositoryMock->method('persist')->willReturn(Category::factory()->makeOne($testData));

        $createCategory = new CreateCategory($this->categoryRepositoryMock);

        $result = $createCategory->do($testData);

        $this->assertEquals($testData['name'], $result->toArray()['name']);
        $this->assertEquals($testData['slug'], $result->toArray()['slug']);
    }

    public function testErrorWhenNoNameProvided(): void
    {
        $testData = [
            'slug' => 'test',
        ];

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Name is missing on the data provided');

        $this->categoryRepositoryMock->method('persist')->willReturn(Category::factory()->makeOne($testData));

        $createCategory = new CreateCategory($this->categoryRepositoryMock);

        $result = $createCategory->do($testData);
    }

    public function testErrorWhenNoSlugProvided(): void
    {
        $testData = [
            'name' => 'test',
        ];

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Slug is missing on the data provided');

        $this->categoryRepositoryMock->method('persist')->willReturn(Category::factory()->makeOne($testData));

        $createCategory = new CreateCategory($this->categoryRepositoryMock);

        $result = $createCategory->do($testData);
    }
}
