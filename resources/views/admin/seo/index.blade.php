@extends('admin.layout')

@section('content')
<div class="header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <div>
        <h1 style="margin: 0; font-size: 1.8rem; font-weight: 700; color: #1e1e2d;">SEO Management & Optimization</h1>
        <p style="margin: 5px 0 0 0; color: #7e8299; font-size: 0.95rem;">Configure meta titles, descriptions, keywords, Open Graph previews, and structured data for each page.</p>
    </div>
    <div style="display: flex; gap: 10px;">
        <a href="{{ route('sitemap') }}" target="_blank" class="btn" style="background: rgba(61, 129, 195, 0.1); color: var(--admin-primary); border: 1px solid var(--admin-primary); display: inline-flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-sitemap"></i> View XML Sitemap
        </a>
        <a href="https://search.google.com/test/rich-results" target="_blank" class="btn" style="background: rgba(43, 178, 149, 0.1); color: var(--admin-secondary); border: 1px solid var(--admin-secondary); display: inline-flex; align-items: center; gap: 8px;">
            <i class="fa-brands fa-google"></i> Rich Results Test
        </a>
    </div>
</div>

<!-- Page Selection Tabs -->
<div style="background: white; border-radius: 10px; padding: 15px; margin-bottom: 25px; box-shadow: 0 0 20px 0 rgba(76, 87, 125, 0.05); display: flex; flex-wrap: wrap; gap: 10px; align-items: center;">
    <span style="font-weight: 600; color: #3F4254; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; margin-right: 5px;">
        <i class="fa-solid fa-file-code" style="color: var(--admin-primary); margin-right: 4px;"></i> Select Page:
    </span>
    @foreach($definedPages as $key => $page)
        @php
            $hasCustomSeo = isset($seoSettings[$key]) && (!empty($seoSettings[$key]->meta_title) || !empty($seoSettings[$key]->meta_keywords));
            $isActive = $activePageKey === $key;
        @endphp
        <a href="{{ route('admin.seo.index', ['page' => $key]) }}" 
           style="text-decoration: none; padding: 8px 16px; border-radius: 20px; font-size: 0.9rem; font-weight: 600; transition: all 0.2s; display: inline-flex; align-items: center; gap: 8px; {{ $isActive ? 'background: var(--admin-primary); color: white; box-shadow: 0 4px 10px rgba(61, 129, 195, 0.3);' : 'background: #F3F6F9; color: #5E6278;' }}">
            <span>{{ $page['name'] }}</span>
            @if($hasCustomSeo)
                <span style="width: 8px; height: 8px; border-radius: 50%; background: {{ $isActive ? '#ffffff' : '#50CD89' }}; display: inline-block;"></span>
            @endif
        </a>
    @endforeach
</div>

