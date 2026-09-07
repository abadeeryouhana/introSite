<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Models\SocialLink;

class SocialLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialLinks = [
            [
                'platform' => 'Facebook',
                'url'      => 'https://www.facebook.com/globalbayan',
                'keys'     => ['social_facebook', 'facebook'],
            ],
            [
                'platform' => 'Instagram',
                'url'      => 'https://www.instagram.com/globalbayan/',
                'keys'     => ['social_instagram', 'instagram'],
            ],
            [
                'platform' => 'X',
                'url'      => 'https://x.com/globalbayan',
                'keys'     => ['social_x', 'x', 'social_twitter', 'twitter'],
            ],
            [
                'platform' => 'LinkedIn',
                'url'      => 'https://www.linkedin.com/company/globalbayan',
                'keys'     => ['social_linkedin', 'linkedin'],
            ],
            [
                'platform' => 'YouTube',
                'url'      => 'https://www.youtube.com/@globalbayan',
                'keys'     => ['social_youtube', 'youtube'],
            ],
            [
                'platform' => 'TikTok',
                'url'      => 'https://www.tiktok.com/@globalbayan',
                'keys'     => ['social_tiktok', 'tiktok'],
            ],
            [
                'platform' => 'Snapchat',
                'url'      => 'https://www.snapchat.com/@globalbayan',
                'keys'     => ['social_snapchat', 'snapchat'],
            ],
            [
                'platform' => 'Telegram',
                'url'      => 'https://t.me/globalbayan',
                'keys'     => ['social_telegram', 'telegram'],
            ],
        ];

        // 1. Seed into settings table
        foreach ($socialLinks as $link) {
            foreach ($link['keys'] as $key) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $link['url']]
                );
            }
        }

        // 2. Seed into social_links table
        SocialLink::truncate();
        foreach ($socialLinks as $link) {
            SocialLink::create([
                'platform' => $link['platform'],
                'url'      => $link['url'],
            ]);
        }
    }
}
