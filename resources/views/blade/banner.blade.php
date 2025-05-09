<!-- Include cookie-banner.css for styling -->
<div x-data="{ showBanner: !localStorage.getItem('cookiesAccepted') }" 
    x-cloak
    x-show="showBanner"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-full"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-full"
    class="cb-banner">
    <div class="cb-banner-inner">
        <div class="cb-banner-text">
            {{ config('cookie-banner.messages.banner_text') }}
            <a href="{{ config('cookie-banner.privacy_policy_url') }}" class="cb-link">{{ config('cookie-banner.messages.more_info') }}</a>
        </div>
        <div class="cb-btn-group">
            <button @click="localStorage.setItem('cookiesAccepted', 'essential'); showBanner = false" 
                class="cb-essential-btn">
                {{ config('cookie-banner.messages.essential_button') }}
            </button>
            <button @click="localStorage.setItem('cookiesAccepted', 'all'); showBanner = false" 
                class="cb-accept-btn">
                {{ config('cookie-banner.messages.accept_button') }}
            </button>
        </div>
    </div>
</div>

@if(config('cookie-banner.gtm_id') || config('cookie-banner.analytics_id'))
<script>
    function initConsentScripts() {
        if (localStorage.getItem('cookiesAccepted') === 'all') {
            @if(config('cookie-banner.gtm_id'))
            // Inject GTM
            if (!document.getElementById('cb-gtm-script')) {
                const script = document.createElement('script');
                script.id = 'cb-gtm-script';
                script.async = true;
                script.src = 'https://www.googletagmanager.com/gtm.js?id={{ config('cookie-banner.gtm_id') }}';
                document.head.appendChild(script);

                // Optionally, add the noscript iframe for GTM
                const noscript = document.createElement('noscript');
                noscript.innerHTML = '<iframe src="https://www.googletagmanager.com/ns.html?id={{ config('cookie-banner.gtm_id') }}" height="0" width="0" style="display:none;visibility:hidden"></iframe>';
                document.body.appendChild(noscript);
            }
            @endif

            @if(config('cookie-banner.analytics_id'))
            // Inject GA4
            if (!document.getElementById('cb-ga4-script')) {
                const script1 = document.createElement('script');
                script1.id = 'cb-ga4-script';
                script1.async = true;
                script1.src = 'https://www.googletagmanager.com/gtag/js?id={{ config('cookie-banner.analytics_id') }}';
                document.head.appendChild(script1);

                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', '{{ config('cookie-banner.analytics_id') }}');
            }
            @endif
        }
    }
    initConsentScripts();
    window.addEventListener('storage', function(e) {
        if (e.key === 'cookiesAccepted' && e.newValue === 'all') {
            initConsentScripts();
        }
    });
</script>
@endif 

<!-- Uses custom CSS classes: cb-banner, cb-banner-inner, cb-banner-text, cb-link, cb-btn-group, cb-essential-btn, cb-accept-btn -->

<!-- Copy or import cookie-banner.css from the package for default styles --> 