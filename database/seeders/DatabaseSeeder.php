<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Item;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();



        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'=>Hash::make('admin123'),
            'gender'=>'male',
            'user_type'=>'admin',
            'photo'=>'none',
        ]);


         User::create([
            'name' => 'Su Su',
            'email' => 'susu@gmail.com',
            'password'=>Hash::make('password'),
            'gender'=>'female',
            'user_type'=>'user',
            'photo'=>'none',
        ]);


       $categories = [
            'Phone',
            'Laptop',
            'Desktop Computer',
            'Accessories',
            'Drone',
        ];

        foreach ($categories as $categoryName) {
            Category::create(['name' => $categoryName]);
        }



        $items=[
                ['category'=>'Accessories','name' => 'Smart Watch', 'price' => 200.00, 'photo' => 'watch1.png'],
                ['category'=>'Phone','name' => 'iPhone 14', 'price' => 700.00, 'photo' => 'phone1.png'],
                ['category'=>'Drone','name' => 'Drone Camera', 'price' => 5000.00, 'photo' => 'drone1.png'],
                ['category'=>'Accessories','name' => 'AirPOD', 'price' => 100.00, 'photo' => 'aridpod1.png'],
                // Add more items as needed
        ];

         foreach ($items as $item) {
            Item::create($item);
        }





    }
}
