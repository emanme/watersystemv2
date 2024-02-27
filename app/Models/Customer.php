<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'firstname',
        'middlename',
        'lastname',
        'civil_status',
        'purok',
        'setio',
        'barangay',
        'contact_number',
        'type',
        'status',
        'establishment_name',
        'meter_number',
        'latitude',
        'longitude',
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('firstname', 'like', '%' . request('search') . '%')->orWhere('lastname', 'like', '%' . request('search') . '%')->orWhere('middlename', 'like', '%' . request('search') . '%')->orWhere('establishment_name', 'like', '%' . request('search') . '%')->orWhere('account_number', 'like', '%' . request('search') . '%');
        }
    }
    public static function checkCustomerByAccountNumber($accountNumber)
    {
        return self::where('account_number', $accountNumber)->exists();
    }
}
