@if(isset($chatbot_questions) && $chatbot_questions->count() > 0)
<!-- Chatbot Floating Launcher -->
<div id="bayan-chatbot-launcher" class="chatbot-launcher" title="Chat with Assistant">
    <div class="chatbot-pulse"></div>
    <div class="chatbot-launcher-icon">
        <i class="fa-solid fa-comments"></i>
    </div>
    <div class="chatbot-launcher-close">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <span class="chatbot-launcher-badge">1</span>
</div>

<!-- Chatbot Popup Window -->
<div id="bayan-chatbot-window" class="chatbot-window">
    <!-- Header -->
    <div class="chatbot-header">
        <div class="chatbot-header-info">
            <div class="chatbot-avatar">
                <i class="fa-solid fa-robot"></i>
                <span class="chatbot-status-dot"></span>
            </div>
            <div>
                <h4>{{ $global_settings['site_name'] ?? 'Bayan Group' }} Assistant</h4>
                <span class="chatbot-status-text">Online</span>
            </div>
        </div>
        <div class="chatbot-header-actions">
            <button id="chatbot-restart-btn" class="chatbot-btn-icon" title="Restart Conversation">
                <i class="fa-solid fa-rotate-right"></i>
            </button>
            <button id="chatbot-close-btn" class="chatbot-btn-icon" title="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>

    <!-- Messages Body -->
    <div class="chatbot-body" id="chatbot-messages-container">
        <!-- Messages will be rendered dynamically via JS -->
    </div>

    <!-- Footer / Quick Contact -->
    <div class="chatbot-footer">
        <span>Need more help?</span>
        <a href="{{ route('contact') }}" class="chatbot-contact-link">
            <i class="fa-solid fa-paper-plane"></i> Contact Us
        </a>
    </div>
</div>

<style>
/* Chatbot CSS Styles */
.chatbot-launcher {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary-color, #3D81C3), var(--secondary-color, #2BB295));
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    z-index: 99999;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.chatbot-launcher:hover {
    transform: scale(1.08);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.28);
}

.chatbot-launcher .chatbot-launcher-close {
    display: none;
    font-size: 22px;
}

.chatbot-launcher.active .chatbot-launcher-icon {
    display: none;
}

.chatbot-launcher.active .chatbot-launcher-close {
    display: block;
}

.chatbot-pulse {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: var(--secondary-color, #2BB295);
    opacity: 0.6;
    animation: chatbot-pulse-anim 2.2s infinite;
    z-index: -1;
}

@keyframes chatbot-pulse-anim {
    0% { transform: scale(1); opacity: 0.6; }
    70% { transform: scale(1.5); opacity: 0; }
    100% { transform: scale(1.5); opacity: 0; }
}

.chatbot-launcher-badge {
    position: absolute;
    top: -4px;
    right: -4px;
    background: #ff4757;
    color: white;
    font-size: 11px;
    font-weight: 700;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #ffffff;
    animation: bounce-badge 2s infinite;
}

@keyframes bounce-badge {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-4px); }
    60% { transform: translateY(-2px); }
}

/* Chat Window */
.chatbot-window {
    position: fixed;
    bottom: 105px;
    right: 30px;
    width: 380px;
    max-width: calc(100vw - 40px);
    height: 540px;
    max-height: calc(100vh - 140px);
    background: #ffffff;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.18);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    z-index: 99998;
    opacity: 0;
    pointer-events: none;
    transform: translateY(25px) scale(0.95);
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    font-family: 'Inter', sans-serif;
    border: 1px solid rgba(0, 0, 0, 0.08);
}

.chatbot-window.active {
    opacity: 1;
    pointer-events: auto;
    transform: translateY(0) scale(1);
}

