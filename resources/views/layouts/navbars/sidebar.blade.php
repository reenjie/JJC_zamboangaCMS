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
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-36"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
    

            <li class="nav-item @if($activePage == 'busses') active @endif">
                <a class="nav-link" href="{{route('page.index', 'icons')}}">
                    <i class="nc-icon nc-badge"></i>
                    <p>{{ __("Header & AboutUS") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'routes') active @endif">
                <a class="nav-link" href="{{route('page.index', 'routes')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Blogs") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'schedules') active @endif">
                <a class="nav-link" href="{{route('page.index', 'schedules')}}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __("Events") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'schedules') active @endif">
                <a class="nav-link" href="{{route('page.index', 'schedules')}}">
                    <i class="nc-icon nc-app"></i>
                    <p>{{ __("Projects") }}</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'schedules') active @endif">
                <a class="nav-link" href="{{route('page.index', 'schedules')}}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>{{ __("Teams") }}</p>
                </a>
            </li>
         

            <li class="nav-item @if($activePage == 'schedules') active @endif">
                <a class="nav-link" href="{{route('page.index', 'schedules')}}">
                    <i class="nc-icon nc-badge"></i>
                    <p>{{ __("Contacts") }}</p>
                </a>
            </li>

            <li class="nav-item @if($activePage == 'schedules') active @endif">
                <a class="nav-link" href="{{route('page.index', 'schedules')}}">
                    <i class="nc-icon nc-stre-down"></i>
                    <p>{{ __("Footer") }}</p>
                </a>
            </li>
         
        
        </ul>
    </div>
</div>
