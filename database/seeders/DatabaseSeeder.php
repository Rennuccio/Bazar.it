<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void{
        $categories = [
            'abbigliamento','motori','elettronica','arredamento','sport','hobby','casa','bellezza','animali','collezionismo'
        ];
        foreach ($categories as $category)

        Category::create([
            'name' => $category,
        ]);

        $subcategories = [
            
            ['name'=>'uomo','id'=>'1'],
            ['name'=>'donna','id'=>'1'],
            ['name'=>'bambino','id'=>'1'],
            ['name'=>'auto','id'=>'2'],
            ['name'=>'moto','id'=>'2'],
            ['name'=>'Accessori Auto','id'=>'2'],
            ['name'=>'Telefonia','id'=>'3'],
            ['name'=>'Console','id'=>'3'],
            ['name'=>'Informatica','id'=>'3'],
            ['name'=>'Mobili','id'=>'4'],
            ['name'=>'Antico','id'=>'4'],
            ['name'=>'Cucina','id'=>'4'],
            ['name'=>'Calcio','id'=>'5'],
            ['name'=>'Palestra','id'=>'5'],
            ['name'=>'Fitness','id'=>'5'],
            ['name'=>'Bricolage','id'=>'6'],
            ['name'=>'Giardinaggio','id'=>'6'],
            ['name'=>'Fumetti','id'=>'6'],
        ];


        foreach ($subcategories as $subcategory)
        Subcategory::create([
            'name' => $subcategory['name'],
            'category_id'=>$subcategory['id'],
        ]);
    }
}

