<?php

namespace Blk\Request\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Uuid\UuidModel;

class PropertyCondition extends Model
{
    use HasFactory, UuidModel;

    protected $table = 'property_conditions';

    protected $fillable = [
        'condition'
    ];
}
