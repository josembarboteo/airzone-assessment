<?

namespace Airzone\Domain\Post;

use Airzone\Domain\Category\Category;
use Airzone\Domain\Comment\Comment;
use Airzone\Domain\User\User;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model {
    use HasFactory;

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function newFactory()
    {
        return new PostFactory();
    }
}
