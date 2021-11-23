<?php

namespace Blk\Request\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Uuid\UuidModel;
use Blk\Request\App\Models\RequestForm;


class ChangeOffer extends Model
{
    use HasFactory,UuidModel;

    protected $table = 'change_offers';

    protected $fillable = [
        'admin_id',
        'user_id',
        'request_id',
        'loan_amount',
        'description',
        'status'
    ];

    public function RequestForm()
    {
        return $this->belongsTo(RequestForm::class,'request_id','id');
    }


}
