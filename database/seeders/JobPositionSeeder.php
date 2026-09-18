<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobPosition;

class JobPositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            [
                'title'       => 'Senior Odoo Developer',
                'description' => 'Lead ERP implementations for enterprise clients — architecture, customisation, and go-live.',
                'company'     => 'Bayan Technology',
                'location'    => 'Cairo',
                'type'        => 'Full-time',
                'sector'      => 'Technology & AI',
                'is_active'   => true,
                'order'       => 1,
            ],
            [
                'title'       => 'Zoho Implementation Consultant',
                'description' => 'Translate client processes into configured Zoho deployments, end to end.',
                'company'     => 'Bayan Technology',
                'location'    => 'Cairo / Hybrid',
                'type'        => 'Full-time',
                'sector'      => 'Technology & AI',
                'is_active'   => true,
                'order'       => 2,
            ],
            [
                'title'       => 'Senior Legal & Financial Translator',
                'description' => 'Deliver high-precision translation for international law firms, ministries, and Fortune 500 reports.',
                'company'     => 'Bayan Translation',
                'location'    => 'Cairo / Hybrid',
                'type'        => 'Full-time',
                'sector'      => 'Translation',
                'is_active'   => true,
                'order'       => 3,
            ],
            [
                'title'       => 'Localization Project Manager',
                'description' => 'Coordinate multilingual software and digital content localization workflows across global teams.',
                'company'     => 'Bayan Localization',
                'location'    => 'Muscat / Remote',
                'type'        => 'Full-time',
                'sector'      => 'Localization',
                'is_active'   => true,
                'order'       => 4,
            ],
            [
                'title'       => 'Enterprise Strategy Consultant',
                'description' => 'Advise public and private entities on operational excellence, governance, and scaling strategies.',
                'company'     => 'Bayan Consulting',
                'location'    => 'Cairo',
                'type'        => 'Full-time',
                'sector'      => 'Consulting & Business Mgmt',
                'is_active'   => true,
                'order'       => 5,
            ],
            [
                'title'       => 'Corporate Learning & Development Specialist',
                'description' => 'Design and facilitate leadership programs, executive bootcamps, and professional training tracks.',
                'company'     => 'Bayan Education',
                'location'    => 'Cairo / Hybrid',
                'type'        => 'Full-time',
                'sector'      => 'Education & Training',
                'is_active'   => true,
                'order'       => 6,
            ],
        ];

        foreach ($positions as $pos) {
            JobPosition::updateOrCreate(
                ['title' => $pos['title']],
                $pos
            );
        }
    }
}
