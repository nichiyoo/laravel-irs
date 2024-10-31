<footer class="footer footer-transparent d-print-none">
  <div class="container-xl">
    <div class="flex-row-reverse text-center row align-items-center">
      <div class="col-lg-auto ms-lg-auto">
        <ul class="mb-0 list-inline list-inline-dots">
          <li class="list-inline-item">
            <a href="#" target="_blank" class="link-secondary" rel="noopener">{{ __('Privacy Policy') }}</a>
          </li>

          <li class="list-inline-item">
            <a href="#" target="_blank" class="link-secondary" rel="noopener">{{ __('Terms of Service') }}</a>
          </li>

          <li class="list-inline-item">
            <a href="#" target="_blank" class="link-secondary" rel="noopener">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
              </svg>
              {{ __('About') }}
            </a>
          </li>
        </ul>
      </div>

      <div class="mt-3 col-12 col-lg-auto mt-lg-0">
        <ul class="mb-0 list-inline list-inline-dots">
          <li class="list-inline-item">
            Copyright &copy; {{ date('Y') }}
            <a href="{{ route('dashboard') }}" class="link-secondary">{{ config('app.name', 'Laravel') }}</a>
            All rights reserved.
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
