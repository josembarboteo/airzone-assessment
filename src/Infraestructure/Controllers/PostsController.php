<?

namespace Airzone\Infraestructure\Controllers;

use Airzone\Application\Posts\GetCommnetsByPostId;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;


class PostsController extends Controller
{
    public function __construct(
        private GetCommnetsByPostId $getCommnetsByPostId,
    ){}
    
    public function getWithAllData(int $postId): JsonResponse
    {
        return new JsonResponse($this->getCommnetsByPostId->do($postId));
    }
}
