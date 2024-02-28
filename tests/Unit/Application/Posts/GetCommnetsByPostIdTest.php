<?php

namespace AirzoneUnitTests\Application\Categories;

use Airzone\Application\Posts\GetCommnetsByPostId;
use Airzone\Domain\Comment\Comment;
use Airzone\Domain\Post\Post;
use Airzone\Domain\Post\PostsRepository;
use Airzone\Domain\User\User;
use PHPUnit\Framework\TestCase;

class GetCommnetsByPostIdTest extends TestCase
{
    private $postsRepositoryMock;

    public function setUp(): void
    {
        $this->postsRepositoryMock = $this->getMockBuilder(PostsRepository::class)->disableOriginalConstructor()->getMock();
    }

    public function testHappyPath()
    {
        $this->markTestSkipped('must be revisited.');

        $postId = random_int(0,10);
        $post = Post::factory()->hasAttached(Comment::factory()->hasAttached(User::factory()))->makeOne(['id' => $postId]);

        $this->postsRepositoryMock->method('findWithCommentsAndUsersById')->willReturn($post);

        $service = new GetCommnetsByPostId($this->postsRepositoryMock);

        $result = $service->do($postId);

        var_dump($result);
    }
}