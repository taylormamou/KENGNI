<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name'        => 'T-shirt Laravel',
            'description' => 'T-shirt confortable avec le logo Laravel en grand. Idéal pour les développeurs.',
            'price'       => 8999.00,
            'stock'       => 45,
            'image'       => 'images/products/tshirt-laravel.jpg'
        ]);

        Product::create([
            'name'        => 'Mug PHP',
            'description' => 'Mug blanc avec le logo PHP. Parfait pour vos pauses café.',
            'price'       => 5999.00,
            'stock'       => 80,
            'image'       => 'images/products/mug-php.jpg'
        ]);

        Product::create([
            'name'        => 'Casquette Laravel',
            'description' => 'Casquette stylée avec broderie Laravel. Protège du soleil pendant le codage.',
            'price'       => 3999.00,
            'stock'       => 30,
            'image'       => 'images/products/casquette-laravel.jpg'
        ]);

        Product::create([
            'name'        => 'Sweat Laravel',
            'description' => 'Sweat à capuche noir avec logo Laravel brodé. Très chaud et confortable.',
            'price'       => 9999.00,
            'stock'       => 25,
            'image'       => 'images/products/sweat-laravel.jpg'
        ]);

        Product::create([
            'name'        => 'Clé USB 32Go PHP',
            'description' => 'Clé USB avec logo PHP gravé. Pratique pour transporter tes projets.',
            'price'       => 5999.00,
            'stock'       => 60,
            'image'       => 'images/products/usb-php.jpg'
        ]);
    }
}