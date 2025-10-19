<?php

return [
    'lander' => [
        'meta' => [
            'title' => 'Gimy.site - The Developer\'s Sandbox for Web Creation',
            'description' =>
                'Gimy.site is a rapid-deployment platform from mtex.dev. Write HTML, CSS, and JS for multiple pages and publish your static sites instantly.',
        ],
        'hero' => [
            'title' => 'The Developer\'s Sandbox for Web Creation',
            'headline' => 'Powered by mtex.dev',
            'subheadline' =>
                'Gimy.site is a rapid-deployment platform from <span class="font-semibold text-gimysite-900 dark:text-white">mtex.dev</span>. Write HTML, CSS, and JS for multiple pages and publish your static sites instantly.',
            'placeholder' => 'Your Project Name',
            'validation_message' => 'Your project name must be unique.',
            'cta' => 'Create Project',
        ],
        'features' => [
            'title' => '',
            'subheadline' => '',
            '1' => [
                'title' => 'title',
                'description' => 'description',
            ],
            '2' => [
                'title' => 'title',
                'description' => 'description',
            ],
            '3' => [
                'title' => 'title',
                'description' => 'description',
            ],
            '4' => [
                'title' => 'title',
                'description' => 'description',
            ],
            '5' => [
                'title' => 'title',
                'description' => 'description',
            ],
            '6' => [
                'title' => 'title',
                'description' => 'description',
            ],
        ],
        'stats' => [],
    ],

    'legal' => [
        'last_fetched' => 'Last fetched:',
        'privacy' => [
            'title' => 'Privacy Policy',
            'content' => '# Privacy Policy

This Privacy Policy outlines how Gimy.Site collects, uses, and protects your information.

## 1. Information We Collect
We collect minimal personal data:
*   Email address
*   First name and last name (if provided)
*   Usage Data (IP address, browser type, pages visited)

## 2. How We Use Your Information
Your data is used solely to provide and improve our service, manage your account, and communicate with you about service updates or offers.

## 3. Data Retention
We retain your personal data only as long as necessary for the purposes outlined in this policy or to comply with legal obligations.

## 4. Data Security
We prioritize the security of your data but acknowledge that no internet transmission or electronic storage is 100% secure.

## 5. Third-Party Links
Our service may contain links to third-party websites. We are not responsible for their content or privacy practices.

## 6. Your Rights
You can request to access, correct, or delete your personal data.

## 7. Changes to this Policy
We may update this policy periodically. Significant changes will be communicated via email or a prominent notice on our service.

## 8. Contact Us
For any privacy-related questions, please contact us at privacy@gimy.site.
',
        ],
        'terms' => [
            'title' => 'Terms of Service',
            'content' => '# Terms of Service

Welcome to Gimy.Site, a free static website hosting service by XPsystems.eu / europehost.eu. By using our service, you agree to these terms.

## 1. User Accounts
You are responsible for maintaining the confidentiality of your account information. You must be over 18 to use this service.

## 2. Content
You are solely responsible for the content you upload, ensuring it is legal, appropriate, and does not infringe on any third-party rights. We reserve the right to remove any objectionable content.
**Important:** While we perform regular backups, we do not guarantee against data loss or corruption. You are responsible for maintaining your own content backups.

## 3. Service Usage
Gimy.Site is a free service. We reserve the right to terminate or suspend your account, and remove your data, for any reason, with or without prior notice, especially in cases of service exploitation or violation of these terms.

## 4. Limitation of Liability
Gimy.Site is provided "AS IS" without warranties. We are not liable for any damages or losses arising from your use of the service. Our liability is limited to 100 EUR if no payment was made.

## 5. Governing Law
These terms are governed by the laws of Germany.

## 6. Changes to Terms
We may modify these terms at any time. Continued use of the service after changes constitutes acceptance.

## 7. Contact Us
For questions regarding these terms, contact us at terms@gimy.site.
',
        ],
        'cookies' => [
            'title' => 'Cookie Policy',
            'content' => '# Cookie Policy

This policy explains how Gimy.Site uses cookies.

## 1. What are Cookies?
Cookies are small text files stored on your device that contain information about your browsing history.

## 2. How We Use Cookies
We use cookies for:
*   **Essential functionality:** To make our website work correctly and securely.
*   **Preference storage:** To remember your choices like login details or language.
*   **Analytics (Third-Party):** To understand how visitors use our site, helping us improve it.

## 3. Your Choices
You can disable cookies through your browser settings, but this may affect website functionality.

## 4. Contact Us
For questions about our Cookie Policy, contact us at cookies@gimy.site.
',
        ],
        'imprint' => [
            'title' => 'Imprint',
            'content' => '# Imprint

This service (Gimy.Site) is provided by:

Fabian Elias Ternis
Alzeyer Str. 97
67592 Flörsheim-Dalsheim
Germany

Email: f.ternis@xpsystems.eu

Gimy.Site is a free service by europehost.eu, which is a sub-company of XPsystems.eu, led by Fabian Ternis.

## Disclaimer

Gimy.Site is a FREE service. Data may be lost or removed at any time for any or no reason, without prior notice. We do not guarantee the availability or integrity of any data stored on our servers. All servers are located in Germany.
',
        ],
    ],

    'errors' => [
        '403' => [
            'title' => '403 Forbidden',
            'message' => 'You don\'t have permission to access this resource.',
            'back_home' => 'Go to Homepage',
        ],
        '404' => [
            'title' => '404 Not Found',
            'message' => 'The page you are looking for does not exist.',
            'back_home' => 'Go to Homepage',
        ],
        '500' => [
            'title' => '500 Internal Server Error',
            'message' => 'Something went wrong on our end. Please try again later.',
            'back_home' => 'Go to Homepage',
        ],
        '503' => [
            'title' => '503 Service Unavailable',
            'message' => 'We are currently undergoing maintenance. Please check back soon.',
            'back_home' => 'Go to Homepage',
        ],
        '419' => [
            'title' => '419 Page Expired',
            'message' => 'The page has expired due to inactivity. Please refresh and try again.',
            'refresh' => 'Refresh Page',
        ],
        '429' => [
            'title' => '429 Too Many Requests',
            'message' => 'You have sent too many requests in a given amount of time. Please try again later.',
            'back_home' => 'Go to Homepage',
        ],
    ],
    
    'dashboard' => [
        'welcome_message' => 'Welcome to your dashboard, :name!',
        'welcome_subtitle' => 'Here you can manage your static websites.'
    ],

    'sitemap' => [
        'meta' => [
            'title' => 'Sitemap',
            'description' => 'Navigate through all available pages on Gimy.Site',
        ],
        'heading' => 'Sitemap',
        'subheading' => 'Navigate through all available pages',
        'sections' => [
            'main_pages' => 'Main Pages',
            'legal_info' => 'Legal Information',
        ],
    ],
];