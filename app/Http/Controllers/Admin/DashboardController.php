<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ContactMessageService;
use App\Services\ClientService;
use App\Services\ClientTestimonialService;
use App\Services\SectorService;
use App\Services\CaseStudyService;
use App\Services\BrandService;
use App\Services\AppServiceService;
use App\Services\TeamMemberService;
use App\Services\UserService;
use App\Services\BlogCategoryService;
use App\Services\BlogService;
use App\Services\ChatbotQuestionService;

class DashboardController extends Controller
{
    protected $contactMessageService;
    protected $clientService;
    protected $clientTestimonialService;
    protected $sectorService;
    protected $caseStudyService;
    protected $brandService;
    protected $appServiceService;
    protected $teamMemberService;
    protected $userService;
    protected $blogCategoryService;
    protected $blogService;
    protected $chatbotQuestionService;

    public function __construct(
        ContactMessageService $contactMessageService,
        ClientService $clientService,
        ClientTestimonialService $clientTestimonialService,
        SectorService $sectorService,
        CaseStudyService $caseStudyService,
        BrandService $brandService,
        AppServiceService $appServiceService,
        TeamMemberService $teamMemberService,
        UserService $userService,
        BlogCategoryService $blogCategoryService,
        BlogService $blogService,
        ChatbotQuestionService $chatbotQuestionService
    ) {
        $this->contactMessageService = $contactMessageService;
        $this->clientService = $clientService;
        $this->clientTestimonialService = $clientTestimonialService;
        $this->sectorService = $sectorService;
        $this->caseStudyService = $caseStudyService;
        $this->brandService = $brandService;
        $this->appServiceService = $appServiceService;
        $this->teamMemberService = $teamMemberService;
        $this->userService = $userService;
        $this->blogCategoryService = $blogCategoryService;
        $this->blogService = $blogService;
        $this->chatbotQuestionService = $chatbotQuestionService;
    }

    public function index()
    {
        $recentMessages = $this->contactMessageService->getLatest(5);
        
        $stats = [
            'Clients' => $this->clientService->count(),
            'Testimonials' => $this->clientTestimonialService->count(),
            'Sectors' => $this->sectorService->count(),
            'Case Studies' => $this->caseStudyService->count(),
            'Brands' => $this->brandService->count(),
            'Services' => $this->appServiceService->count(),
            'Team Members' => $this->teamMemberService->count(),
            'Users' => $this->userService->count(),
            'Blog Categories' => $this->blogCategoryService->count(),
            'Blogs' => $this->blogService->count(),
            'Messages' => $this->contactMessageService->count(),
            'Chatbot FAQs' => $this->chatbotQuestionService->count(),
        ];

        return view('admin.dashboard', compact('recentMessages', 'stats'));
    }
}
