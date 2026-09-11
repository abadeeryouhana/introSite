<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SeoSetting;

class SeoSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'page_key' => 'home',
                'page_name' => 'Home Page',
                'meta_title' => 'Bayan Group | Digital Innovation & Integrated Business Solutions',
                'meta_description' => 'Bayan Group empowers organizations across the Middle East and worldwide with cutting-edge technology, corporate communication, digital transformation, and business solutions.',
                'meta_keywords' => 'Bayan Group, digital innovation, business solutions, corporate communication, digital transformation, enterprise software, technology consulting, Middle East business',
                'og_title' => 'Bayan Group | Innovating Business Through People, Technology & Insight',
                'og_description' => 'An integrated business solutions group empowering organizations since 2003 across technology, education, and communication.',
                'robots' => 'index, follow',
            ],
            [
                'page_key' => 'about',
                'page_name' => 'About Us',
                'meta_title' => 'About Us | Bayan Group - Legacy of Innovation & Leadership',
                'meta_description' => 'Discover Bayan Group\'s journey since 2003. Explore our corporate leadership, values, and how we empower enterprises with integrated technology and communication.',
                'meta_keywords' => 'About Bayan Group, company history, executive leadership, corporate vision, business empowerment, Bayan leadership team',
                'og_title' => 'About Bayan Group | A Legacy of Innovation, A Future of Growth',
                'og_description' => 'Learn about Bayan Group\'s history, executive leadership, and dedicated team driving digital excellence.',
                'robots' => 'index, follow',
            ],
            [
                'page_key' => 'sectors_brands',
                'page_name' => 'Sectors & Brands',
                'meta_title' => 'Sectors & Brands | Bayan Group Integrated Portfolio',
                'meta_description' => 'Explore Bayan Group\'s diversified sectors and family of brands operating in technology, education, business consulting, and digital communication.',
                'meta_keywords' => 'Bayan Group sectors, subsidiary brands, technology sector, education solutions, enterprise brands, business group portfolio',
                'og_title' => 'One Group. Five Sectors. A Family of Brands | Bayan Group',
                'og_description' => 'Connecting sectors and powering specialized brands to deliver impactful industry-specific solutions.',
                'robots' => 'index, follow',
            ],
            [
                'page_key' => 'services',
                'page_name' => 'Services',
                'meta_title' => 'Our Services | Enterprise Technology, Cloud & Marketing | Bayan Group',
                'meta_description' => 'Explore Bayan Group\'s full suite of services: Web Development, Mobile Applications, Cloud Infrastructure, UI/UX Design, ERP Implementation, and Digital Marketing.',
                'meta_keywords' => 'Bayan services, enterprise web development, mobile app development, UI UX design, cloud hosting, digital marketing agency, ERP solutions',
                'og_title' => 'Integrated Business & Technology Services | Bayan Group',
                'og_description' => 'Tailored digital solutions engineered to scale your business operations and elevate client engagement.',
                'robots' => 'index, follow',
            ],
            [
                'page_key' => 'portfolio',
                'page_name' => 'Portfolio & Case Studies',
                'meta_title' => 'Portfolio & Case Studies | Successful Client Transformations | Bayan Group',
                'meta_description' => 'Browse our showcase of transformative case studies and successful client partnerships across government, enterprise, education, and private sectors.',
                'meta_keywords' => 'Bayan case studies, project portfolio, client success stories, digital transformation case studies, enterprise delivery',
                'og_title' => 'Case Studies & Delivered Projects | Bayan Group',
                'og_description' => 'Proven outcomes and success stories from organizations transformed by Bayan Group solutions.',
                'robots' => 'index, follow',
            ],
            [
                'page_key' => 'blog',
                'page_name' => 'Blog & Insights',
                'meta_title' => 'Blog & Industry Insights | Technology & Business Trends | Bayan Group',
                'meta_description' => 'Read the latest news, technological insights, digital transformation strategies, and thought leadership articles from Bayan Group experts.',
                'meta_keywords' => 'Bayan blog, tech insights, business articles, digital transformation trends, enterprise tech news, thought leadership',
                'og_title' => 'Insights & Perspectives | Bayan Group Blog',
                'og_description' => 'In-depth perspectives on emerging technology, executive strategy, and digital trends.',
                'robots' => 'index, follow',
            ],
            [
                'page_key' => 'careers',
                'page_name' => 'Careers',
                'meta_title' => 'Careers at Bayan Group | Join Our Innovative Team',
                'meta_description' => 'Build your future with Bayan Group. Discover exciting career opportunities in technology, digital media, business strategy, and engineering.',
                'meta_keywords' => 'Careers at Bayan Group, tech jobs, employment opportunities, join Bayan, software engineer careers, marketing jobs',
                'og_title' => 'Build Your Future with Bayan Group',
                'og_description' => 'Join our dynamic team of engineers, designers, and consultants building future-ready solutions.',
                'robots' => 'index, follow',
            ],
            [
                'page_key' => 'contact',
                'page_name' => 'Contact Us',
                'meta_title' => 'Contact Bayan Group | Global Offices in Cairo, Muscat & Florida',
                'meta_description' => 'Get in touch with Bayan Group. Reach our global offices in Cairo HQ, Muscat, and Florida for partnerships, inquiries, and consultation.',
                'meta_keywords' => 'Contact Bayan Group, Cairo office, Muscat office, Florida office, business consultation, hire Bayan Group, contact details',
                'og_title' => 'Contact Bayan Group | Every Time Zone Covered',
                'og_description' => 'Start a conversation with our business specialists across our global offices.',
                'robots' => 'index, follow',
            ],
            [
                'page_key' => 'global',
                'page_name' => 'Global Defaults',
                'meta_title' => 'Bayan Group | Digital Innovation & Business Solutions',
                'meta_description' => 'Innovating Business Through People, Technology & Insight. An integrated business solutions group since 2003.',
                'meta_keywords' => 'Bayan Group, business solutions, digital innovation, technology consulting, corporate communication',
                'og_title' => 'Bayan Group | Digital Innovation & Business Solutions',
                'og_description' => 'Innovating Business Through People, Technology & Insight.',
                'robots' => 'index, follow',
            ]
        ];

        foreach ($pages as $page) {
            SeoSetting::updateOrCreate(
                ['page_key' => $page['page_key']],
                $page
            );
        }
    }
}
