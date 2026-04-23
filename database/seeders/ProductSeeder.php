<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Daily Care
            ['name' => 'Premium Toothbrush', 'slug' => 'premium-toothbrush', 'price' => 150.00, 'category' => 'daily-care', 'rating' => '4.8', 'image' => 'images/toothbrush.jpg'],
            ['name' => 'Whitening Toothpaste', 'slug' => 'whitening-toothpaste', 'price' => 200.00, 'category' => 'daily-care', 'rating' => '4.5', 'image' => 'images/toothpaste.jpg'],
            ['name' => 'Dental Floss', 'slug' => 'dental-floss', 'price' => 85.00, 'category' => 'daily-care', 'rating' => '4.2', 'image' => 'images/floss.jpg'],
            ['name' => 'Tongue Scraper', 'slug' => 'tongue-scraper', 'price' => 120.00, 'category' => 'daily-care', 'rating' => '4.6', 'image' => 'images/tongue.jpg'],
            // Fresh Breath
            ['name' => 'Mouthwash', 'slug' => 'mouthwash', 'price' => 180.00, 'category' => 'fresh-breath', 'rating' => '4.7', 'image' => 'images/mouthwash.jpg'],
            ['name' => 'Breath Mints', 'slug' => 'breath-mints', 'price' => 95.00, 'category' => 'fresh-breath', 'rating' => '4.3', 'image' => 'images/mint.jpg'],
            ['name' => 'Fresh Strips', 'slug' => 'fresh-strips', 'price' => 75.00, 'category' => 'fresh-breath', 'rating' => '4.1', 'image' => 'images/strips.jpg'],
            ['name' => 'Mouth Spray', 'slug' => 'mouth-spray', 'price' => 110.00, 'category' => 'fresh-breath', 'rating' => '4.4', 'image' => 'images/spray.jpg'],
            // Dental Tools
            ['name' => 'Orthodontic Wax', 'slug' => 'orthodontic-wax', 'price' => 60.00, 'category' => 'dental-tools', 'rating' => '4.5', 'image' => 'images/wax.jpg'],
            ['name' => 'Floss Holder', 'slug' => 'floss-holder', 'price' => 130.00, 'category' => 'dental-tools', 'rating' => '4.6', 'image' => 'images/holder.jpg'],
            ['name' => 'Water Flosser', 'slug' => 'water-flosser', 'price' => 2500.00, 'category' => 'dental-tools', 'rating' => '4.9', 'image' => 'images/waterflosser.jpg'],
        ];

        foreach ($products as $p) {
            Product::create($p + ['description' => 'High-quality dental care product.', 'stock' => 100]);
        }
    }
}