<?

namespace Airzone\Application\Categories;
use Airzone\Domain\Category\CategoryRepository;

class UpdateCategory
{
    public function __construct(private CategoryRepository $categoryRepository){}
    
    public function do(int $categoryId, array $data)
    {
        if(array_key_exists('name', $data) && empty($data['name']))
            throw new \Exception('Name is missing on the data provided');
        if(array_key_exists('slug', $data) && empty($data['slug']))
            throw new \Exception('Slug is missing on the data provided');

        return $this->categoryRepository->update($categoryId, $data);
    }
}
