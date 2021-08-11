<div class="ms-slidebar sb-slidebar sb-left sb-momentum-scrolling sb-style-overlay">
    <header class="ms-slidebar-header">
        <div class="ms-slidebar-title">
            <div class="ms-slidebar-t">
                <h3>{{ auth('student')->user()->std_name }}</h3>
            </div>
        </div>
    </header>
    <ul class="ms-slidebar-menu" id="slidebar-menu" role="tablist" aria-multiselectable="true">
        <li>
            <a class="link" href="{{ url('home') }}"> 
                <i class="fas fa-calendar-check"></i> {{ auth('student')->user()->coursetype === 'online' ? 'Bonus' : 'Club' }} Registration 
            </a>
        </li>
        <li> 
            <a class="link" href="{{ url('history') }}"> 
                <i class="fas fa-history"></i> History lists
            </a> 
        </li>
        <li> 
            <a class="link" href="{{ url('profile') }}"> 
                <i class="fas fa-user"></i> Profile
            </a> 
        </li>
        <li> 
            <a class="link" href="{{ url('faqs') }}"> 
                <i class="fas fa-question-circle"></i> FAQs
            </a> 
        </li>
        
        <li>
            <a class="link" href="{{ route('sac-tour') }}">
                <i class="fas fa-paper-plane"></i> SAC Introduction
            </a>
        </li>
        
        <li> 
            <a class="link" href="{{ url('logout') }}"> 
                <i class="fas fa-door-open"></i> Log Out
            </a> 
        </li>
    </ul>

</div>
