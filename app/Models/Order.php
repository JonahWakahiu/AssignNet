<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'academic_level',
        'paper_type',
        'discipline',
        'topic',
        'paper_instructions',
        'additional_materials',
        'paper_format',
        'number_of_pages',
        'currency',
        'deadline',
        'writer_category',
        'user_id',
    ];


    // relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
