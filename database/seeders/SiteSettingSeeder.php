<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\SiteSetting;
class SiteSettingSeeder extends Seeder {
    public function run(): void {
        $settings = [
            ["key" => "site_name", "value" => "NSUK Dept of Computer Science", "type" => "text"],
            ["key" => "contact_email", "value" => "info@nsuk.cscms", "type" => "text"],
            ["key" => "contact_phone", "value" => "+234 000 000 0000", "type" => "text"],
            ["key" => "address", "value" => "Nasarawa State University, Keffi", "type" => "text"],
        ];
        foreach ($settings as $setting) {
            SiteSetting::create($setting);
        }
    }
}
