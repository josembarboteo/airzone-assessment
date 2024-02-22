<?

namespace Airzone\Application\Posts;

use Airzone\Domain\Post\PostsRepository;

class GetCommnetsByPostId
{
    public function __construct(private PostsRepository $postsRepository){}
    
    public function do(int $postId)
    {
        $result = $this->postsRepository->findWithCommentsAndUsersById($postId)[0];
        $users = [];
        foreach ($result['comments'] as $comment){
            $users[] = $comment['writer'];
        }
        $result['users'] = $users;
        return $result;
    }
}
