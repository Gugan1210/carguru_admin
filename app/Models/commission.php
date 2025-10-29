<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Commision_Type;
use App\Models\Business_unit;
use App\Models\StaffDepartment;

class Commission extends Model
{
    protected $table = 'commission';
    protected $fillable = [
        'commission_id',
        'designated_role',
        'business_unit',
        'department',
        'specific_role',
        'commission_type',
        'duration',
        'start_date',
        'end_date',
        'commission_category',
        'commission_description',
        'commission_duration',
        'commission_start_date',
        'commission_end_date',
        'tiered_category',
    ];

    protected $casts = [
        'tiered_category' => 'array', // auto decode JSON
        'start_date' => 'date',
        'end_date' => 'date',
        'commission_start_date' => 'date',
        'commission_end_date' => 'date',
    ];

    public function getCommissionType()
    {
        return $this->belongsTo(Commision_Type::class, 'commission_type', 'id');
    }

    public function getBusinessUnit()
    {
        return $this->belongsTo(Business_unit::class, 'business_unit', 'id');
    }

    public function getDepartment()
    {
        return $this->belongsTo(StaffDepartment::class, 'department', 'id');
    }
}
