<?php

namespace AirzoneUnitTests\Application\Categories;

use Airzone\Application\Categories\GetAllCategories;
use Airzone\Domain\Category\Category;
use PHPUnit\Framework\TestCase;
use Airzone\Domain\Category\CategoryRepository;

class GetAllCategoriesTest extends TestCase
{
    private $categoryRepositoryMock;

    public function setUp(): void
    {
        $this->categoryRepositoryMock = $this->getMockBuilder(CategoryRepository::class)->disableOriginalConstructor()->getMock();
    }

    public function testHappyPath()
    {
        $category = Category::factory()->makeOne();

        $this->categoryRepositoryMock->method('findAll')->willReturn([$category]);

        $service = new GetAllCategories($this->categoryRepositoryMock);

        $result = $service->do();

        $this->assertSame($category, $result[0]);
    }
}