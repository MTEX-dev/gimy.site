<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('pages.lander.meta.title') }}</title>
    <meta name="description" content="{{ __('pages.lander.meta.description') }}">
    <style>
        :root {
            --bg-primary: #ffffff;
            --bg-secondary: #f8f9fa;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
            --accent: #6366f1;
            --accent-hover: #4f46e5;
            --border: #e2e8f0;
            --success: #10b981;
            --radius: 12px;
        }

        [data-theme="dark"] {
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --border: #334155;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            line-height: 1.6;
            transition: background 0.3s, color 0.3s;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .theme-toggle {
            position: fixed;
            top: 24px;
            right: 24px;
            z-index: 1000;
            display: flex;
            gap: 8px;
            background: var(--bg-secondary);
            padding: 8px;
            border-radius: var(--radius);
            border: 1px solid var(--border);
        }

        .theme-btn {
            background: transparent;
            border: none;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            color: var(--text-secondary);
            transition: all 0.2s;
            font-size: 14px;
            font-weight: 500;
        }

        .theme-btn.active {
            background: var(--accent);
            color: white;
        }

        .theme-btn:hover:not(.active) {
            background: var(--bg-primary);
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 120px 24px 80px;
        }

        .hero-content {
            max-width: 800px;
        }

        .hero h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 16px;
            letter-spacing: -0.02em;
        }

        .hero .headline {
            font-size: clamp(1.5rem, 3vw, 2.5rem);
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 16px;
        }

        .hero .subheadline {
            font-size: clamp(1.125rem, 2vw, 1.5rem);
            color: var(--text-secondary);
            margin-bottom: 48px;
        }

        .username-form {
            display: flex;
            gap: 12px;
            max-width: 500px;
            margin: 0 auto 16px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .input-wrapper {
            position: relative;
            flex: 1;
            min-width: 250px;
        }

        .input-prefix {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 16px 16px 16px 145px;
            border: 2px solid var(--border);
            border-radius: var(--radius);
            font-size: 16px;
            background: var(--bg-primary);
            color: var(--text-primary);
            transition: all 0.2s;
        }

        input:focus {
            outline: none;
            border-color: var(--accent);
        }

        .btn {
            padding: 16px 32px;
            background: var(--accent);
            color: white;
            border: none;
            border-radius: var(--radius);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .btn:hover {
            background: var(--accent-hover);
            transform: translateY(-2px);
        }

        .validation-hint {
            font-size: 14px;
            color: var(--text-secondary);
            max-width: 500px;
            margin: 0 auto;
        }

        .section {
            padding: 80px 24px;
        }

        .section-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 64px;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 16px;
        }

        .section-subtitle {
            font-size: 1.25rem;
            color: var(--text-secondary);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
        }

        .feature-card {
            padding: 32px;
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            transition: all 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            border-color: var(--accent);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            margin-bottom: 16px;
            color: var(--accent);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 12px;
        }

        .feature-card p {
            color: var(--text-secondary);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 32px;
            text-align: center;
        }

        .stat-value {
            font-size: 3rem;
            font-weight: 800;
            color: var(--accent);
            margin-bottom: 8px;
        }

        .stat-description {
            color: var(--text-secondary);
            font-size: 1.125rem;
        }

        .steps-grid {
            display: grid;
            gap: 48px;
            max-width: 800px;
            margin: 0 auto;
        }

        .step {
            display: flex;
            gap: 24px;
            align-items: flex-start;
        }

        .step-number {
            width: 48px;
            height: 48px;
            background: var(--accent);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .step-content h3 {
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        .step-content p {
            color: var(--text-secondary);
        }

        .integrations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 24px;
        }

        .integration-card {
            padding: 24px;
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            text-align: center;
            transition: all 0.2s;
        }

        .integration-card:hover {
            border-color: var(--accent);
        }

        .integration-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 32px;
            max-width: 900px;
            margin: 0 auto;
        }

        .testimonial-card {
            padding: 32px;
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: var(--radius);
        }

        .testimonial-quote {
            font-size: 1.125rem;
            margin-bottom: 24px;
            line-height: 1.8;
        }

        .testimonial-author {
            font-weight: 600;
        }

        .testimonial-role {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
            max-width: 800px;
            margin: 0 auto;
        }

        .pricing-card {
            padding: 40px;
            background: var(--bg-secondary);
            border: 2px solid var(--border);
            border-radius: var(--radius);
            text-align: center;
        }

        .pricing-card.featured {
            border-color: var(--accent);
            position: relative;
        }

        .pricing-badge {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--accent);
            color: white;
            padding: 4px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .pricing-title {
            font-size: 1.5rem;
            margin-bottom: 8px;
        }

        .pricing-features {
            list-style: none;
            margin: 24px 0;
            text-align: left;
        }

        .pricing-features li {
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .pricing-features li:last-child {
            border-bottom: none;
        }

        .check-icon {
            color: var(--success);
            flex-shrink: 0;
        }

        .faq-grid {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            margin-bottom: 24px;
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
        }

        .faq-question {
            padding: 24px;
            font-weight: 600;
            font-size: 1.125rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .faq-question:hover {
            color: var(--accent);
        }

        .faq-answer {
            padding: 0 24px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s;
            color: var(--text-secondary);
        }

        .faq-item.active .faq-answer {
            padding: 0 24px 24px;
            max-height: 500px;
        }

        .faq-toggle {
            transition: transform 0.3s;
        }

        .faq-item.active .faq-toggle {
            transform: rotate(180deg);
        }

        .cta-section {
            text-align: center;
            padding: 100px 24px;
            background: var(--bg-secondary);
        }

        .cta-content {
            max-width: 700px;
            margin: 0 auto;
        }

        .cta-headline {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 16px;
        }

        .cta-subheadline {
            font-size: 1.25rem;
            color: var(--text-secondary);
            margin-bottom: 32px;
        }

        @media (max-width: 768px) {
            .theme-toggle {
                top: 16px;
                right: 16px;
            }

            .step {
                flex-direction: column;
            }

            .testimonials-grid,
            .pricing-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="theme-toggle">
        <button class="theme-btn" data-theme="light">Light</button>
        <button class="theme-btn active" data-theme="system">System</button>
        <button class="theme-btn" data-theme="dark">Dark</button>
    </div>

    <section class="hero">
        <div class="hero-content">
            <h1>{{ __('pages.lander.hero.title') }}</h1>
            <div class="headline">{{ __('pages.lander.hero.headline') }}</div>
            <p class="subheadline">{{ __('pages.lander.hero.subheadline') }}</p>
            
            <form class="username-form" action="/register" method="POST">
                @csrf
                <div class="input-wrapper">
                    <span class="input-prefix">getsocials.link/</span>
                    <input 
                        type="text" 
                        name="username" 
                        placeholder="{{ __('pages.lander.hero.placeholder') }}"
                        pattern="^[a-z0-9]([a-z0-9-]{1,28}[a-z0-9])?$"
                        required
                    >
                </div>
                <button type="submit" class="btn">
                    {{ __('pages.lander.hero.cta') }}
                </button>
            </form>
            <p class="validation-hint">{{ __('pages.lander.hero.validation_message') }}</p>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">{{ __('pages.lander.features.title') }}</h2>
                <p class="section-subtitle">{{ __('pages.lander.features.subheadline') }}</p>
            </div>
            <div class="features-grid">
                @foreach(range(1, 6) as $i)
                <div class="feature-card">
                    <svg class="feature-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if($i == 1)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                        @elseif($i == 2)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                        @elseif($i == 3)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        @elseif($i == 4)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        @elseif($i == 5)
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        @endif
                    </svg>
                    <h3>{{ __("pages.lander.features.$i.title") }}</h3>
                    <p>{{ __("pages.lander.features.$i.description") }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">{{ __('pages.lander.stats.title') }}</h2>
            </div>
            <div class="stats-grid">
                @foreach(range(1, 4) as $i)
                <div>
                    <div class="stat-value">{{ __("pages.lander.stats.$i.value") }}</div>
                    <div class="stat-description">{{ __("pages.lander.stats.$i.description") }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">{{ __('pages.lander.how_it_works.title') }}</h2>
            </div>
            <div class="steps-grid">
                @foreach(range(1, 4) as $i)
                <div class="step">
                    <div class="step-number">{{ $i }}</div>
                    <div class="step-content">
                        <h3>{{ __("pages.lander.how_it_works.steps.$i.title") }}</h3>
                        <p>{{ __("pages.lander.how_it_works.steps.$i.description") }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">{{ __('pages.lander.integrations.title') }}</h2>
                <p class="section-subtitle">{{ __('pages.lander.integrations.subheadline') }}</p>
            </div>
            <div class="integrations-grid">
                @foreach(range(1, 5) as $i)
                <div class="integration-card">
                    <div class="integration-icon">
                        <svg fill="currentColor" viewBox="0 0 24 24">
                            @if($i == 1)
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            @elseif($i == 2)
                                <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                            @elseif($i == 3)
                                <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
                            @elseif($i == 4)
                                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                            @else
                                <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.223-.548.223l.188-2.85 5.18-4.68c.223-.198-.054-.308-.346-.11l-6.4 4.02-2.76-.918c-.6-.187-.612-.6.125-.89l10.782-4.156c.5-.18.943.11.78.89z"/>
                            @endif
                        </svg>
                    </div>
                    <h4>{{ __("pages.lander.integrations.$i.name") }}</h4>
                    <p style="font-size: 0.875rem; color: var(--text-secondary);">
                        {{ __("pages.lander.integrations.$i.description") }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">{{ __('pages.lander.testimonials.title') }}</h2>
            </div>
            <div class="testimonials-grid">
                @foreach(range(1, 2) as $i)
                <div class="testimonial-card">
                    <p class="testimonial-quote">"{{ __("pages.lander.testimonials.$i.quote") }}"</p>
                    <div class="testimonial-author">{{ __("pages.lander.testimonials.$i.author") }}</div>
                    <div class="testimonial-role">{{ __("pages.lander.testimonials.$i.role") }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section" style="background: var(--bg-secondary);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">{{ __('pages.lander.pricing.title') }}</h2>
                <p class="section-subtitle">{{ __('pages.lander.pricing.subheadline') }}</p>
            </div>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <h3 class="pricing-title">{{ __('pages.lander.pricing.free_plan_headline') }}</h3>
                    <ul class="pricing-features">
                        @foreach(__('pages.lander.pricing.free_plan_features') as $feature)
                        <li>
                            <svg class="check-icon" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    <button class="btn" style="width: 100%;">Get Started</button>
                </div>
                
                <div class="pricing-card featured">
                    <span class="pricing-badge">Popular</span>
                    <h3 class="pricing-title">{{ __('pages.lander.pricing.pro_plan_headline') }}</h3>
                    <p style="color: var(--text-secondary); margin-bottom: 16px;">
                        {{ __('pages.lander.pricing.pro_plan_description') }}
                    </p>
                    <ul class="pricing-features">
                        @foreach(__('pages.lander.pricing.pro_plan_features') as $feature)
                        <li>
                            <svg class="check-icon" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    <button class="btn" style="width: 100%;">{{ __('pages.lander.pricing.cta') }}</button>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">{{ __('pages.lander.faq.title') }}</h2>
            </div>
            <div class="faq-grid">
                @foreach(range(1, 5) as $i)
                <div class="faq-item">
                    <div class="faq-question">
                        {{ __("pages.lander.faq.$i.question") }}
                        <svg class="faq-toggle" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                    <div class="faq-answer">
                        {{ __("pages.lander.faq.$i.answer") }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="cta-content">
            <h2 class="cta-headline">{{ __('pages.lander.cta_bottom.headline') }}</h2>
            <p class="cta-subheadline">{{ __('pages.lander.cta_bottom.subheadline') }}</p>
            <button class="btn" style="font-size: 1.125rem; padding: 20px 40px;">
                {{ __('pages.lander.cta_bottom.call_to_action') }}
            </button>
        </div>
    </section>

    <script>
        const themeButtons = document.querySelectorAll('.theme-btn');
        const html = document.documentElement;

        function setTheme(theme) {
            localStorage.setItem('theme', theme);
            
            if (theme === 'system') {
                const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                html.setAttribute('data-theme', systemTheme);
            } else {
                html.setAttribute('data-theme', theme);
            }
            
            themeButtons.forEach(btn => {
                btn.classList.toggle('active', btn.dataset.theme === theme);
            });
        }

        themeButtons.forEach(btn => {
            btn.addEventListener('click', () => setTheme(btn.dataset.theme));
        });

        const savedTheme = localStorage.getItem('theme') || 'system';
        setTheme(savedTheme);

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if (localStorage.getItem('theme') === 'system') {
                html.setAttribute('data-theme', e.matches ? 'dark' : 'light');
            }
        });

        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const item = question.parentElement;
                const wasActive = item.classList.contains('active');
                
                document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
                
                if (!wasActive) {
                    item.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>