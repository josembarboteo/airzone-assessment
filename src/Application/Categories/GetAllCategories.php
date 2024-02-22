<?

namespace Airzone\Application\Categories;
use Airzone\Domain\Category\CategoryRepository;

class GetAllCategories
{
    public function __construct(private CategoryRepository $categoryRepository){}
    
    public function do()
    {
        return $this->categoryRepository->findAll();
    }
}
