<?

namespace Airzone\Domain\User;

use Airzone\Domain\Category\Category;
use Airzone\Domain\Comment\Comment;
use Airzone\Domain\Post\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model {
    use HasFactory;

    private string $username;
    private string $fullName;

    public function __construct($username, $fullName)
    {
        $this->username = $username;
        $this->fullName = $fullName;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'Comment-User');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'Post-User');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