@if(isset($errors) && $errors->any())
    <div style="background: #FFF5F8; border-left: 4px solid var(--admin-danger); padding: 15px; border-radius: 6px; margin-bottom: 25px;">
        <h4 style="color: var(--admin-danger); margin: 0 0 8px 0; font-size: 1rem;">Please fix the following validation errors:</h4>
        <ul style="margin: 0; padding-left: 20px; color: #7e8299; font-size: 0.9rem;">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="display: grid; grid-template-columns: 1.4fr 1fr; gap: 25px; align-items: start;">
    
    <!-- LEFT: Form Settings -->
    <div class="card" style="background: white; border-radius: 10px; padding: 25px; box-shadow: 0 0 20px 0 rgba(76, 87, 125, 0.05);">
        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #EFF2F5; padding-bottom: 15px; margin-bottom: 20px;">
            <div>
                <h3 style="margin: 0; font-size: 1.25rem; font-weight: 700; color: #1e1e2d;">
                    {{ $definedPages[$activePageKey]['name'] }} SEO Settings
                </h3>
                <span style="font-size: 0.85rem; color: #7e8299;">
                    {{ $definedPages[$activePageKey]['description'] }} 
                    @if($definedPages[$activePageKey]['url'])
                        &bull; Target URL: <code style="background: #f1f3f6; padding: 2px 6px; border-radius: 4px; color: var(--admin-primary);">{{ $definedPages[$activePageKey]['url'] }}</code>
                    @endif
                </span>
            </div>
            @if($definedPages[$activePageKey]['url'])
                <a href="{{ url($definedPages[$activePageKey]['url']) }}" target="_blank" style="font-size: 0.85rem; color: var(--admin-primary); text-decoration: none; font-weight: 600;">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> Preview Page
                </a>
            @endif
        </div>

        <form action="{{ route('admin.seo.update', $activePageKey) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Section: Core Meta -->
            <div style="margin-bottom: 25px;">
                <h4 style="font-size: 1rem; font-weight: 600; color: #3F4254; margin: 0 0 15px 0; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-magnifying-glass" style="color: var(--admin-primary);"></i> Search Engine Snippet
                </h4>

                <!-- Meta Title -->
                <div class="form-group" style="margin-bottom: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                        <label style="font-weight: 600; color: #3F4254; font-size: 0.9rem;">Meta Title</label>
                        <span id="titleCounter" style="font-size: 0.8rem; font-weight: 600; color: #7e8299;">0 / 60 chars</span>
                    </div>
                    <input type="text" id="metaTitleInput" name="meta_title" 
                           value="{{ old('meta_title', $activeSeo->meta_title ?? '') }}" 
                           placeholder="e.g. Bayan Group | Digital Innovation & Business Solutions"
                           style="width: 100%; padding: 12px 14px; border: 1px solid #E4E6EF; border-radius: 6px; font-size: 0.95rem;"
                           required>
                    <small style="color: #7e8299; font-size: 0.8rem; display: block; margin-top: 5px;">
                        Recommended: 50-60 characters. Appears as the clickable title in Google search results.
                    </small>
                </div>

                <!-- Meta Description -->
                <div class="form-group" style="margin-bottom: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                        <label style="font-weight: 600; color: #3F4254; font-size: 0.9rem;">Meta Description</label>
                        <span id="descCounter" style="font-size: 0.8rem; font-weight: 600; color: #7e8299;">0 / 160 chars</span>
                    </div>
                    <textarea id="metaDescInput" name="meta_description" rows="3" 
                              placeholder="Provide a compelling, concise summary of this page to drive search click-throughs..."
                              style="width: 100%; padding: 12px 14px; border: 1px solid #E4E6EF; border-radius: 6px; font-size: 0.95rem; line-height: 1.5;">{{ old('meta_description', $activeSeo->meta_description ?? '') }}</textarea>
                    <small style="color: #7e8299; font-size: 0.8rem; display: block; margin-top: 5px;">
                        Recommended: 120-160 characters. Search engines show this snippet beneath the title.
                    </small>
                </div>

                <!-- Meta Keywords -->
                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="font-weight: 600; color: #3F4254; font-size: 0.9rem; margin-bottom: 6px; display: block;">
                        Meta Keywords (Comma separated)
                    </label>
                    <input type="text" id="metaKeywordsInput" name="meta_keywords" 
                           value="{{ old('meta_keywords', $activeSeo->meta_keywords ?? '') }}" 
                           placeholder="e.g. digital innovation, business solutions, Bayan Group, technology consulting"
                           style="width: 100%; padding: 12px 14px; border: 1px solid #E4E6EF; border-radius: 6px; font-size: 0.95rem;">
                    
                    <div id="keywordsBadges" style="display: flex; flex-wrap: wrap; gap: 6px; margin-top: 10px;"></div>
                    
                    <small style="color: #7e8299; font-size: 0.8rem; display: block; margin-top: 5px;">
                        Enter relevant keywords separated by commas. These will be added to the <code>&lt;meta name="keywords"&gt;</code> tag.
                    </small>
                </div>

                <!-- Canonical URL & Robots -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                    <div class="form-group">
                        <label style="font-weight: 600; color: #3F4254; font-size: 0.9rem; margin-bottom: 6px; display: block;">
                            Canonical URL (Optional)
                        </label>
                        <input type="url" name="canonical_url" 
                               value="{{ old('canonical_url', $activeSeo->canonical_url ?? '') }}" 
                               placeholder="{{ $definedPages[$activePageKey]['url'] ? url($definedPages[$activePageKey]['url']) : url('/') }}"
                               style="width: 100%; padding: 10px 12px; border: 1px solid #E4E6EF; border-radius: 6px; font-size: 0.9rem;">
                        <small style="color: #7e8299; font-size: 0.75rem; display: block; margin-top: 4px;">Leave blank to use default page URL.</small>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: 600; color: #3F4254; font-size: 0.9rem; margin-bottom: 6px; display: block;">
                            Robots Directives
                        </label>
                        <select name="robots" style="width: 100%; padding: 10px 12px; border: 1px solid #E4E6EF; border-radius: 6px; font-size: 0.9rem; background: white;">
                            <option value="index, follow" {{ old('robots', $activeSeo->robots ?? 'index, follow') == 'index, follow' ? 'selected' : '' }}>index, follow (Standard / Recommended)</option>
                            <option value="noindex, follow" {{ old('robots', $activeSeo->robots ?? '') == 'noindex, follow' ? 'selected' : '' }}>noindex, follow (Do not index page, but follow links)</option>
                            <option value="index, nofollow" {{ old('robots', $activeSeo->robots ?? '') == 'index, nofollow' ? 'selected' : '' }}>index, nofollow (Index page, do not follow links)</option>
                            <option value="noindex, nofollow" {{ old('robots', $activeSeo->robots ?? '') == 'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow (Strict private / Hidden)</option>
                        </select>
                    </div>
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid #EFF2F5; margin: 25px 0;">

            <!-- Section: Open Graph & Social Sharing -->
            <div style="margin-bottom: 25px;">
                <h4 style="font-size: 1rem; font-weight: 600; color: #3F4254; margin: 0 0 15px 0; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-share-nodes" style="color: var(--admin-secondary);"></i> Social Sharing (Open Graph / Twitter Card)
                </h4>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="font-weight: 600; color: #3F4254; font-size: 0.9rem; margin-bottom: 6px; display: block;">
                        OG Title (Social Media Title)
                    </label>
                    <input type="text" id="ogTitleInput" name="og_title" 
                           value="{{ old('og_title', $activeSeo->og_title ?? '') }}" 
                           placeholder="Leave empty to use Meta Title above"
                           style="width: 100%; padding: 10px 12px; border: 1px solid #E4E6EF; border-radius: 6px; font-size: 0.9rem;">
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="font-weight: 600; color: #3F4254; font-size: 0.9rem; margin-bottom: 6px; display: block;">
                        OG Description (Social Media Excerpt)
                    </label>
                    <textarea id="ogDescInput" name="og_description" rows="2" 
                              placeholder="Leave empty to use Meta Description above"
                              style="width: 100%; padding: 10px 12px; border: 1px solid #E4E6EF; border-radius: 6px; font-size: 0.9rem;">{{ old('og_description', $activeSeo->og_description ?? '') }}</textarea>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="font-weight: 600; color: #3F4254; font-size: 0.9rem; margin-bottom: 6px; display: block;">
                        Social Share Banner Image (1200x630 recommended)
                    </label>
                    <input type="file" name="og_image" id="ogImageInput" accept="image/*" style="display: block; margin-bottom: 10px;">
                    @if(!empty($activeSeo->og_image))
                        <div style="display: flex; align-items: center; gap: 15px; background: #f8fafc; padding: 10px; border-radius: 6px; border: 1px solid #e2e8f0;">
                            <img id="ogPreviewImage" src="{{ asset('storage/' . $activeSeo->og_image) }}" alt="OG Preview" style="width: 120px; height: 63px; object-fit: cover; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                            <div>
                                <span style="font-size: 0.85rem; font-weight: 600; color: #3F4254; display: block;">Current Active Banner</span>
                                <span style="font-size: 0.75rem; color: #7e8299;">{{ $activeSeo->og_image }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <hr style="border: 0; border-top: 1px solid #EFF2F5; margin: 25px 0;">

            <!-- Section: JSON-LD Schema Markup -->
            <div style="margin-bottom: 25px;">
                <h4 style="font-size: 1rem; font-weight: 600; color: #3F4254; margin: 0 0 10px 0; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-code" style="color: #69707a;"></i> Custom Structured Data (JSON-LD)
                </h4>
                <p style="font-size: 0.8rem; color: #7e8299; margin: 0 0 10px 0;">
                    Optional: Insert custom Schema.org JSON-LD (e.g. <code>&lt;script type="application/ld+json"&gt;...&lt;/script&gt;</code> or raw JSON object). Standard Organization & Website schemas are generated automatically.
                </p>
                <textarea name="schema_markup" rows="4" 
                          placeholder='{ "@context": "https://schema.org", "@type": "WebPage", "name": "{{ $definedPages[$activePageKey]['name'] }}" }'
                          style="width: 100%; font-family: monospace; font-size: 0.85rem; padding: 10px 12px; border: 1px solid #E4E6EF; border-radius: 6px; background: #fdfdfd;">{{ old('schema_markup', $activeSeo->schema_markup ?? '') }}</textarea>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 30px;">
                <button type="submit" class="btn" style="background: var(--admin-primary); color: white; padding: 12px 28px; border-radius: 6px; font-weight: 600; font-size: 0.95rem; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(61, 129, 195, 0.25);">
                    <i class="fa-solid fa-floppy-disk"></i> Save SEO Settings
                </button>
            </div>
        </form>
    </div>

    <!-- RIGHT: Live Previews & SEO Health -->
    <div style="display: flex; flex-direction: column; gap: 25px; position: sticky; top: 90px;">
        
        <!-- Google Search Result Preview -->
        <div class="card" style="background: white; border-radius: 10px; padding: 20px; box-shadow: 0 0 20px 0 rgba(76, 87, 125, 0.05);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <h4 style="margin: 0; font-size: 0.95rem; font-weight: 700; color: #1e1e2d; display: flex; align-items: center; gap: 6px;">
                    <i class="fa-brands fa-google" style="color: #4285F4;"></i> Google SERP Preview
                </h4>
                <span style="font-size: 0.75rem; background: #E8F0FE; color: #1A73E8; padding: 2px 8px; border-radius: 12px; font-weight: 600;">Live Simulation</span>
            </div>

            <!-- Google Snippet Box -->
            <div style="background: #ffffff; border: 1px solid #dfe1e5; border-radius: 8px; padding: 16px; font-family: Roboto, Arial, sans-serif;">
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px;">
                    <div style="width: 24px; height: 24px; border-radius: 50%; background: #f1f3f4; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: bold; color: #3D81C3;">BG</div>
                    <div style="display: flex; flex-direction: column;">
                        <span style="font-size: 13px; color: #202124; line-height: 1.2;">Bayan Group</span>
                        <span id="serpUrl" style="font-size: 12px; color: #4d5156; line-height: 1.2;">
                            {{ $definedPages[$activePageKey]['url'] ? url($definedPages[$activePageKey]['url']) : url('/') }}
                        </span>
                    </div>
                </div>

                <div id="serpTitle" style="color: #1a0dab; font-size: 18px; line-height: 1.3; font-weight: 400; cursor: pointer; margin-bottom: 6px; word-break: break-word;">
                    {{ $activeSeo->meta_title ?? 'Bayan Group | Digital Innovation & Business Solutions' }}
                </div>

                <div id="serpSnippet" style="color: #4d5156; font-size: 14px; line-height: 1.58; word-break: break-word;">
                    {{ $activeSeo->meta_description ?? 'Bayan Group empowers organizations across the Middle East with integrated business solutions.' }}
                </div>
            </div>
        </div>

        <!-- Social Media Card Preview -->
        <div class="card" style="background: white; border-radius: 10px; padding: 20px; box-shadow: 0 0 20px 0 rgba(76, 87, 125, 0.05);">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                <h4 style="margin: 0; font-size: 0.95rem; font-weight: 700; color: #1e1e2d; display: flex; align-items: center; gap: 6px;">
                    <i class="fa-brands fa-linkedin" style="color: #0077B5;"></i> Social Share Card Preview
                </h4>
                <span style="font-size: 0.75rem; background: #e6f3ff; color: #0077b5; padding: 2px 8px; border-radius: 12px; font-weight: 600;">Open Graph</span>
            </div>

            <!-- Social Card Box -->
            <div style="border: 1px solid #e1e8ed; border-radius: 8px; overflow: hidden; background: #ffffff;">
                <div style="height: 140px; background: #edf2f7; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                    @if(!empty($activeSeo->og_image))
                        <img id="socialCardImage" src="{{ asset('storage/' . $activeSeo->og_image) }}" alt="Social Preview" style="width: 100%; height: 100%; object-fit: cover;">
                    @elseif(!empty($global_settings['site_logo']))
                        <img id="socialCardImage" src="{{ asset('storage/' . $global_settings['site_logo']) }}" alt="Social Preview" style="max-height: 80px; object-fit: contain;">
                    @else
                        <div id="socialCardImage" style="color: #a0aec0; text-align: center;">
                            <i class="fa-solid fa-image" style="font-size: 2rem; margin-bottom: 4px;"></i>
                            <div style="font-size: 0.8rem;">1200 x 630 Banner</div>
                        </div>
                    @endif
                </div>
                <div style="padding: 12px;">
                    <span style="font-size: 0.75rem; text-transform: uppercase; color: #8899a6; font-weight: 600; letter-spacing: 0.5px;">{{ parse_url(url('/'), PHP_URL_HOST) ?? 'bayangroup.net' }}</span>
                    <h5 id="socialCardTitle" style="margin: 4px 0 6px 0; font-size: 0.95rem; font-weight: 700; color: #14171a; line-height: 1.3;">
                        {{ ($activeSeo->og_title ?? null) ?: ($activeSeo->meta_title ?? 'Bayan Group') }}
                    </h5>
                    <p id="socialCardDesc" style="margin: 0; font-size: 0.82rem; color: #657786; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                        {{ ($activeSeo->og_description ?? null) ?: ($activeSeo->meta_description ?? 'Bayan Group empowers organizations with business solutions.') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- SEO Health Checklist -->
        <div class="card" style="background: white; border-radius: 10px; padding: 20px; box-shadow: 0 0 20px 0 rgba(76, 87, 125, 0.05);">
            <h4 style="margin: 0 0 15px 0; font-size: 0.95rem; font-weight: 700; color: #1e1e2d; display: flex; align-items: center; gap: 6px;">
                <i class="fa-solid fa-shield-halved" style="color: var(--admin-success);"></i> Optimization Checklist
            </h4>
            <div style="display: flex; flex-direction: column; gap: 10px; font-size: 0.85rem;">
                <div id="checkTitle" style="display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-circle-check" style="color: #50CD89;"></i>
                    <span>Title length optimal (40 - 60 chars)</span>
                </div>
                <div id="checkDesc" style="display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-circle-check" style="color: #50CD89;"></i>
                    <span>Description length optimal (120 - 160 chars)</span>
                </div>
                <div id="checkKeywords" style="display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-circle-check" style="color: #50CD89;"></i>
                    <span>Target keywords specified</span>
                </div>
                <div id="checkRobots" style="display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-circle-check" style="color: #50CD89;"></i>
                    <span>Indexable by search engines</span>
                </div>
                <div id="checkSocial" style="display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-circle-check" style="color: #50CD89;"></i>
                    <span>Social share tags active</span>
                </div>
            </div>
        </div>

    </div>

</div>

@push('scripts')
<script>
document:DOMContentLoaded;
(function() {
    const titleInput = document.getElementById('metaTitleInput');
    const descInput = document.getElementById('metaDescInput');
    const keywordsInput = document.getElementById('metaKeywordsInput');
    const ogTitleInput = document.getElementById('ogTitleInput');
    const ogDescInput = document.getElementById('ogDescInput');
    const ogImageInput = document.getElementById('ogImageInput');

    const serpTitle = document.getElementById('serpTitle');
    const serpSnippet = document.getElementById('serpSnippet');
    const socialTitle = document.getElementById('socialCardTitle');
    const socialDesc = document.getElementById('socialCardDesc');
    const titleCounter = document.getElementById('titleCounter');
    const descCounter = document.getElementById('descCounter');
    const keywordsBadges = document.getElementById('keywordsBadges');

    const checkTitle = document.getElementById('checkTitle');
    const checkDesc = document.getElementById('checkDesc');
    const checkKeywords = document.getElementById('checkKeywords');

    function updateTitle() {
        const val = titleInput.value.trim();
        const len = val.length;
        titleCounter.textContent = `${len} / 60 chars`;
        if (len >= 40 && len <= 60) {
            titleCounter.style.color = '#50CD89';
            checkTitle.innerHTML = '<i class="fa-solid fa-circle-check" style="color: #50CD89;"></i> <span>Title length optimal (' + len + ' chars)</span>';
        } else if (len > 60) {
            titleCounter.style.color = '#F1416C';
            checkTitle.innerHTML = '<i class="fa-solid fa-circle-exclamation" style="color: #F1416C;"></i> <span>Title is too long (' + len + ' chars, may be truncated in SERP)</span>';
        } else {
            titleCounter.style.color = '#FFA800';
            checkTitle.innerHTML = '<i class="fa-solid fa-circle-exclamation" style="color: #FFA800;"></i> <span>Title is short (' + len + ' chars, aim for 40-60)</span>';
        }

        serpTitle.textContent = val || 'Bayan Group | Digital Innovation & Business Solutions';
        if (!ogTitleInput.value.trim()) {
            socialTitle.textContent = val || 'Bayan Group';
        }
    }

    function updateDesc() {
        const val = descInput.value.trim();
        const len = val.length;
        descCounter.textContent = `${len} / 160 chars`;
        if (len >= 120 && len <= 160) {
            descCounter.style.color = '#50CD89';
            checkDesc.innerHTML = '<i class="fa-solid fa-circle-check" style="color: #50CD89;"></i> <span>Description length optimal (' + len + ' chars)</span>';
        } else if (len > 160) {
            descCounter.style.color = '#F1416C';
            checkDesc.innerHTML = '<i class="fa-solid fa-circle-exclamation" style="color: #F1416C;"></i> <span>Description is too long (' + len + ' chars, may be truncated in SERP)</span>';
        } else {
            descCounter.style.color = '#FFA800';
            checkDesc.innerHTML = '<i class="fa-solid fa-circle-exclamation" style="color: #FFA800;"></i> <span>Description is short (' + len + ' chars, aim for 120-160)</span>';
        }

        serpSnippet.textContent = val || 'Bayan Group empowers organizations across the Middle East with integrated business solutions.';
        if (!ogDescInput.value.trim()) {
            socialDesc.textContent = val || 'Bayan Group empowers organizations with business solutions.';
        }
    }

    function updateKeywords() {
        const val = keywordsInput.value.trim();
        keywordsBadges.innerHTML = '';
        if (val) {
            const list = val.split(',').map(s => s.trim()).filter(s => s.length > 0);
            list.forEach(kw => {
                const badge = document.createElement('span');
                badge.style.cssText = 'background: #EBF4FF; color: #3D81C3; font-size: 0.75rem; padding: 3px 8px; border-radius: 12px; font-weight: 600; display: inline-flex; align-items: center; gap: 4px;';
                badge.innerHTML = `<i class="fa-solid fa-tag" style="font-size: 0.7rem;"></i> ${kw}`;
                keywordsBadges.appendChild(badge);
            });
            checkKeywords.innerHTML = `<i class="fa-solid fa-circle-check" style="color: #50CD89;"></i> <span>${list.length} target keyword(s) specified</span>`;
        } else {
            checkKeywords.innerHTML = '<i class="fa-solid fa-circle-exclamation" style="color: #FFA800;"></i> <span>No meta keywords specified</span>';
        }
    }

    titleInput.addEventListener('input', updateTitle);
    descInput.addEventListener('input', updateDesc);
    keywordsInput.addEventListener('input', updateKeywords);

    ogTitleInput.addEventListener('input', function() {
        socialTitle.textContent = this.value.trim() || titleInput.value.trim() || 'Bayan Group';
    });

    ogDescInput.addEventListener('input', function() {
        socialDesc.textContent = this.value.trim() || descInput.value.trim() || 'Bayan Group empowers organizations with business solutions.';
    });

    // Image preview when file selected
    if (ogImageInput) {
        ogImageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const socialCardImg = document.getElementById('socialCardImage');
                    if (socialCardImg && socialCardImg.tagName === 'IMG') {
                        socialCardImg.src = e.target.result;
                    } else if (socialCardImg) {
                        socialCardImg.outerHTML = `<img id="socialCardImage" src="${e.target.result}" alt="Social Preview" style="width: 100%; height: 100%; object-fit: cover;">`;
                    }
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    }

    // Initialize
    updateTitle();
    updateDesc();
    updateKeywords();
})();
</script>
@endpush
@endsection
