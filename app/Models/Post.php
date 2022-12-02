<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @method static where(string $string, int $id)
 */
class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    /**
     * Первичный ключ таблицы БД
     *
     * @var string
     */
//    protected $primaryKey = 'id';

//protected $fillable = ['title','slug',  'content', 'date', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Получить все комментарии поста.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
