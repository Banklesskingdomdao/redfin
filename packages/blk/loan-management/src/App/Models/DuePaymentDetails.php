<?php

namespace Blk\LoanManagement\App\Models;

use App\Helpers\Uuid\UuidModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DuePaymentDetails extends Model
{
    use HasFactory , UuidModel;

    protected $table = 'due_payment_details';

    protected $fillable = [
        'id',
        'user_id',
        'request_id',
        'loan_details_id',
        'loan_amount_paid',
        'loan_payment_paid_date',
        'payment_mode',
        'status'
    ];
}
