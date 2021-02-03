<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $guarded = [];

    protected $attributes = [
         'active' => 1 
        // 'Undetermined' => 3,
    ];

    public function scopeActive($query) {
        return $query->where('active', 1);
    }

    public function scopeInactive($query) {
        return $this->where('active', 0)->get();
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function getActiveAttribute($attribute){
        return $this->activeOptions()[$attribute];
    }

    public function activeOptions() {
        return [
            1 => 'Active',
            0 => 'Inactive',
            2 => 'In-Progress',
            // 3 => Customer::where('id', 1)->get()[0]['name']
        ];
    }
}
