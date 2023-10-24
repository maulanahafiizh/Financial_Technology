<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Roles;
use App\Models\Wallet;


class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    */
   public function run(): void
   {
      Roles::create([
         "name" => "admin",
      ]);

      Roles::create([
         "name" => "bank"
      ]);

      Roles::create([
         "name" => "kantin"
      ]);

      Roles::create([
         "name" => "siswa"
      ]);


      User::create([
         "name" => "maulana_hafiizh",
         "role_id" => 4,
         "password" => bcrypt("maulanahafiizh")
      ]);

      User::create([
         "name" => "admin",
         "role_id" => 1,
         "password" => bcrypt("admin123")
      ]);

      Category::create([
         "name" => "Makanan"
      ]);

      Category::create([
         "name" => "Cemilan"
      ]);


      Category::create([
         "name" => "Minuman"
      ]);

      Product::create([
         "name" => "Es Krim Nasi Uduk",
         "price" =>  10000,
         "stock" => 64,
         "photo" => "images/static/es-krim-nasi-uduk.jpg",
         "desc" => "Menikmati nasi uduk yang mengeyangkan bersamaan dengan es krim yang menyegarkan",
         "category_id" => 1,
         "stand" => 2
      ]);

      Product::create([
         "name" => "Nasi Susu",
         "price" =>  5000,
         "stock" => 56,
         "photo" => "images/static/nasi-susu.webp",
         "desc" => "Menikmati kesegaran dari susu yang ditambah isian nasi yang dapat mengeyangkan",
         "category_id" => 3,
         "stand" => 2
      ]);

      Product::create([
         "name" => "Es Krim Saos",
         "price" =>  10000,
         "stock" => 36,
         "photo" => "images/static/es-krim-saus.jpg",
         "desc" => "Kesegaran es krim yang dicampur dengan pedasnya saus sambal menjadikan rasanya pedas segar",
         "category_id" => 2,
         "stand" => 2
      ]);


      Product::create([
         "name" => "Nasi Goreng Oreo",
         "price" =>  15000,
         "stock" => 26,
         "photo" => "images/static/nasi-goreng-oreo.jpg",
         "desc" => "Menikmati nasi goreng yang dicampur dengan oreo coklat yang sangat gurih nan manis",
         "category_id" => 1,
         "stand" => 2
      ]);

      Product::create([
         "name" => "Bakso Susu",
         "price" =>  15000,
         "stock" => 26,
         "photo" => "images/static/bakso-susu.webp",
         "desc" => "Menikmati daging yang berbentuk bakso pedas dengan dikuahi oleh susu yang gurih nan manis",
         "category_id" => 1,
         "stand" => 2
      ]);

      Wallet::create([
         "user_id" => 1,
         "credit" => 100000,
         "debit" => 0
      ]);
   }
}
