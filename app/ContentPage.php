<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentPage extends Model
{
    protected $table = 'content_pages';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
