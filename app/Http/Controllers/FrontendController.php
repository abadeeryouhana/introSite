<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;
use App\Services\SectorService;
use App\Services\AppServiceService;
use App\Services\TeamMemberService;
use App\Services\ContactMessageService;
use App\Services\BlogService;
use App\Services\BlogCategoryService;
use App\Services\ClientTestimonialService;
use App\Services\CaseStudyService;
use App\Services\CountryService;
use App\Services\JobPositionService;
use App\Services\JobApplicationService;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    protected $clientService;
    protected $sectorService;
    protected $appServiceService;
    protected $teamMemberService;
    protected $contactMessageService;
    protected $blogService;
    protected $blogCategoryService;
    protected $clientTestimonialService;
    protected $caseStudyService;
    protected $countryService;
    protected $jobPositionService;
    protected $jobApplicationService;

    public function __construct(
        ClientService $clientService,
        SectorService $sectorService,
        AppServiceService $appServiceService,
        TeamMemberService $teamMemberService,
        ContactMessageService $contactMessageService,
        BlogService $blogService,
        BlogCategoryService $blogCategoryService,
        ClientTestimonialService $clientTestimonialService,
        CaseStudyService $caseStudyService,
        CountryService $countryService,
        JobPositionService $jobPositionService,
        JobApplicationService $jobApplicationService
    ) {
        $this->clientService = $clientService;
        $this->sectorService = $sectorService;
        $this->appServiceService = $appServiceService;
        $this->teamMemberService = $teamMemberService;
        $this->contactMessageService = $contactMessageService;
        $this->blogService = $blogService;
        $this->blogCategoryService = $blogCategoryService;
        $this->clientTestimonialService = $clientTestimonialService;
        $this->caseStudyService = $caseStudyService;
        $this->countryService = $countryService;
        $this->jobPositionService = $jobPositionService;
        $this->jobApplicationService = $jobApplicationService;
    }

    public function home()
    {
        $sectors = $this->sectorService->getAll(['brands'])->take(5);
        $services = $this->appServiceService->getOrdered('order', 'asc', 10);
        $clients = $this->clientService->getOrdered('order', 'asc');
        $caseStudies = $this->caseStudyService->getOrdered('order', 'asc', 4, ['sector']);
        $latestBlogs = $this->blogService->getLatest(3, ['category']);
        $testimonials = $this->clientTestimonialService->getLatest(null, ['client']);
        return view('home', compact('sectors', 'services', 'clients', 'caseStudies', 'latestBlogs', 'testimonials'));
    }

    public function sectorsBrands()
    {
        $sectors = $this->sectorService->getAll(['brands']);
        return view('sectors_brands', compact('sectors'));
    }

    public function portfolio()
    {
        $sectors = $this->sectorService->getHas('caseStudies');
        $caseStudies = $this->caseStudyService->getOrdered('order', 'asc', null, ['sector']);
        return view('portfolio', compact('sectors', 'caseStudies'));
    }

    public function about()
    {
        $team = $this->teamMemberService->getOrdered('order', 'asc');
        $clients = $this->clientService->getOrdered('order', 'asc');
        $testimonials = $this->clientTestimonialService->getLatest(null, ['client']);
        return view('about', compact('team', 'clients', 'testimonials'));
    }

    public function services()
    {
        $services = $this->appServiceService->getOrdered('order', 'asc');
        return view('services', compact('services'));
    }

    public function contact()
    {
        $services = $this->appServiceService->getOrdered('order', 'asc');
        $countries = $this->countryService->getOrdered('name', 'asc');
        return view('contact', compact('services', 'countries'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'country' => 'nullable|string|max:255',
            'country_code' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:500',
            'title' => 'nullable|string|max:500',
            'service' => 'nullable|string|max:500',
            'message' => 'required|string'
        ]);

        $this->contactMessageService->create($validated);
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully.');
    }

    public function blog()
    {
        $categories = $this->blogCategoryService->getHas('blogs');
        $blogs = $this->blogService->getLatest(null, ['category']);
        return view('blog', compact('categories', 'blogs'));
    }

    public function blogDetails($id)
    {
        $blog = $this->blogService->getById($id, ['category']);
        return view('blog_details', compact('blog'));
    }

    public function careers()
    {
        $positions = $this->jobPositionService->getActive();
        $countries = $this->countryService->getOrdered('name', 'asc');
        $sectors   = $positions->pluck('sector')->filter()->unique()->values();
        return view('careers', compact('positions', 'countries', 'sectors'));
    }

    public function submitCareerApplication(Request $request)
    {
        $validated = $request->validate([
            'full_name'       => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'country'         => 'nullable|string|max:255',
            'country_code'    => 'nullable|string|max:20',
            'phone'           => 'nullable|string|max:50',
            'subject'         => 'required|string|max:255',
            'message'         => 'nullable|string',
            'job_position_id' => 'nullable|exists:job_positions,id',
            'cv'              => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        if ($request->hasFile('cv')) {
            $validated['cv_path'] = $request->file('cv')->store('cvs', 'public');
        }
        unset($validated['cv']);

        $this->jobApplicationService->create($validated);
        return redirect()->route('careers')->with('success', 'Your application has been submitted successfully. We will be in touch soon!');
    }

    public function terms()
    {
        return view('terms');
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function sitemap()
    {
        $baseUrl = url('/');
        $staticPages = [
            ['url' => route('home'),           'priority' => '1.0', 'changefreq' => 'daily',   'lastmod' => date('Y-m-d')],
            ['url' => route('about'),          'priority' => '0.8', 'changefreq' => 'weekly',  'lastmod' => date('Y-m-d')],
            ['url' => route('sectors.brands'), 'priority' => '0.8', 'changefreq' => 'weekly',  'lastmod' => date('Y-m-d')],
            ['url' => route('services.page'),  'priority' => '0.8', 'changefreq' => 'weekly',  'lastmod' => date('Y-m-d')],
            ['url' => route('portfolio'),      'priority' => '0.8', 'changefreq' => 'weekly',  'lastmod' => date('Y-m-d')],
            ['url' => route('blog'),           'priority' => '0.8', 'changefreq' => 'daily',   'lastmod' => date('Y-m-d')],
            ['url' => route('careers'),        'priority' => '0.7', 'changefreq' => 'weekly',  'lastmod' => date('Y-m-d')],
            ['url' => route('contact'),        'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => date('Y-m-d')],
            ['url' => route('terms'),          'priority' => '0.5', 'changefreq' => 'monthly', 'lastmod' => date('Y-m-d')],
            ['url' => route('privacy'),        'priority' => '0.5', 'changefreq' => 'monthly', 'lastmod' => date('Y-m-d')],
        ];

        $blogs = \App\Models\Blog::all();

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($staticPages as $page) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($page['url']) . '</loc>';
            $xml .= '<lastmod>' . $page['lastmod'] . '</lastmod>';
            $xml .= '<changefreq>' . $page['changefreq'] . '</changefreq>';
            $xml .= '<priority>' . $page['priority'] . '</priority>';
            $xml .= '</url>';
        }

        foreach ($blogs as $blog) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars(route('blog.details', $blog->id)) . '</loc>';
            $xml .= '<lastmod>' . $blog->updated_at->format('Y-m-d') . '</lastmod>';
            $xml .= '<changefreq>monthly</changefreq>';
            $xml .= '<priority>0.6</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}
