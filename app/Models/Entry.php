<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeActive($query)
    {
    	$query->where('is_deleted', '!=', true);
    }

    public function getFullNameAttribute()
    {
    	return $this->last_name . ', ' . $this->first_name . ' ' . $this->middle_name; 
    }
}
