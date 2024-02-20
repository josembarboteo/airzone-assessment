<?

namespace Airzone\Domain\Category;

use Airzone\Domain\Post\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model {
    use HasFactory;

    private string $name;
    private string $slug;
    private bool $visible;

    public function __construct($name, $slug, $visible = 0)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->visible = $visible;
    }
    
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
