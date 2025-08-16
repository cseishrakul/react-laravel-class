<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       DB::table('users')->insert(['first_name'=>'Jhoe','last_name'=>'Doe','email'=>'jhoe@gmail.com','email_verified_at'=>now(),'password'=>Hash::make('1234'),'remember_token'=>Str::random(10),'role'=>UserRole::ADMIN,'created_at'=>now(),'updated_at'=>now()]);
    }
}
