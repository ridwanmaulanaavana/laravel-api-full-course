<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'body' => 'array'
    ];

    // mutator sebagai accessor untuk mengubah value sebelum di store
    public function getTitleUpperCaseAttribute(){
        return strtoupper($this->title);
    }

    //ini adalah mutator asli yg diawali kalimat set dan diakhiri attributes
    public function setTitleAttribute(){
        
    }

    public function comments(){
        // syntax dibawah ini adalah memanggil class comment sehingga post bsa banyak comment dengan foreignkey di comment adalah post_id
        return $this->hasMany(Comment::class,'post_id');    
    }

    public function users(){
        return $this->belongsToMany(User::class,'post_user','post_id','user_id');
    }



}
