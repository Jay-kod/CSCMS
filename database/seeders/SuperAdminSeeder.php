<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class SuperAdminSeeder extends Seeder {
    public function run(): void {
        $superAdmin = User::create([
            "name" => "Super Administrator",
            "email" => "admin@nsuk.edu.ng",
            "password" => Hash::make("password"),
            "role" => "super_admin",
            "is_active" => true,
        ]);
        $superAdmin->assignRole("super_admin");

        $deptAdmin = User::create([
            "name" => "Department Administrator",
            "email" => "dept@nsuk.edu.ng",
            "password" => Hash::make("password"),
            "role" => "dept_admin",
            "is_active" => true,
        ]);
        $deptAdmin->assignRole("dept_admin");
    }
}
