<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Career;
use App\Models\CompanyInfo;
use App\Models\Industry;
use App\Models\Role;
use App\Models\Solution;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ---------------------------------------------------------------
        // Roles & admin user
        // ---------------------------------------------------------------
        $adminRole = Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
            'permissions' => ['*'],
        ]);

        Role::create([
            'name' => 'Editor',
            'slug' => 'editor',
            'permissions' => ['brands.*', 'solutions.*', 'industries.*', 'products.*', 'careers.*', 'articles.*'],
        ]);

        User::create([
            'role_id' => $adminRole->id,
            'name' => 'Site Administrator',
            'email' => env('ADMIN_EMAIL', 'admin@veratechph.com'),
            'password' => Hash::make(env('ADMIN_PASSWORD', 'ChangeMe123!')),
            'is_active' => true,
        ]);

        // ---------------------------------------------------------------
        // Brands grouped by category
        // ---------------------------------------------------------------
        $brandGroups = [
            'Laptops / Desktops / Tablets / Servers' => [
                'Acer', 'Apple', 'ASUS', 'Dell', 'HP', 'Intel', 'Lenovo',
                'MSI', 'Haier', 'Hewlett Packard Enterprise', 'Altos',
            ],
            'Printers, Scanners and Consumables' => [
                'Epson', 'HP', 'Canon', 'Brother', 'Samsung', 'Ricoh',
            ],
            'Projectors' => [
                'Epson', 'Acer', 'InFocus', 'IPEVO', 'ViewSonic', 'BenQ',
            ],
            'Mobile Phones' => [
                'Apple', 'Samsung', 'Nokia', 'Sony',
            ],
            'Storage Solutions' => [
                'Seagate', 'Western Digital', 'SanDisk', 'Kingston',
                'Synology', 'Asustor', 'Dell', 'IBM',
            ],
            'Networking Products' => [
                'Linksys', 'D-Link', 'Cisco', 'Juniper', 'Belden',
                'TP-Link', 'CommScope', 'Fortinet', 'SonicWall',
                'Sangfor', 'Panduit',
            ],
            'Software' => [
                'Microsoft', 'Trend Micro', 'Adobe', 'CorelDRAW',
                'ESET', 'Autodesk',
            ],
            'Monitors and Mounting Solutions' => [
                'HP', 'Samsung', 'ViewSonic', 'Acer', 'BenQ', 'Chief', 'LG',
            ],
            'Power Solutions / UPS' => [
                'APC', 'Phoenix Contact', 'Vertiv', 'Intex', 'Eaton', 'Kebos',
            ],
            'Retail and Business Solutions / Surveillance / POS' => [
                'Posteck', 'Custom', 'DASCOM', 'Star', 'Hikvision',
                'Dahua', 'ECLine', 'Hisense',
            ],
        ];

        $order = 0;
        foreach ($brandGroups as $category => $names) {
            foreach ($names as $name) {
                // Slug combines category + name so duplicates (e.g. HP in two
                // categories) remain unique.
                $slug = Str::slug($category.'-'.$name);
                Brand::create([
                    'name' => $name,
                    'slug' => $slug,
                    'category' => $category,
                    'description' => "$name products distributed and supported by Veratech Inc.",
                    'is_active' => true,
                    'sort_order' => $order++,
                ]);
            }
        }

        // ---------------------------------------------------------------
        // Solutions (Business offerings)
        // ---------------------------------------------------------------
        $solutions = [
            ['Hardware', 'hardware', 'PC Laptops, PC Desktops, Servers, Tablets, Mobile Phones, Printers, Consumables, LCD/LED Monitors, Projectors and more.'],
            ['Software', 'software', 'Operating Systems, Productivity suites, Security, Database Management and other licensed software.'],
            ['Business Essentials', 'business-essentials', 'Networking Products, Storage Solutions, Power Management, CCTV, Structured Cabling, POS Terminals, Barcode Scanners, Large Format Displays, Touch Panels, Mounting Solutions and more.'],
        ];
        foreach ($solutions as $i => [$title, $slug, $summary]) {
            Solution::create([
                'title' => $title,
                'slug' => $slug,
                'summary' => $summary,
                'body' => $summary,
                'sort_order' => $i,
            ]);
        }

        // ---------------------------------------------------------------
        // Industries
        // ---------------------------------------------------------------
        $industries = [
            'Banking & Finance', 'Healthcare', 'Government', 'Education',
            'Retail', 'Manufacturing', 'Corporate', 'Hospitality',
        ];
        foreach ($industries as $i => $title) {
            Industry::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'summary' => "Technology solutions tailored for $title.",
                'body' => "Technology solutions tailored for $title.",
                'sort_order' => $i,
            ]);
        }

        // ---------------------------------------------------------------
        // Careers
        // ---------------------------------------------------------------
        Career::create([
            'title' => 'Hiring Sales People',
            'slug' => 'hiring-sales-people',
            'department' => 'Sales',
            'location' => 'San Juan City, Metro Manila',
            'type' => 'full-time',
            'description' => "JOIN OUR TEAM\n\nWe're looking for Sales People with experience in corporate sales.\n\nFor interested parties, please send your resume to sales@veratechph.com",
            'requirements' => "Experience in corporate sales\nStrong communication and presentation skills\nKnowledge of IT products is a plus",
            'is_active' => true,
        ]);

        // ---------------------------------------------------------------
        // Company information
        // ---------------------------------------------------------------
        $defaults = [
            'company_name' => 'Veratech Inc.',
            'tagline' => 'Make Every Space a Meeting Place',
            'address' => '148 Milagros, San Juan City, 1500 Metro Manila',
            'phone' => '8398-9486',
            'email' => 'sales@veratechph.com',
            'commitment' => 'Veratech Inc. is a company founded by entrepreneurs who are well-experienced in the retail and corporate I.T. industry. We have partnered with the top I.T. brands and suppliers in the Philippines to ensure that we offer the best to our clients. Our dynamic enterprise is engaged in corporate/commercial reselling, wholesaling, and direct selling of hardware, software and solutions that fit our customer\'s needs.',
            'line_of_business' => 'Corporate and commercial reselling, wholesaling, and direct selling of hardware, software and solutions that fit our customer\'s needs.',
            'contact_cta' => 'Talk to our team about your next project.',
            'facebook' => 'https://facebook.com/veratechph',
            'linkedin' => 'https://linkedin.com/company/veratechph',
            'twitter' => 'https://twitter.com/veratechph',
        ];
        foreach ($defaults as $k => $v) {
            CompanyInfo::create(['key' => $k, 'value' => $v]);
        }
    }
}