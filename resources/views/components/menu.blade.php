<header class="ms-header ms-header-white {{ session()->has('condition') ? '' : 'no-session' }}">
    <div class="container container-full">
        <div class="ms-title">
            <a href="{{ url('/home') }}" class="animated zoomInDown animation-delay-5">
                <img src="{{ asset('public/assets/img/logo/logonewcambridge.png') }}" alt="">
            </a>
        </div>
        <div class="header-right">
            @if(session()->has('condition'))

                <a href="{{ url('profile') }}" class="color-success">
                    {{ auth('student')->user()->std_name }}
                </a>
                <a href="javascript:void(0)" class="btn-ms-menu btn-circle btn-circle-primary sb-toggle-left animated zoomInDown animation-delay-10">
                    <i class="zmdi zmdi-menu"></i>
                </a>

            @endif
        </div>
    </div>
</header>

@if(session()->has('condition'))
    <nav class="navbar navbar-static-top yamm ms-navbar ms-navbar-primary">
        <div class="container container-full">
            <div class="navbar-header">
                <a href="{{ url('home') }}" class="navbar-brand">
                    <img src="{{ asset('public/assets/img/logo/newcambridge-logo_smoll_01.png') }}" alt="">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('home') }}" class="dropdown-toggle animated fadeIn animation-delay-4">
                            <i class="fas fa-calendar-check"></i> {{ auth('student')->user()->coursetype === 'online' ? 'Bonus' : 'Club' }} Registration
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('history') }}" class="dropdown-toggle animated fadeIn animation-delay-8">
                            <i class="fas fa-history"></i> History lists
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('profile') }}" class="dropdown-toggle animated fadeIn animation-delay-10">
                            <i class="fas fa-user"></i> Profile
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('faqs') }}" class="dropdown-toggle animated fadeIn animation-delay-10">
                            <i class="fas fa-question-circle"></i> FAQs
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sac-tour') }}" class="dropdown-toggle animated fadeIn animation-delay-10">
                            <i class="fas fa-paper-plane"></i> SAC Introduction
                        </a>
                    </li>
                    @if (auth('student')->user()->std_name == "admin")
                        <li>
                            <a class="link" href="{{ url('view_class') }}">
                                <i class="fas fa-paper-plane"></i> Add video
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <a href="javascript:void(0)" class="sb-toggle-left btn-navbar-menu">
                <i class="zmdi zmdi-menu"></i>
            </a>
        </div>
    </nav>
@endif