<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SeoSettingService;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    protected $seoService;

    public function __construct(SeoSettingService $seoService)
    {
        $this->seoService = $seoService;
    }

    public function index(Request $request)
    {
        $definedPages = $this->seoService->getDefinedPages();
        $seoSettings = $this->seoService->getAllMapped();

        $activePageKey = $request->query('page', 'home');
        if (!array_key_exists($activePageKey, $definedPages)) {
            $activePageKey = 'home';
        }

        $activeSeo = $seoSettings[$activePageKey] ?? null;

        return view('admin.seo.index', compact('definedPages', 'seoSettings', 'activePageKey', 'activeSeo'));
    }

    public function update(Request $request, $pageKey)
    {
        $definedPages = $this->seoService->getDefinedPages();
        if (!array_key_exists($pageKey, $definedPages)) {
            return redirect()->route('admin.seo.index')->with('error', 'Invalid page selected.');
        }

        $request->validate([
            'meta_title'          => 'nullable|string|max:255',
            'meta_description'    => 'nullable|string|max:1000',
            'meta_keywords'       => 'nullable|string|max:1000',
            'canonical_url'       => 'nullable|string|max:500',
            'og_title'            => 'nullable|string|max:255',
            'og_description'      => 'nullable|string|max:1000',
            'og_image'            => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:4096',
            'twitter_title'       => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string|max:1000',
            'robots'              => 'nullable|string|max:100',
            'schema_markup'       => 'nullable|string',
        ]);

        $data = $request->except(['_token', 'og_image']);
        $data['page_name'] = $definedPages[$pageKey]['name'];

        $this->seoService->updatePageSeo($pageKey, $data, $request->file('og_image'));

        return redirect()->route('admin.seo.index', ['page' => $pageKey])
            ->with('success', 'SEO settings for "' . $definedPages[$pageKey]['name'] . '" updated successfully.');
    }
}
