<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory,  HasUuids;
    public function tag(string $name){
    $tag =Tag::firstOrCreate(['name'=>$name]);
    $this->tags()->attach($tag);
    }

    public function tags(){
        return $this -> belongsToMany(Tag::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
public function applications()
{
    return $this->hasMany(Applications::class, 'job_id'); 
}
    
}
