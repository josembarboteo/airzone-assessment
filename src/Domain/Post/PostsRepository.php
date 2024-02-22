<?

namespace Airzone\Domain\Post;

interface PostsRepository
{
    public function findById(int $postId): Post;
    public function findWithCommentsAndUsersById(int $postId);
}
