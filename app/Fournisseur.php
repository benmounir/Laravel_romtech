<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = ['name', 'contact_number', 'contact_email', 'addresse'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
