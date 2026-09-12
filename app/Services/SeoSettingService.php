<?php

namespace App\Services;

use App\Repositories\SeoSettingRepository;
use App\Models\SeoSetting;
use Illuminate\Support\Facades\Storage;

class SeoSettingService extends BaseService
{
    protected $seoRepository;

    public function __construct(SeoSettingRepository $repository)
    {
        parent::__construct($repository);
        $this->seoRepository = $repository;
    }

    public function getAllMapped()
    {
        return SeoSetting::all()->keyBy('page_key');
    }

    public function getByPageKey(string $pageKey)
    {
        return $this->seoRepository->getByPageKey($pageKey);
    }

    public function updatePageSeo(string $pageKey, array $data, $ogImageFile = null)
    {
        if ($ogImageFile) {
            $path = $ogImageFile->store('seo', 'public');
            $data['og_image'] = $path;
            if (empty($data['twitter_image'])) {
                $data['twitter_image'] = $path;
            }
        }

        return SeoSetting::updateOrCreate(
            ['page_key' => $pageKey],
            $data
        );
    }

    public function getDefinedPages()
    {
        return [
            'home' => [
                'name' => 'Home Page',
                'route' => 'home',
                'url' => '/',
                'description' => 'Main landing page for Bayan Group'
            ],
            'about' => [
                'name' => 'About Us',
                'route' => 'about',
                'url' => '/about-us',
                'description' => 'Company background, vision, leadership & story'
            ],
            'sectors_brands' => [
                'name' => 'Sectors & Brands',
                'route' => 'sectors.brands',
                'url' => '/sectors-brands',
                'description' => 'Bayan Group sectors, subsidiaries, and brands'
            ],
            'services' => [
                'name' => 'Services',
                'route' => 'services.page',
                'url' => '/services',
                'description' => 'Comprehensive business, technology and communication services'
            ],
            'portfolio' => [
                'name' => 'Portfolio & Case Studies',
                'route' => 'portfolio',
                'url' => '/portfolio',
                'description' => 'Showcase of delivered client projects and achievements'
            ],
            'blog' => [
                'name' => 'Blog & Insights',
                'route' => 'blog',
                'url' => '/blog',
                'description' => 'Articles, thought leadership, and corporate insights'
            ],
            'careers' => [
                'name' => 'Careers',
                'route' => 'careers',
                'url' => '/careers',
                'description' => 'Career opportunities and joining the Bayan team'
            ],
            'contact' => [
                'name' => 'Contact Us',
                'route' => 'contact',
                'url' => '/contact-us',
                'description' => 'Get in touch with regional offices and inquiry form'
            ],
            'terms' => [
                'name' => 'Terms & Conditions',
                'route' => 'terms',
                'url' => '/terms-and-conditions',
                'description' => 'Terms and conditions governing site use and digital services'
            ],
            'privacy' => [
                'name' => 'Privacy Policy',
                'route' => 'privacy',
                'url' => '/privacy-policy',
                'description' => 'Privacy policy and data processing information'
            ],
            'global' => [
                'name' => 'Global Defaults',
                'route' => null,
                'url' => null,
                'description' => 'Fallback SEO defaults applied when a page has no custom metadata'
            ],
        ];
    }
}
