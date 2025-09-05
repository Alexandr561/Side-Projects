<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Filterable;
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = [];
    use SoftDeletes;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id'); // Пост принадлежит категории
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

//    public function scopeFilter(Builder $query, $filter)
//    {
//        return $filter->apply($query);
//    }
}
