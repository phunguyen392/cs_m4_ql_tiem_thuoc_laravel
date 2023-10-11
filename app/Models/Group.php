<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'groups';
    protected $fillable = [
        'name',
        'deleted_at'
    ];
    public $timestamp = true;
    public function role()
    {
        return $this->belongsToMany(Role::class);
    }
    public function user()
    {
        return $this->hasMany(User::class, 'group_id', 'id');
        
    }
    public function scopesearch($query)
    {
        if ($key = request()->search) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }
}
