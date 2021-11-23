<?php

namespace Blk\Kyc\App\Models;

use App\Helpers\Uuid\UuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycType extends Model
{
    use HasFactory, UuidModel;

    protected $table = 'kyc_types';

    protected $fillable = [
        'id',
        'name'
    ];

}
