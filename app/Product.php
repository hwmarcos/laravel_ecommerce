<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ['category_id', 'name', 'description', 'price', 'featured', 'recommend'];

    public function category() {
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function images() {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function tags() {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    /*
     *  query scopes
     */

    public function scopeFeatured($query) {
        return $query->where('featured', '=', 1)->get();
    }

    public function scopeRecommended($query) {
        return $query->where('recommend', '=', 1)->get();
    }

    public function scopeOfCategory($query, $type) {
        return $query->where('category_id', '=', $type)->get();
    }

    /*
     * mutators
     */

    public function getTagListAttribute() {
        $productTags = null;
        $tags = $this->tags()->lists('name');
        if (count($tags) > 0) {
            foreach ($tags as $tag) {
                $tagsCollection[] = $tag;
            }
            $productTags = implode(',', $tagsCollection);
        }
        return $productTags;
    }

}
