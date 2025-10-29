<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CountryState;

class Staff extends Model
{
    protected $table = 'staffs';
    protected $fillable =
        [
            "staff_id",
            "business_unit",
            "department",
            "status",
            "designated_role",
            "designated_location",
            "specific_function",
            "name",
            "i_c_number",
            "gender",
            "race",
            "contact_number",
            "email",
            "address_line_1",
            "address_line_2",
            "postcode",
            "state_id",
            "city_id",
            "emergency_name",
            "emergency_contact",
            "relationship",
            "bank_name",
            "bank_account_number",
            "profile_image",
        ];

    public function getstate()
    {
        return $this->belongsTo(CountryState::class, 'id', 'state_id');
    }

    public function getBusinessUnit()
    {
        return $this->belongsTo(Business_unit::class, 'business_unit', 'id');
    }

    public function getDepartment()
    {
        return $this->belongsTo(StaffDepartment::class, 'department', 'id');
    }

    public function getRace()
    {
        return $this->belongsTo(StaffRace::class, 'race', 'id');
    }

    public function getRelationship()
    {
        return $this->belongsTo(StaffRelationship::class, 'relationship', 'id');
    }

}
