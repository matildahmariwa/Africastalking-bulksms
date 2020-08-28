<?php

namespace App;
use App\Group;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name','last_name','phone_number','id_number','residence',
    ];
    
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
