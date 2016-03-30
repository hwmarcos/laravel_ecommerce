<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

/**
 * Description of CategoryTableSeede
 *
 * @author helder
 */
class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->truncate();
        factory(CodeCommerce\User::class, 10)->create();
    }

}
