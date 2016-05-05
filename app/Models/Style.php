<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model {

	protected $fillable = [
        'name',
        'desc',
        'css',
        'active',
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
}
