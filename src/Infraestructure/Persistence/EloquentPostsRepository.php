<?

namespace Airzone\Infraestructure\Persistence;

use Airzone\Domain\Post\PostsRepository;
use Airzone\Domain\Post\Post;

class EloquentPostsRepository implements PostsRepository
{
    public function findById(int $postId): Post
    {
        return Post::findOrFail($postId);
    }

    public function findWithCommentsAndUsersById(int $postId)
    {
        return Post::with(['owner', 'comments', 'comments.writer'])->where('id', '=', $postId)->get()->toArray();
    }
}