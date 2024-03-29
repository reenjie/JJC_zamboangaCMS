<div class="sidebar" data-color="black"  >
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text">
              
                <span style="font-size:11px;"><img style="width:200px" src="{{asset('images').'/hero-img.png'}}" alt=""></span>
            </a>
        </div>
        <ul class="nav">
            @if(Auth::user()->role != 3)
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-36"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>

          

            <li class="nav-item @if($activePage == 'partners') active @endif">
                <a class="nav-link" href="{{route('page.index', 'partners')}}">
                    <i class="fas fa-users"></i>
                    <p>{{ __("Partners") }}</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'headerandabout') active @endif">
                <a class="nav-link" href="{{route('page.index', 'headerandabout')}}">
                    <i class="nc-icon nc-badge"></i>
                    <p>{{ __("Header & AboutUS") }}</p>
                </a>
            </li>

            @endif
    
    

         
            <li class="nav-item @if($activePage == 'blogs') active @endif">
                <a class="nav-link" href="{{route('page.index', 'blogs')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Blogs") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'events') active @endif">
                <a class="nav-link" href="{{route('page.index', 'events')}}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __("Events") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'projects') active @endif">
                <a class="nav-link" href="{{route('page.index', 'projects')}}">
                    <i class="nc-icon nc-app"></i>
                    <p>{{ __("Projects") }}</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'teams') active @endif">
                <a class="nav-link" href="{{route('page.index', 'teams')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>{{ __("Teams") }}</p>
                </a>
            </li>
         

            <li class="nav-item @if($activePage == 'contacts') active @endif">
                <a class="nav-link" href="{{route('page.index', 'contacts')}}">
                    <i class="nc-icon nc-badge"></i>
                    <p>{{ __("Contacts") }}</p>
                </a>
            </li>

            @if(Auth::user()->role != 3)

            <li class="nav-item @if($activePage == 'footer') active @endif">
                <a class="nav-link" href="{{route('page.index', 'footer')}}">
                    <i class="nc-icon nc-stre-down"></i>
                    <p>{{ __("Footer") }}</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'others') active @endif">
                <a class="nav-link" href="{{route('page.index', 'others')}}">
                    <i class="nc-icon nc-stre-down"></i>
                    <p>{{ __("Others") }}</p>
                </a>
            </li>

            @if(Auth::user()->role != 2)
            <li class="nav-item @if($activePage == 'usermanagement') active @endif">
                <a class="nav-link" href="{{route('page.index', 'usermanagement')}}">
                    <i class="fas fa-users"></i>
                    <p>{{ __("User Management") }}</p>
                </a>
            </li>
            @endif

            @endif
         
          
        </ul>
    </div>
</div>


