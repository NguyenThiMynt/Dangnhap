<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contents extends Model
{
    protected $table = 'contents';
//    protected $timestamps = false;
    protected $fillable = ['content', 'image_path', 'name','id_user'];
    /**
     * @var array|string|null
     */
    private $name;

    public function User()
    {
        return $this->hasMany('App\User', 'id_user', 'id');
    }
}
