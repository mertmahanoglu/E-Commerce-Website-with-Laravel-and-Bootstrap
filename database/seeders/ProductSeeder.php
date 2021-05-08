<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            [

                'name' => 'Mavi Kazak',
                'price' => '16',
                'gallery' => 'http://bestjquery.com/tutorial/product-grid/demo9/images/img-2.jpg',
                
            ],

            [

                'name' => 'Mavi Kazak',
                'price' => '16',
                'gallery' => 'http://bestjquery.com/tutorial/product-grid/demo9/images/img-2.jpg',
                
            ],

            [

                'name' => 'Mavi Kazak',
                'price' => '16',
                'gallery' => 'http://bestjquery.com/tutorial/product-grid/demo9/images/img-2.jpg',
                
            ]
        ]);
    }
}
