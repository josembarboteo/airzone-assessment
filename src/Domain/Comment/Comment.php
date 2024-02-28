<?

namespace Airzone\Domain\Comment;

use Airzone\Domain\Post\Post;
use Airzone\Domain\User\User;
use Database\Factories\CommentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model {
    use HasFactory;
    
    public $timestamps = false;

    protected $content;

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function newFactory()
    {
        return new CommentFactory();
    }
}
