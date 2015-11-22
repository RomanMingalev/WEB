<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Item;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

      $this->call('ItemTableSeeder');

        Model::reguard();
    }
}
class ItemTableSeeder extends Seeder {

  public function run()
  {
      DB::table('item')->delete();

      Item::create(array('name' => 'name'));
  }

}
