<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'deadline'];
    
    //Relacion uno a muchos con tabla tasks
    public function tasks(){
        return $this->hasMany(Task::class);
    }



    use HasFactory;
}
