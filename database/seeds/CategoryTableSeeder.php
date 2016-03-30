<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;

/**
 * Description of CategoryTableSeede
 *
 * @author helder
 */
class CategoryTableSeeder extends Seeder {

    public function run() {

        DB::table('categories')->truncate();

        factory(CodeCommerce\Category::class, 20)->create();
    }

}
