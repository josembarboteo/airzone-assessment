<?

namespace Airzone\Application\Categories;
use Airzone\Domain\Category\CategoryRepository;

class CreateCategory
{
    public function __construct(private CategoryRepository $categoryRepository){}
    
    public function do(array $data)
    {
        if(empty($data['name']))
            throw new \Exception('Name is missing on the data provided');
        if(empty($data['slug']))
            throw new \Exception('Slug is missing on the data provided');

        return $this->categoryRepository->persist($data);
    }
}
