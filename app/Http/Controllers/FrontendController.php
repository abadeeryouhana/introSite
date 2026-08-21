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

    public function __construct(
        ClientService $clientService,
        SectorService $sectorService,
        AppServiceService $appServiceService,
        TeamMemberService $teamMemberService,
        ContactMessageService $contactMessageService,
        BlogService $blogService,
        BlogCategoryService $blogCategoryService,
        ClientTestimonialService $clientTestimonialService,
        CaseStudyService $caseStudyService
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
    }

    public function home()
    {
        $sectors = $this->sectorService->getAll(['brands'])->take(5);
        $services = $this->appServiceService->getOrdered('order', 'asc', 10);
        $clients = $this->clientService->getOrdered('order', 'asc');
        $caseStudies = $this->caseStudyService->getOrdered('order', 'asc', 4, ['sector']);
        $latestBlogs = $this->blogService->getLatest(4, ['category']);
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
        return view('contact', compact('services'));
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
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
        return view('careers');
    }
}
