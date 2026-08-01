<!-- Case Study Modal -->
<div id="cs-modal" class="cs-modal-overlay" onclick="closeModal(event)">
    <div class="cs-modal-content" onclick="event.stopPropagation()">
        <button class="cs-modal-close" onclick="closeModal(event)"><i class="fa-solid fa-xmark"></i></button>
        <div id="cs-modal-header" class="cs-modal-header">
            <div class="cs-modal-title-wrapper">
                <h2 id="cs-modal-title">Project Title</h2>
                <p id="cs-modal-subtitle">Project Subtitle</p>
                <div id="cs-modal-date" style="margin-top: 15px; display: inline-block; background: rgba(255,255,255,0.2); padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; backdrop-filter: blur(5px);"></div>
            </div>
        </div>
        <div class="cs-modal-body">
            <div class="cs-modal-section" id="cs-section-challenge">
                <h4><i class="fa-solid fa-crosshairs"></i> The Challenge</h4>
                <p id="cs-modal-challenge"></p>
            </div>
            <div class="cs-modal-section" id="cs-section-solution">
                <h4><i class="fa-solid fa-lightbulb"></i> The Solution</h4>
                <p id="cs-modal-solution"></p>
            </div>
            <div class="cs-modal-section" id="cs-section-delivered">
                <h4><i class="fa-solid fa-rocket"></i> What We Delivered</h4>
                <p id="cs-modal-delivered"></p>
            </div>
            <div class="cs-modal-section" id="cs-section-tools">
                <h4><i class="fa-solid fa-screwdriver-wrench"></i> Tools & Technologies</h4>
                <p id="cs-modal-tools"></p>
            </div>
        </div>
    </div>
</div>
