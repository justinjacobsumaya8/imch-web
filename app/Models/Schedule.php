<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeActive($query)
    {
    	$query->where('is_deleted', '!=', true);
    }

    public function entries(){
        return $this->hasMany('App\Models\EntrySchedule');
    }
}
