<?php

namespace AirzoneUnitTests\Application\Categories;

use Airzone\Application\Categories\DeleteCategory;
use PHPUnit\Framework\TestCase;
use Airzone\Domain\Category\CategoryRepository;

class DeleteCategoryTest extends TestCase
{
    private $categoryRepositoryMock;

    public function setUp(): void
    {
        $this->categoryRepositoryMock = $this->getMockBuilder(CategoryRepository::class)->disableOriginalConstructor()->getMock();
    }

    public function testHappyPath()
    {
        $categortyId = random_int(0,10);

        $this->categoryRepositoryMock->method('delete')->willReturn($categortyId);

        $service = new DeleteCategory($this->categoryRepositoryMock);

        $result = $service->do($categortyId);

        $this->assertEquals($categortyId, $result);
    }
}
