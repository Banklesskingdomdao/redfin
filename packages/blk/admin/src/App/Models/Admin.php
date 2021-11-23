<?php

namespace Blk\Admin\App\Models;

use App\Helpers\Uuid\UuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory, UuidModel;

    protected $table = 'admin';

    protected $fillable = [
        'id',
        'email',
        'password'
    ];


}
