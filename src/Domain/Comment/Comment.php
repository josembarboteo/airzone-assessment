<?

namespace Airzone\Domain\Comment;

use Airzone\Domain\Post\Post;
use Airzone\Domain\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model {
    use HasFactory;

    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
