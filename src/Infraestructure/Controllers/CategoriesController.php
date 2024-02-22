<?

namespace Airzone\Infraestructure\Controllers;

use Airzone\Application\Categories\CreateCategory;
use Airzone\Application\Categories\DeleteCategory;
use Airzone\Application\Categories\GetAllCategories;
use Airzone\Application\Categories\UpdateCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function __construct(
        private GetAllCategories $getAllCategories,
        private CreateCategory $createCategory,
        private UpdateCategory $updateCategory,
        private DeleteCategory $deleteCategory,
    ){}

    public function list(): JsonResponse
    {
        return new JsonResponse($this->getAllCategories->do());
    }

    public function create(Request $request)
    {
        return new JsonResponse($this->createCategory->do(json_decode($request->getContent(), true)));
    }

    public function update(Request $request, $categoryId)
    {
        return new JsonResponse($this->updateCategory->do($categoryId, json_decode($request->getContent(), true)));
    }

    public function delete($categoryId): JsonResponse
    {
        return new JsonResponse($this->deleteCategory->do($categoryId));
    }
}
