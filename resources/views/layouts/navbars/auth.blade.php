<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo.png">
            </div>
        </a>
        <a href="{{ route('page.index', 'dashboard') }}" class="simple-text logo-normal">
            {{ __('UlamaMaps') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'daftar_ulama' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'daftar_ulama') }}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('Daftar Ulama') }}</p>
                </a>
            </li>
            </li>
            <li class="{{ $elementActive == 'biografi' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'biografi') }}">
                    <i class="nc-icon nc-book-bookmark"></i>
                    <p>{{ __('Biografi Ulama') }}</p>
                </a>
            </li>
            
        </ul>
    </div>
</div>