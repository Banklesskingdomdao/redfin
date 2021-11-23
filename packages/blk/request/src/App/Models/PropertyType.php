<?php

namespace Blk\Request\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Uuid\UuidModel;

class PropertyType extends Model
{
    use HasFactory, UuidModel;

    protected $fillable = [
        'type'
    ];
}
