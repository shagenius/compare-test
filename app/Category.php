<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{    
    
    protected $fillable = ['name', 'active'];
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'name' => 'required|max:255',
        ];
    }
}
