<?

namespace Airzone\Domain\Post;

use Airzone\Domain\Category\Category;
use Airzone\Domain\Comment\Comment;
use Airzone\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model {
    use HasFactory;

    private string $title;
    private string $slug;
    private string $picture;
    private string $shortContent;
    private string $content;
    private bool $pending;
    private bool $public;
    private bool $active;

    public function __construct($title, $slug, $picture, $shortContent, $content, $pending = true, $public = false, $active= false)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->picture = $picture;
        $this->shortContent = $shortContent;
        $this->content = $content;
        $this->pending = $pending;
        $this->public = $public;
        $this->active = $active;

    }

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
        return $this->belongsTo(User::class);
    }
}
