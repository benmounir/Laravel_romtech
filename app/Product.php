<?php

namespace App;

use App\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'detail', 'prix_vente','prix_achat','image', 'sub_category_id','fournisseur_id',];

    protected $dates = ['deleted_at'];

    public function getImageAttribute($image){
        return asset($image);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    /* 
    *   check if product has tags
    *
    *@return bool
     */
    public function hasTags($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }
    /*
     * Set the  product name.
     *
     * @param  string  $value
     * @return void
     */
    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = strtolower($value);
    //     $this->attributes['slug'] = Str::slug($value);
    // }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
        
    }
    public function FormatPrix_vente()
    {
        return $this->prix_vente.('.00 dh');
    }
    public function Formatprix_achat()
    {
        return $this->prix_achat. ('.00 dh');
    }
}
