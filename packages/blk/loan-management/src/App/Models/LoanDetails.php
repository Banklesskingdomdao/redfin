<?php

namespace Blk\LoanManagement\App\Models;

use App\Helpers\Uuid\UuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDetails extends Model
{
    use HasFactory , UuidModel;

    protected $table = 'loan_details';

    protected $fillable = [
        'id',
        'user_id',
        'request_id',
        'loan_amount',
        'loan_payment_date',
        'Late_payment_fee',
        'value_ratio',
        'status'
    ];
}
