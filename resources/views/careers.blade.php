@extends('layouts.app')

@section('title', 'Careers')

@section('content')
<!-- Careers Hero Section -->
<section class="careers-hero">
    <div class="careers-hero-content">
        <div class="breadcrumbs">
            <a href="{{ route('home') }}">HOME</a> / <span class="current">CAREERS</span>
        </div>
        <div class="section-label">
            CAREERS
        </div>
        <h1>Build your future <span class="highlight">with Bayan.</span></h1>
        <p>We hire specialists who want to do their best work inside an integrated group &mdash;<br>where sectors compound, and careers do too.</p>
    </div>
    <div class="hero-waves"></div>
</section>

<!-- Values Section -->
<section class="careers-values section">
    <div class="container">
        <div class="grid careers-grid">
            <div class="value-card">
                <h3>Global Environment</h3>
                <p>Work with colleagues across Cairo, Muscat, Florida, and remote hubs.</p>
            </div>
            <div class="value-card">
                <h3>Real Growth</h3>
                <p>Structured progression, sponsored certifications, and cross-sector mobility.</p>
            </div>
            <div class="value-card">
                <h3>Meaningful Impact</h3>
                <p>Projects that shape enterprises, governments, and industries.</p>
            </div>
            <div class="value-card">
                <h3>Diverse & United</h3>
                <p>Experts from 69 nationalities. One team. One standard.</p>
            </div>
        </div>
    </div>
</section>

<!-- Bayan As An Employer Section -->
<section class="careers-employer-section">
    <div class="container">
        <div class="careers-employer-grid">
            <div class="careers-employer-content">
                <div class="section-subtitle-tag">BAYAN AS AN EMPLOYER</div>
                <h2 class="employer-title">A career with range, inside one company.</h2>
                <div class="employer-text">
                    <p>Most people have to change employers to change direction. At Bayan Group you don't. A translator can move into localisation strategy. A developer can move from ERP delivery into AI automation. A trainer can move from delivery into curriculum design.</p>
                    <p>Five sectors under one platform means five career directions without ever restarting your seniority, your relationships, or your benefits. That's the single biggest reason people stay with us for years &mdash; and the reason we can offer graduates a path that doesn't dead-end at 30.</p>
                </div>
            </div>
            <div class="careers-employer-image-wrap">
                <img src="{{ asset('images/career-employer.jpg') }}" alt="A career with range, inside one company - Bayan Group" class="careers-employer-img">
            </div>
        </div>
    </div>
</section>

<!-- How You Grow Section -->
<section class="careers-tracks-section">
    <div class="container">
        <div class="section-subtitle-tag">HOW YOU GROW</div>
        <h2 class="tracks-title">Three ways forward &mdash; you choose.</h2>
        <p class="tracks-desc">Progression at Bayan isn't a single ladder. Every track carries equal seniority, equal pay bands, and equal respect.</p>

        <div class="tracks-grid">
            <!-- Track 01 -->
            <div class="track-card">
                <div class="track-number">TRACK 01</div>
                <h3 class="track-name">Deepen &mdash; Specialist</h3>
                <p class="track-summary">Become the person the group turns to in your discipline. Depth is rewarded as highly as management here.</p>
                <ul class="track-points">
                    <li class="track-point-item">
                        <span class="track-bullet">&rarr;</span>
                        <span>Senior Specialist &rarr; Lead Specialist &rarr; Principal</span>
                    </li>
                    <li class="track-point-item">
                        <span class="track-bullet">&rarr;</span>
                        <span>Certification-funded technical progression</span>
                    </li>
                    <li class="track-point-item">
                        <span class="track-bullet">&rarr;</span>
                        <span>Named on client engagements as subject authority</span>
                    </li>
                    <li class="track-point-item">
                        <span class="track-bullet">&rarr;</span>
                        <span>Mentors juniors without managing them</span>
                    </li>
                </ul>
            </div>

            <!-- Track 02 -->
            <div class="track-card">
                <div class="track-number">TRACK 02</div>
                <h3 class="track-name">Lead &mdash; Management</h3>
                <p class="track-summary">Build and run teams. For people who get more satisfaction from a team's output than their own.</p>
                <ul class="track-points">
                    <li class="track-point-item">
                        <span class="track-bullet">&mdash;</span>
                        <span>Team Lead &rarr; Manager &rarr; Sector Head</span>
                    </li>
                    <li class="track-point-item">
                        <span class="track-bullet">&mdash;</span>
                        <span>Formal leadership development via Bayan Academy</span>
                    </li>
                    <li class="track-point-item">
                        <span class="track-bullet">&mdash;</span>
                        <span>P&amp;L and delivery accountability</span>
                    </li>
                    <li class="track-point-item">
                        <span class="track-bullet">&mdash;</span>
                        <span>Hiring and capability planning</span>
                    </li>
                </ul>
            </div>

            <!-- Track 03 -->
            <div class="track-card">
                <div class="track-number">TRACK 03</div>
                <h3 class="track-name">Broaden &mdash; Cross-sector</h3>
                <p class="track-summary">The route that only exists at a group. Move sideways into a new discipline while keeping your seniority.</p>
                <ul class="track-points">
                    <li class="track-point-item">
                        <span class="track-bullet">&mdash;</span>
                        <span>Structured internal transfer programme</span>
                    </li>
                    <li class="track-point-item">
                        <span class="track-bullet">&mdash;</span>
                        <span>3-month supported transition with mentoring</span>
                    </li>
                    <li class="track-point-item">
                        <span class="track-bullet">&mdash;</span>
                        <span>Keeps tenure, benefits, and pay band</span>
                    </li>
                    <li class="track-point-item">
                        <span class="track-bullet">&mdash;</span>
                        <span>Common paths: translation &rarr; localisation strategy, delivery &rarr; consulting</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

