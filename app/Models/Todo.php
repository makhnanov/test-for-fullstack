<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property bool $completed
 * @property string $title
 * @property string $description
 */
class Todo extends Model
{
    use HasFactory;

    protected $guarded = [];
}
