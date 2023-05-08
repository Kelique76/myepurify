<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarPanel">
    <div class="offcanvas-body">
        <!-- profile box -->
        <div class="profileBox">
            <div class="image-wrapper">
                <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged rounded">
            </div>
            <div class="in">
                @guest
                <strong>MD user</strong>
                @else
                <strong>{{Auth::user()->name}}</strong>
                @endguest
                <div class="text-muted">
                    <ion-icon name="location"></ion-icon>
                    MD shops
                </div>
            </div>
            <a href="#" class="close-sidebar-button" data-bs-dismiss="offcanvas">
                <ion-icon name="close"></ion-icon>
            </a>
        </div>
        <!-- * profile box -->

        <ul class="listview flush transparent no-line image-listview mt-2">
            <li>
                <a href="index.html" class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="home-outline"></ion-icon>
                    </div>
                    <div class="in">
                        Discover
                    </div>
                </a>
            </li>

            <li>
                <div class="item">
                    <div class="icon-box bg-primary">
                        <ion-icon name="moon-outline"></ion-icon>
                    </div>
                    <div class="in">
                        <div>Dark Mode</div>
                        <div class="form-check form-switch">
                            <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodesidebar">
                            <label class="form-check-label" for="darkmodesidebar"></label>
                        </div>
                    </div>
                </div>
            </li>
        </ul>


    </div>
    <!-- sidebar buttons -->
    <div class="sidebar-buttons">
        <a href="#" class="button">
            <ion-icon name="person-outline"></ion-icon>
        </a>
        <a href="#" class="button">
            <ion-icon name="archive-outline"></ion-icon>
        </a>
      

        @guest
        @if (Route::has('login'))
        <a class="button" href="{{ route('login') }}">
            <ion-icon name="log-in-outline"></ion-icon>
        </a>
        @endif

        @if (Route::has('register'))
        <a class="button" href="{{ route('register') }}">
            <ion-icon name="create-outline"></ion-icon>
        </a>
        @endif
        @else
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="button">
            <ion-icon name="log-out-outline"></ion-icon>
        </a>
        {{-- <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> {{ __('Logout') }}
        </a> --}}

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        @endguest

    </div>
    <!-- * sidebar buttons -->
</div>