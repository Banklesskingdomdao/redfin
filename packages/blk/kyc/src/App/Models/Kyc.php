<?php

namespace Blk\Kyc\App\Models;

use App\Helpers\Uuid\UuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Blk\Kyc\App\Models\KycDocument;

class Kyc extends Model
{
    use HasFactory, UuidModel;

    

    protected $table = 'kyc';

    protected $fillable = [
        'name',
        'phone_number',
        'date_of_birth',
        'country',
        'address_line_1',
        'address_line_2',
        'city',
        'zip_code',
        'telegram_username',
        'selfie_document',
        'pan_document',
        'status'
    ];
    public function kycDocument()
    {
        return $this->hasOne(KycDocument::class,'kyc_id','id');
    }
}
