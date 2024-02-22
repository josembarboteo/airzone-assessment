<?

namespace Airzone\Infraestructure\Persistence;
use Airzone\Domain\Category\Category;
use Airzone\Domain\Category\CategoryRepository;

class EloquentCategoryRepository implements CategoryRepository
{
    public function findAll(): array
    {
        return Category::all()->toArray();
    }

    public function findById(int $categoryId): Category
    {
        return Category::findOrFail($categoryId);
    }

    public function persist(array $data): Category
    {
        $category = new Category($data);
        $category->save();
        return $category;
    }

    public function update(int $categoryId, array $data): Category
    {
        $category = $this->findById($categoryId);
        $category->update($data);
        return $category;
    }

    public function delete(int $categoryId): int
    {
        $category = $this->findById($categoryId);
        $categoryId = $category->id;
        $category->deleteOrFail();
        return $categoryId;
    }
}