@php
    $defaultSectors = collect([
        'Technology & AI',
        'Translation',
        'Localization',
        'Consulting & Business Mgmt',
        'Education & Training',
    ]);
    $filterSectors = $defaultSectors->merge($sectors ?? collect())->unique()->values();
@endphp

<!-- Open Positions Section -->
<section class="careers-openings-section" id="open-positions">
    <div class="container">
        <div class="section-subtitle-tag">OPEN POSITIONS</div>
        <h2 class="openings-title">Current openings.</h2>
        <p class="openings-desc">Filter by sector, location, or type. Closed roles come off the list automatically.</p>

        <!-- Sector Filter Pills -->
        <div class="role-filters">
            <button type="button" class="role-filter-btn active" data-filter="all">All Roles</button>
            @foreach($filterSectors as $sector)
                <button type="button" class="role-filter-btn" data-filter="{{ Str::slug($sector) }}">{{ $sector }}</button>
            @endforeach
        </div>

        <!-- Job Cards List -->
        <div class="job-cards-list" id="jobCardsContainer">
            @forelse($positions as $position)
                <div class="job-card-item" data-sector="{{ Str::slug($position->sector ?? 'technology-ai') }}">
                    <div class="job-content-left">
                        <h3 class="job-card-title">{{ $position->title }}</h3>
                        @if(!empty($position->description))
                            <p class="job-card-desc">{{ $position->description }}</p>
                        @endif
                        <div class="job-pills-row">
                            <span class="job-meta-pill">{{ $position->company ?? 'Bayan Technology' }}</span>
                            <span class="job-meta-pill">{{ $position->location ?? 'Cairo' }}</span>
                            <span class="job-meta-pill">{{ $position->type ?? 'Full-time' }}</span>
                        </div>
                    </div>
                    <div class="job-card-action">
                        <a href="#application-form"
                           class="job-apply-btn"
                           data-job-id="{{ $position->id }}"
                           data-job-title="{{ $position->title }}">Apply</a>
                    </div>
                </div>
            @empty
                <div class="no-jobs-card" style="display: block;">
                    <h4>No Open Positions Currently Available</h4>
                    <p>We are always eager to meet top talent. Please submit a general application below.</p>
                </div>
            @endforelse

            <div class="no-jobs-card" id="emptyFilterState" style="display: none;">
                <h4>No Openings Found in this Sector</h4>
                <p>There are currently no active roles under this sector. You can submit your CV via the application form below.</p>
            </div>
        </div>
    </div>
</section>

