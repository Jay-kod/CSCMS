<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class SuperAdminSeeder extends Seeder {
    public function run(): void {
        $user = User::create([
            "name" => "IT Administrator",
            "email" => "admin@nsuk.cscms",
            "password" => Hash::make("password123"),
            "role" => "super_admin",
            "is_active" => true,
        ]);
        $user->assignRole("super_admin");
    }
}
