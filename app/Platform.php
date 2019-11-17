<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    /**
     * Warning: This will allow mass assignment
     * @see FormRequest for validating before saving
     */
    protected $guarded = [];

    /**
     * These attributes won't be sent to json response by default
     */
    protected $hidden = ['thumbnail'];

    /**
     * These custom attributes will be appended to response
     */
    protected $appends = ['thumbnail_path'];

    /**
     * Returns thumbnail path
     */
    public function thumbnailPath()
    {
        if (isset($this->thumbnail)) {
            return storage('platform/' . thumbnail . '.jpg');
        } else {
            asset('default.jpeg');
        }
    }
}
