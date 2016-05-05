<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	protected $fillable = [
        'name',
        'slug',
        'desc',
        'on_nav',
        'created_by',
        'updated_by'
    ];

    public function creator()
    {
        return $this->belongsTo('App\User','created_by');
    }
    
    public function updater()
    {
        return $this->belongsTo('App\User','updated_by');
    }

    public function sections()
    {
        return $this->belongsToMany('App\Models\Section');
    }
}
