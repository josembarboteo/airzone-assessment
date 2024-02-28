<?

namespace Airzone\Domain\Category;

use Airzone\Domain\Post\Post;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model {
    use HasFactory;

    protected $guarded = ['id']; 
    public $timestamps = false;
    
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
    protected static function newFactory()
    {
        return new CategoryFactory();
    }
}
