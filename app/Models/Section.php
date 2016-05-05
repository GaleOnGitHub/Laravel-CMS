<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model {

	protected $fillable = [
        'name',
        'alias',
        'header',
        'order',
        'all_pages',
        'desc',
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

    public function pages()
    {
        return $this->belongsToMany('App\Models\Page');
    }

    public function articles()
    {
        return $this->belongsToMany('App\Models\Article');
    }

    public function getPageListAttribute()
    {
        return $this->pages()->lists('id');
    }

    public function isOnPage($page_id)
    {

        $pages = $this->pages()->get();

        foreach($pages as $page){
            if($page->id == $page_id){
                return true;
            }
        }
        return false;
    }
}
