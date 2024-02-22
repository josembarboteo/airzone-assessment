<?

namespace Airzone\Domain\Category;

interface CategoryRepository
{
    public function findAll(): array;
    public function findById(int $categoryId): Category;
    public function persist(array $data): Category;
    public function update(int $categoryId, array $data): Category;
    public function delete(int $categoryId): int;
}
