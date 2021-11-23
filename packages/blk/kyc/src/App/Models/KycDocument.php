<?php

namespace Blk\Kyc\App\Models;

use App\Helpers\Uuid\UuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycDocument extends Model
{
    use HasFactory, UuidModel;

    protected $table = 'kyc_document';

    protected $fillable = [
        'id',
        'kyc_id',
        'type_id',
        'front_image',
        'back_image'
    ];

    public function KycType()
    {
        return $this->belongsTo(KycType::class,'type_id','id');

    }

}
