<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = [
        'name',
        'title',
        'desc',
        'html',
        'archived',
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

    public function getSectionListAttribute()
    {
        return $this->sections()->lists('id');
    }

}
