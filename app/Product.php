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
