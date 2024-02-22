<?

namespace Airzone\Application\Categories;
use Airzone\Domain\Category\CategoryRepository;

class DeleteCategory
{
    public function __construct(private CategoryRepository $categoryRepository){}
    
    public function do(int $categoryId)
    {
        return $this->categoryRepository->delete($categoryId);
    }
}