<!-- Join Our Global Expert Network Application Form Section -->
<section class="careers-apply-section" id="application-form">
    <div class="expert-network-container">
        @if(session('success'))
            <div style="background: #e6fffa; border: 1px solid #38b2ac; color: #234e52; padding: 16px 20px; border-radius: 10px; margin-bottom: 30px; font-weight: 500; display: flex; align-items: center; gap: 12px;">
                <i class="fa-solid fa-circle-check" style="color: #319795; font-size: 1.2rem;"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(isset($errors) && $errors->any())
            <div style="background: #fff5f5; border: 1px solid #feb2b2; color: #9b2c2c; padding: 16px 20px; border-radius: 10px; margin-bottom: 30px; font-size: 0.95rem;">
                <p style="font-weight: 700; margin-bottom: 8px;">Please review the following errors:</p>
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="expert-network-header">
            <h2>Join Our Global Expert Network</h2>
            <p>Join a global network of trusted experts supporting multilingual communication, digital transformation, and international growth. Whether your expertise is in language services, technology, content, consulting, or business support, we welcome professionals who share our commitment to excellence and long-term collaboration.</p>
        </div>

        <form action="{{ route('careers.apply') }}" method="POST" enctype="multipart/form-data" class="expert-form" id="careerApplicationForm">
            @csrf
            <input type="hidden" name="job_position_id" id="form_job_position_id" value="{{ old('job_position_id') }}">

            <!-- Row 1: Full Name & Country -->
            <div class="form-grid-2col">
                <input type="text"
                       name="full_name"
                       id="career_full_name"
                       class="expert-input"
                       placeholder="Full Name *"
                       value="{{ old('full_name') }}"
                       required>

                <select name="country" id="career_country" class="expert-select" required>
                    <option value="" disabled {{ old('country') ? '' : 'selected' }}>Country *</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->name }}"
                                data-code="{{ $country->phone_code }}"
                                {{ old('country') == $country->name ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Row 2: Email Address & Phone -->
            <div class="form-grid-2col">
                <input type="email"
                       name="email"
                       id="career_email"
                       class="expert-input"
                       placeholder="Email Address *"
                       value="{{ old('email') }}"
                       required>

                <div class="expert-phone-group">
                    <select name="country_code" id="career_phone_code" class="expert-phone-code-select">
                        <option value="+20" {{ (!old('country_code') || old('country_code') == '+20') ? 'selected' : '' }}>+20</option>
                        @foreach($countries as $c)
                            @if($c->phone_code && $c->phone_code != '+20')
                                <option value="{{ $c->phone_code }}"
                                        data-country="{{ $c->name }}"
                                        {{ old('country_code') == $c->phone_code ? 'selected' : '' }}>
                                    {{ $c->phone_code }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <input type="tel"
                           name="phone"
                           id="career_phone"
                           class="expert-phone-input"
                           placeholder="Phone Number *"
                           value="{{ old('phone') }}"
                           required>
                </div>
            </div>

            <!-- Row 3: File Upload (CV / Resume) -->
            <div class="expert-file-box" id="fileBoxTrigger">
                <input type="file"
                       name="cv"
                       id="career_cv"
                       accept=".pdf,.doc,.docx"
                       style="display: none;">
                <button type="button" class="expert-file-btn" id="fileBtnTrigger">Choose File</button>
                <span class="expert-file-name" id="career_cv_label">No file chosen</span>
            </div>

            <!-- Row 4: Select Subject -->
            <div>
                <select name="subject" id="career_subject" class="expert-select" required>
                    <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Select Subject *</option>
                    @if($positions->count() > 0)
                        <optgroup label="Open Positions">
                            @foreach($positions as $pos)
                                <option value="Apply for: {{ $pos->title }}"
                                        data-position-id="{{ $pos->id }}"
                                        {{ (old('job_position_id') == $pos->id || old('subject') == 'Apply for: ' . $pos->title) ? 'selected' : '' }}>
                                    {{ $pos->title }} ({{ $pos->location ?? 'Cairo' }})
                                </option>
                            @endforeach
                        </optgroup>
                    @endif
                    <optgroup label="Expert Network & Opportunities">
                        <option value="Become a Vendor" {{ old('subject') == 'Become a Vendor' ? 'selected' : '' }}>Become a Vendor</option>
                        <option value="Freelance Linguist / Translator" {{ old('subject') == 'Freelance Linguist / Translator' ? 'selected' : '' }}>Freelance Linguist / Translator</option>
                        <option value="Technology & AI Expert" {{ old('subject') == 'Technology & AI Expert' ? 'selected' : '' }}>Technology & AI Expert</option>
                        <option value="Consulting & Advisory" {{ old('subject') == 'Consulting & Advisory' ? 'selected' : '' }}>Consulting & Advisory</option>
                        <option value="General Spontaneous Application" {{ old('subject') == 'General Spontaneous Application' ? 'selected' : '' }}>General Spontaneous Application</option>
                    </optgroup>
                </select>
            </div>

            <!-- Row 5: Your Message -->
            <div>
                <textarea name="message"
                          id="career_message"
                          class="expert-textarea"
                          rows="5"
                          placeholder="Your Message *"
                          required>{{ old('message') }}</textarea>
            </div>

            <!-- Submit Button -->
            <div class="expert-submit-btn-wrap">
                <button type="submit" class="expert-submit-btn" id="careerSubmitBtn">
                    <span>Submit Application</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </form>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Sector Filter Tabs Functionality
    const filterButtons = document.querySelectorAll('.role-filter-btn');
    const jobCards = document.querySelectorAll('.job-card-item');
    const emptyState = document.getElementById('emptyFilterState');

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function () {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');
            let visibleCount = 0;

            jobCards.forEach(card => {
                const cardSector = card.getAttribute('data-sector');
                if (filterValue === 'all' || cardSector === filterValue) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            if (emptyState) {
                emptyState.style.display = (visibleCount === 0) ? 'block' : 'none';
            }
        });
    });

    // 2. Apply Button Click Handler (Smooth Scroll & Auto Select)
    const applyButtons = document.querySelectorAll('.job-apply-btn');
    const subjectSelect = document.getElementById('career_subject');
    const hiddenJobIdInput = document.getElementById('form_job_position_id');
    const formSection = document.getElementById('application-form');
    const applicationForm = document.getElementById('careerApplicationForm');
    const fullNameInput = document.getElementById('career_full_name');

    applyButtons.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            const jobId = this.getAttribute('data-job-id');
            const jobTitle = this.getAttribute('data-job-title');

            // Set hidden job_position_id
            if (hiddenJobIdInput) {
                hiddenJobIdInput.value = jobId;
            }

            // Select matching option in Select Subject dropdown
            if (subjectSelect) {
                let matched = false;
                for (let i = 0; i < subjectSelect.options.length; i++) {
                    const opt = subjectSelect.options[i];
                    if (opt.getAttribute('data-position-id') === jobId || opt.value === 'Apply for: ' + jobTitle) {
                        subjectSelect.selectedIndex = i;
                        matched = true;
                        break;
                    }
                }
                if (!matched) {
                    // Fallback to searching by title containment
                    for (let i = 0; i < subjectSelect.options.length; i++) {
                        if (subjectSelect.options[i].text.includes(jobTitle)) {
                            subjectSelect.selectedIndex = i;
                            break;
                        }
                    }
                }
            }

            // Smooth scroll to form section
            if (formSection) {
                const navBar = document.querySelector('nav') || document.querySelector('.sb-nav-bar');
                const offset = navBar ? navBar.offsetHeight + 20 : 90;
                const elementPos = formSection.getBoundingClientRect().top + window.pageYOffset;
                window.scrollTo({
                    top: elementPos - offset,
                    behavior: 'smooth'
                });
            }

            // Trigger subtle form highlight animation
            if (applicationForm) {
                applicationForm.classList.remove('highlight-pulse');
                void applicationForm.offsetWidth; // force reflow
                applicationForm.classList.add('highlight-pulse');
            }

            // Focus on Full Name input
            setTimeout(() => {
                if (fullNameInput) {
                    fullNameInput.focus();
                }
            }, 450);
        });
    });

    // 3. Keep hidden job_position_id in sync if user changes Subject dropdown manually
    if (subjectSelect && hiddenJobIdInput) {
        subjectSelect.addEventListener('change', function () {
            const selectedOpt = subjectSelect.options[subjectSelect.selectedIndex];
            const posId = selectedOpt ? selectedOpt.getAttribute('data-position-id') : null;
            hiddenJobIdInput.value = posId || '';
        });
    }

    // 4. Custom File Upload Trigger & Filename Label
    const fileInput = document.getElementById('career_cv');
    const fileBox = document.getElementById('fileBoxTrigger');
    const fileBtn = document.getElementById('fileBtnTrigger');
    const fileLabel = document.getElementById('career_cv_label');

    if (fileInput && fileBox && fileLabel) {
        fileBox.addEventListener('click', function (e) {
            if (e.target !== fileInput) {
                fileInput.click();
            }
        });

        fileInput.addEventListener('change', function () {
            if (this.files && this.files.length > 0) {
                fileLabel.textContent = this.files[0].name;
                fileLabel.classList.add('has-file');
            } else {
                fileLabel.textContent = 'No file chosen';
                fileLabel.classList.remove('has-file');
            }
        });
    }

    // 5. Country and Country Phone Code Synchronizer
    const countrySelect = document.getElementById('career_country');
    const countryCodeSelect = document.getElementById('career_phone_code');

    if (countrySelect && countryCodeSelect) {
        countrySelect.addEventListener('change', function () {
            const selectedOption = countrySelect.options[countrySelect.selectedIndex];
            const phoneCode = selectedOption ? selectedOption.getAttribute('data-code') : null;
            const countryName = countrySelect.value;

            if (phoneCode) {
                for (let i = 0; i < countryCodeSelect.options.length; i++) {
                    if (countryCodeSelect.options[i].value === phoneCode) {
                        countryCodeSelect.selectedIndex = i;
                        return;
                    }
                }
                // If not found in select, dynamically add and select it
                const newOpt = new Option(phoneCode, phoneCode, true, true);
                newOpt.setAttribute('data-country', countryName);
                countryCodeSelect.add(newOpt);
            }
        });

        countryCodeSelect.addEventListener('change', function () {
            const selectedOption = countryCodeSelect.options[countryCodeSelect.selectedIndex];
            const countryName = selectedOption ? selectedOption.getAttribute('data-country') : null;
            if (countryName) {
                for (let i = 0; i < countrySelect.options.length; i++) {
                    if (countrySelect.options[i].value === countryName) {
                        countrySelect.selectedIndex = i;
                        break;
                    }
                }
            }
        });
    }
});
</script>
@endpush
@endsection
