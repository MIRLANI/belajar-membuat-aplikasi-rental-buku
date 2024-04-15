<?php

namespace Tests\Feature;

use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
   

    public function test_login_sukses_redirect_to_dashboard()
    {
        $this->seed([RoleSeeder::class, UserSeeder::class]);
        $this-> post("/login", [
            "username" => "lani",
            "password" => "rahasia"
        ])->assertRedirect("/dashboard")->assertSessionHas("user");
    }

    public function test_login_sukses_redirect_to_profile()
    {
        $this->seed([RoleSeeder::class, UserSeeder::class]);
        $this-> post("/login", [
            "username" => "mirna",
            "password" => "rahasia"
        ])->assertRedirect("/profile");
    }

    public function test_login_user_inactive_redirect_to_login()
    {
        $this->seed([RoleSeeder::class, UserSeeder::class]);
        $this->post("/login", [
            "username" => "arman",
            "password" => "rahasia"
        ])->assertRedirect("/login")
        ->assertSessionHas("status")
        ->assertSessionHas("message", "Akun kamu belum aktif. Segera hubungi admin!");
    }

    public function test_login_gagal_password_not_found()
    {
        $this->seed([RoleSeeder::class, UserSeeder::class]);
        $this->post("/login", [
            "username" => "lani",
            "password" => "salah"
        ])->assertSessionHas("status")
        ->assertSessionHas("username")
        ->assertSessionHas("password")
       
        ->assertSessionHas("message", "username atau password anda salah");
    }

    public function test_login_gagal_username_not_found()
    {
        $this->seed([RoleSeeder::class, UserSeeder::class]);
        $this->post("/login", [
            "username" => "salah",
            "password" => "rahasia"
        ])->assertSessionHas("status")
        ->assertSessionHas("message", "username atau password anda salah");
    }

   

}
