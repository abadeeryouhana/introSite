<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\Sector;
use App\Models\Brand;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Client;
use App\Models\ClientTestimonial;
use App\Models\CaseStudy;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\ContactMessage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();

        // 1. Users
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'Bayan Group'],
            ['key' => 'site_description', 'value' => 'Innovating Business Through People, Technology & Insight'],
            ['key' => 'contact_email', 'value' => 'info@bayangroup.test'],
            ['key' => 'contact_phone', 'value' => '+1234567890'],
            ['key' => 'address', 'value' => '123 Tech Avenue, Riyadh, KSA'],
        ];
        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], ['value' => $setting['value']]);
        }

        // 3. Social Links
        SocialLink::truncate();
        SocialLink::create(['platform' => 'Facebook', 'url' => 'https://facebook.com/bayangroup']);
        SocialLink::create(['platform' => 'Twitter', 'url' => 'https://twitter.com/bayangroup']);
        SocialLink::create(['platform' => 'LinkedIn', 'url' => 'https://linkedin.com/company/bayangroup']);

        // 4. Sectors
        Sector::truncate();
        $sectorTech = Sector::create(['name' => 'Technology']);
        $sectorEdu = Sector::create(['name' => 'Education']);
        $sectorComm = Sector::create(['name' => 'Communication']);

        // 5. Brands
        Brand::truncate();
        Brand::create(['name' => 'Bayan Tech', 'sector_id' => $sectorTech->id, 'description' => 'Cutting edge tech solutions', 'status' => 'Active', 'order' => 1]);
        Brand::create(['name' => 'Bayan Edu', 'sector_id' => $sectorEdu->id, 'description' => 'Modern learning platforms', 'status' => 'Active', 'order' => 2]);
        Brand::create(['name' => 'Bayan Comm', 'sector_id' => $sectorComm->id, 'description' => 'Connecting people seamlessly', 'status' => 'Active', 'order' => 3]);

        // 6. Services
        Service::truncate();
        Service::create(['title' => 'Web Development', 'order' => 1]);
        Service::create(['title' => 'Mobile Applications', 'order' => 2]);
        Service::create(['title' => 'UI/UX Design', 'order' => 3]);
        Service::create(['title' => 'Cloud Hosting', 'order' => 4]);
        Service::create(['title' => 'Digital Marketing', 'order' => 5]);

        // 7. Team Members
        TeamMember::truncate();
        TeamMember::create(['name' => 'Dr. Muhammad Fadel', 'position' => 'Chairman & Managing Director', 'order' => 1]);
        TeamMember::create(['name' => 'Rim A. Wafa', 'position' => 'Vice Chairman', 'order' => 2]);
        TeamMember::create(['name' => 'Amr Hatem', 'position' => 'Finance & Admin Director', 'order' => 3]);
        TeamMember::create(['name' => 'Omar Taher', 'position' => 'Translation Sector Head', 'order' => 4]);
        TeamMember::create(['name' => 'Job Moses', 'position' => 'Business Development Manager', 'order' => 5]);
        TeamMember::create(['name' => 'Muhamed Murad', 'position' => 'Operation Officer', 'order' => 6]);
        // 8. Clients
        Client::truncate();
        $client1 = Client::create(['name' => 'Siemens', 'url' => 'https://acme.test', 'order' => 1]);
        $client2 = Client::create(['name' => 'PwC', 'url' => 'https://globex.test', 'order' => 2]);
        $client3 = Client::create(['name' => 'PepsiCo', 'url' => 'https://initech.test', 'order' => 3]);
        $client4 = Client::create(['name' => 'EY', 'url' => 'https://initech.test', 'order' => 3]);
        $client5 = Client::create(['name' => 'Deloitte', 'url' => 'https://initech.test', 'order' => 3]);
        $client6 = Client::create(['name' => 'KPMG', 'url' => 'https://initech.test', 'order' => 3]);
        $client7 = Client::create(['name' => 'World Bank', 'url' => 'https://initech.test', 'order' => 3]);
        $client8 = Client::create(['name' => 'Emaar', 'url' => 'https://initech.test', 'order' => 3]);

        // 9. Client Testimonials
        ClientTestimonial::truncate();
        ClientTestimonial::create([
            'client_id' => $client1->id,
            'title' => 'Exceptional Service',
            'description' => 'Bayan Group delivered beyond our expectations. Their technical expertise is unmatched.'
        ]);
        ClientTestimonial::create([
            'client_id' => $client2->id,
            'title' => 'Great Partnership',
            'description' => 'Working with them has completely transformed our internal processes.'
        ]);
        ClientTestimonial::create([
            'client_id' => $client3->id,
            'title' => 'Highly Recommended',
            'description' => 'The team is professional, fast, and highly skilled.'
        ]);

        // 10. Case Studies
        CaseStudy::truncate();
        CaseStudy::create([
            'sector_id' => $sectorTech->id,
            'title' => 'Cloud Migration for Acme',
            'sub_title' => 'Moving 1000s of records securely',
            'challenge' => 'Legacy system was too slow and insecure.',
            'solution' => 'Implemented a custom AWS cloud infrastructure.',
            'delivered' => '99.9% uptime and 3x speed improvement.',
            'tools' => 'AWS, Laravel, Vue.js',
            'order' => 1
        ]);
        CaseStudy::create([
            'sector_id' => $sectorEdu->id,
            'title' => 'LMS for National University',
            'sub_title' => 'Empowering 50,000 students',
            'challenge' => 'Students could not access materials remotely.',
            'solution' => 'Built a modern Learning Management System from scratch.',
            'delivered' => 'Full digital adoption in just 3 months.',
            'tools' => 'Moodle, PHP, React',
            'order' => 2
        ]);

        // 11. Blog Categories
        BlogCategory::truncate();
        $catNews = BlogCategory::create(['name' => 'Company News']);
        $catTech = BlogCategory::create(['name' => 'Tech Insights']);

        // 12. Blogs
        Blog::truncate();
        Blog::create([
            'blog_category_id' => $catNews->id,
            'title' => 'Bayan Group Expands to New Markets',
            'sub_title' => 'Opening our 5th regional office',
            'content' => 'We are thrilled to announce that we are opening a new office. This allows us to serve our clients even better...'
        ]);
        Blog::create([
            'blog_category_id' => $catTech->id,
            'title' => 'The Future of AI in Enterprise',
            'sub_title' => 'How artificial intelligence is changing the game',
            'content' => 'Artificial intelligence is no longer just a buzzword. It is actively reshaping how enterprises handle data, customer support, and strategy...'
        ]);

        // 13. Contact Messages
        ContactMessage::truncate();
        ContactMessage::create([
            'first_name' => 'Michael',
            'last_name' => 'Scott',
            'email' => 'michael@dundermifflin.test',
            'phone' => '123-456-789',
            'message' => 'I would like to inquire about your web development services.'
        ]);

        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    }
}