/* Header */
.chatbot-header {
    background: linear-gradient(135deg, var(--primary-color, #3D81C3), var(--secondary-color, #2BB295));
    color: #ffffff;
    padding: 16px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.chatbot-header-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.chatbot-avatar {
    position: relative;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    border: 1px solid rgba(255, 255, 255, 0.3);
}

.chatbot-status-dot {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #2ecc71;
    border: 2px solid #ffffff;
}

.chatbot-header h4 {
    margin: 0;
    font-size: 15px;
    font-weight: 700;
    color: #ffffff;
    line-height: 1.2;
}

.chatbot-status-text {
    font-size: 11px;
    opacity: 0.9;
    color: rgba(255, 255, 255, 0.85);
}

.chatbot-header-actions {
    display: flex;
    gap: 6px;
}

.chatbot-btn-icon {
    background: rgba(255, 255, 255, 0.15);
    border: none;
    color: white;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: background 0.2s ease;
}

.chatbot-btn-icon:hover {
    background: rgba(255, 255, 255, 0.3);
}

/* Body */
.chatbot-body {
    flex: 1;
    padding: 20px 16px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 14px;
    background: #f8fafc;
    scroll-behavior: smooth;
}

.chatbot-body::-webkit-scrollbar {
    width: 6px;
}

.chatbot-body::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 4px;
}

/* Message Bubbles */
.chatbot-msg {
    display: flex;
    gap: 8px;
    max-width: 85%;
    animation: fadeInMsg 0.3s ease forwards;
}

@keyframes fadeInMsg {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
}

.chatbot-msg.bot {
    align-self: flex-start;
}

.chatbot-msg.user {
    align-self: flex-end;
    flex-direction: row-reverse;
}

.chatbot-msg-avatar {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: var(--primary-color, #3D81C3);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    flex-shrink: 0;
    margin-top: 4px;
}

.chatbot-msg-bubble {
    padding: 12px 16px;
    border-radius: 16px;
    font-size: 13.5px;
    line-height: 1.5;
    word-break: break-word;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
}

.chatbot-msg.bot .chatbot-msg-bubble {
    background: #ffffff;
    color: #334155;
    border-bottom-left-radius: 4px;
    border: 1px solid #e2e8f0;
}

.chatbot-msg.user .chatbot-msg-bubble {
    background: linear-gradient(135deg, var(--primary-color, #3D81C3), #2968a3);
    color: #ffffff;
    border-bottom-right-radius: 4px;
}

/* Question Options Container */
.chatbot-options {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-top: 6px;
    width: 100%;
    animation: fadeInMsg 0.4s ease forwards;
}

.chatbot-option-btn {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    color: var(--primary-color, #3D81C3);
    padding: 10px 14px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    text-align: left;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
}

.chatbot-option-btn:hover {
    background: #f1f5f9;
    border-color: var(--primary-color, #3D81C3);
    transform: translateX(3px);
}

.chatbot-option-btn i {
    font-size: 11px;
    opacity: 0.7;
}

/* Typing Indicator */
.chatbot-typing {
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 10px 14px;
    background: #ffffff;
    border-radius: 16px;
    border-bottom-left-radius: 4px;
    border: 1px solid #e2e8f0;
    width: fit-content;
    align-self: flex-start;
}

.chatbot-typing-dot {
    width: 7px;
    height: 7px;
    border-radius: 50%;
    background: #94a3b8;
    animation: typingBounce 1.4s infinite ease-in-out both;
}

.chatbot-typing-dot:nth-child(1) { animation-delay: -0.32s; }
.chatbot-typing-dot:nth-child(2) { animation-delay: -0.16s; }

@keyframes typingBounce {
    0%, 80%, 100% { transform: scale(0); }
    40% { transform: scale(1); }
}

/* Footer */
.chatbot-footer {
    padding: 12px 16px;
    background: #ffffff;
    border-top: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 12px;
    color: #64748b;
}

.chatbot-contact-link {
    color: var(--secondary-color, #2BB295);
    font-weight: 600;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 5px;
    transition: color 0.2s ease;
}

.chatbot-contact-link:hover {
    color: var(--primary-color, #3D81C3);
    text-decoration: underline;
}

@media (max-width: 480px) {
    .chatbot-window {
        bottom: 90px;
        right: 15px;
        left: 15px;
        width: auto;
        height: 75vh;
    }
    .chatbot-launcher {
        bottom: 20px;
        right: 20px;
        width: 54px;
        height: 54px;
        font-size: 22px;
    }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const rawQuestions = @json($chatbot_questions);
    const launcher = document.getElementById('bayan-chatbot-launcher');
    const windowEl = document.getElementById('bayan-chatbot-window');
    const closeBtn = document.getElementById('chatbot-close-btn');
    const restartBtn = document.getElementById('chatbot-restart-btn');
    const container = document.getElementById('chatbot-messages-container');
    const badge = launcher.querySelector('.chatbot-launcher-badge');

    let isChatOpen = false;

    // Toggle Chat Window
    function toggleChat() {
        isChatOpen = !isChatOpen;
        if (isChatOpen) {
            launcher.classList.add('active');
            windowEl.classList.add('active');
            if (badge) badge.style.display = 'none';
            if (container.children.length === 0) {
                initChat();
            }
        } else {
            launcher.classList.remove('active');
            windowEl.classList.remove('active');
        }
    }

    launcher.addEventListener('click', toggleChat);
    closeBtn.addEventListener('click', toggleChat);
    restartBtn.addEventListener('click', initChat);

    // Initial greeting and question options
    function initChat() {
        container.innerHTML = '';

        // Bot Welcome Message
        appendBotMessage('Welcome to <strong>{{ $global_settings['site_name'] ?? 'Bayan Group' }}</strong>! 👋<br>I am your digital assistant. How can we help you today? Please select any of the topics below:');

        // Render Questions
        renderQuestionOptions(rawQuestions);
    }

    // Render clickable questions
    function renderQuestionOptions(questions) {
        if (!questions || questions.length === 0) return;

        const optionsWrap = document.createElement('div');
        optionsWrap.className = 'chatbot-options';

        questions.forEach(q => {
            const btn = document.createElement('button');
            btn.className = 'chatbot-option-btn';
            btn.innerHTML = `<span>${escapeHtml(q.question)}</span> <i class="fa-solid fa-chevron-right"></i>`;
            btn.addEventListener('click', function() {
                handleQuestionClick(q, optionsWrap);
            });
            optionsWrap.appendChild(btn);
        });

        container.appendChild(optionsWrap);
        scrollToBottom();
    }

    // Handle when user clicks a question
    function handleQuestionClick(item, currentOptionsContainer) {
        // Remove or disable current options
        if (currentOptionsContainer) {
            currentOptionsContainer.remove();
        }

        // 1. Add User Message Bubble
        appendUserMessage(item.question);

        // 2. Show Typing Indicator
        showTypingIndicator();

        // 3. After short delay, show bot answer
        setTimeout(function() {
            hideTypingIndicator();
            appendBotMessage(formatAnswer(item.answer));

            // 4. Show follow up question prompt
            setTimeout(function() {
                const promptMsg = document.createElement('div');
                promptMsg.style.fontSize = '12px';
                promptMsg.style.color = '#64748b';
                promptMsg.style.marginTop = '6px';
                promptMsg.textContent = 'Have another question? Pick a topic below:';
                container.appendChild(promptMsg);

                renderQuestionOptions(rawQuestions);
            }, 400);

        }, 600);
    }

    function appendBotMessage(htmlContent) {
        const msgDiv = document.createElement('div');
        msgDiv.className = 'chatbot-msg bot';
        msgDiv.innerHTML = `
            <div class="chatbot-msg-avatar">
                <i class="fa-solid fa-robot"></i>
            </div>
            <div class="chatbot-msg-bubble">${htmlContent}</div>
        `;
        container.appendChild(msgDiv);
        scrollToBottom();
    }

    function appendUserMessage(text) {
        const msgDiv = document.createElement('div');
        msgDiv.className = 'chatbot-msg user';
        msgDiv.innerHTML = `
            <div class="chatbot-msg-bubble">${escapeHtml(text)}</div>
        `;
        container.appendChild(msgDiv);
        scrollToBottom();
    }

    let typingElement = null;
    function showTypingIndicator() {
        if (typingElement) return;
        typingElement = document.createElement('div');
        typingElement.className = 'chatbot-typing';
        typingElement.innerHTML = `
            <div class="chatbot-typing-dot"></div>
            <div class="chatbot-typing-dot"></div>
            <div class="chatbot-typing-dot"></div>
        `;
        container.appendChild(typingElement);
        scrollToBottom();
    }

    function hideTypingIndicator() {
        if (typingElement) {
            typingElement.remove();
            typingElement = null;
        }
    }

    function scrollToBottom() {
        container.scrollTop = container.scrollHeight;
    }

    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, function(m) { return map[m]; });
    }

    function formatAnswer(text) {
        return escapeHtml(text).replace(/\n/g, '<br>');
    }
});
</script>
@endif
