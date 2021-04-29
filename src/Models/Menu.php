<?php

namespace Sequelone\Sone\Menus\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'alias',
        'package',
        'url',
        'level',
        'live'
    ];

    protected $table = 'menus';

    public function menus()
    {
        return $this->hasMany('Sequelone\Sone\Menus\Models\Menu', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('Sequelone\Sone\Menus\Models\Menu', 'parent_id')->with('menus');
    }

    public $timestamps = false;

    public function scopeIsLive($query)
    {
        return $query->where('live', true);
    }

    public function scopeOfSort($query, $sort)
    {
        foreach ($sort as $column => $direction) {
            $query->orderBy($column, $direction);
        }

        return $query;
    }

}
