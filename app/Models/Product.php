<?php
namespace App\Models;

use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property $id
 */
class Product extends Model {
    use HasFactory;
    use Slugable;

    protected $fillable = [
        'name',
        'title',
        'slug',
        'description',
        'is_featured'
    ];

    /**
     * @return HasMany
     */
    public function images(): HasMany {
        return $this->hasMany(ProductImage::class);
    }

}
