<?php

namespace Blk\Request\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Uuid\UuidModel;
use Blk\Request\App\Models\PropertyCondition;
use Blk\Request\App\Models\PropertyType;
use Blk\Request\App\Models\ChangeOffer;
use App\Models\User;



class RequestForm extends Model
{
    use HasFactory, UuidModel;

    protected $table = 'requests';

    protected $fillable = [
        'id',
        'user_id',
        'condition_id',
        'type_id',
        'property_address',
        'property_location',
        'property_description',
        'monthly_income',
        'yearly_income',
        'property_value',
        'amount_of_existing_loan',
        'amount_of_loan_needed',
        'status'
    ];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function propertyCondition()
    {
        return $this->belongsTo(PropertyCondition::class,'condition_id','id');
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class,'type_id','id');
    }
}
