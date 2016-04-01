<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

/**
 * Description of ProductTableSeede
 *
 * @author helder
 */
class ProductTableSeeder extends Seeder {

    public function run() {

        DB::table('products')->truncate();

        factory(CodeCommerce\Product::class, 20)->create();
    }

}
