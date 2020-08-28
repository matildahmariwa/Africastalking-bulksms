<?php

namespace App;
use App\Contact;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'group_name','description',
    ];
    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }
}
