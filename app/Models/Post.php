<?php
declare (strict_types = 1);
namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasUuid;
    use HasSlug;
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'key',
        'title',
        'slug',
        'body',
        'description',
        'published',
        'user_id',

    ];
    protected $casts = [
        'published' => 'boolean',
    ];
    // relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related:User::class,
            foreignKey:'user_id'
        );
    }

}
