<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Map extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'tittle', 'author','version','tags','cover','describe','markdown','md5'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
    public function iname(){
        return $this->name.'@'.User::findOrFail($this->author)->name;
    }
    public function author(){
        return User::findOrFail($this->author)->name;
    }
    public function storage($file){
        switch ($file) {
            case 'map_file':
                return '/' . $this->md5;
                break;
            case 'cover_file':
                return '/' . $this->cover;
                break;
            default:
                return '/' . $file;
                break;
        }
    }
}
