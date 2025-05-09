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
    // Always load GTM in your layout!
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    // Set default consent to granted on page load
    gtag('consent', 'default', {
      'ad_storage': 'granted',
      'analytics_storage': 'granted'
    });
    // Grant consent when user accepts all cookies
    document.querySelectorAll('.cb-accept-btn').forEach(function(btn) {
      btn.addEventListener('click', function() {
        gtag('consent', 'update', {
          'ad_storage': 'granted',
          'analytics_storage': 'granted'
        });
      });
    });
</script>
@endif 

<!-- Uses custom CSS classes: cb-banner, cb-banner-inner, cb-banner-text, cb-link, cb-btn-group, cb-essential-btn, cb-accept-btn -->

<!-- Copy or import cookie-banner.css from the package for default styles --> 