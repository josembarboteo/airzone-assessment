<?php

namespace AirzoneUnitTests\Application\Categories;

use Airzone\Application\Categories\UpdateCategory;
use Airzone\Domain\Category\Category;
use PHPUnit\Framework\TestCase;
use Airzone\Domain\Category\CategoryRepository;

class UpdateCategoryTest extends TestCase
{
    protected $categoryRepositoryMock;

    public function setUp(): void
    {
        $this->categoryRepositoryMock = $this->getMockBuilder(CategoryRepository::class)->disableOriginalConstructor()->getMock();
    }

    public function testHappyPath(): void
    {
        $categoryId = random_int(0,10);
        $testData = [
            'id' => $categoryId,
            'name' => 'test',
            'slug' => 'test',
        ];

        $this->categoryRepositoryMock->method('update')->willReturn(Category::factory()->makeOne($testData));

        $service = new UpdateCategory($this->categoryRepositoryMock);

        $result = $service->do($categoryId, $testData);

        $this->assertEquals($testData['id'], $result->toArray()['id']);
        $this->assertEquals($testData['name'], $result->toArray()['name']);
        $this->assertEquals($testData['slug'], $result->toArray()['slug']);
    }

    public function testErrorWhenNoNameProvided(): void
    {
        $categoryId = random_int(0,10);
        $testData = [
            'name' => '',
            'slug' => 'test',
        ];

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Name is missing on the data provided');

        $this->categoryRepositoryMock->method('update')->willReturn(Category::factory()->makeOne($testData));

        $service = new UpdateCategory($this->categoryRepositoryMock);

        $result = $service->do($categoryId, $testData);
    }

    public function testErrorWhenNoSlugProvided(): void
    {
        $categoryId = random_int(0,10);
        $testData = [
            'name' => 'test',
            'slug' => '',
        ];

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Slug is missing on the data provided');

        $this->categoryRepositoryMock->method('update')->willReturn(Category::factory()->makeOne($testData));

        $service = new UpdateCategory($this->categoryRepositoryMock);

        $result = $service->do($categoryId, $testData);
    }
}
