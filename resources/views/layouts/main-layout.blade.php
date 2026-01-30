<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kontoret | Admin</title>
        <link rel="shortcut icon" href="/images/favicon.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
        <link href="{{ asset('css/buttons.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/apexcharts.js') }}"></script>
        <script src="{{ asset('js/select3.js') }}"></script>
        <script src="{{ asset('js/XLSX.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </head>
    <body>
        <header>
            @php $navigationItems = App\Models\NavigationItem::where('parent_id',null)->orderBy('order')->get(); @endphp
            <div id="headerbox" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                <div id="mainlogo">
                    <img onclick="window.location.href = '/'" src="{{ asset('images/mainlogo_medium.png') }}" alt="Logo" style="cursor:pointer" />
                </div>
                @auth
                <div id="header-actions" style="margin-right: 30px;">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-ghost btn-little" style="display: flex; align-items: center; gap: 8px;">
                            <span class="material-symbols-outlined" style="font-size: 20px;">logout</span>
                            Logout
                        </button>
                    </form>
                </div>
                @endauth
            </div>
        </header>
        <main>
            <div id="nav">
                <div style="padding: 10px 16px; font-size: 0.8rem; text-transform: uppercase; color: var(--text-secondary); letter-spacing: 1px;">Menu</div>
                <ul>
                    @include('layouts.menu')
                </ul>
            </div>
            <script>
                function toggleDropdown(event, dropdown){
                    event.stopPropagation();
                    $(dropdown.querySelector('ul')).slideToggle(200);
                    const arrow = dropdown.querySelector('.dropdownarrow');
                    if(dropdown.classList.contains('open')){
                        arrow.style.transform = "rotate(0deg)";
                        dropdown.classList.remove('open');
                    }
                    else {
                        arrow.style.transform = "rotate(180deg)";
                        dropdown.classList.add('open');
                    }
                }
    
                function showMenuItem(){
                    const route = window.location.pathname;
                    if(route){
                        let pageButton = document.querySelector(`[route="${route}"]`);
                        if(pageButton){
                            pageButton.classList.add('active');
                            let parent = pageButton.closest('.dropdown');
                            while (parent) {
                                $(parent.querySelector('ul')).show();
                                const arrow = parent.querySelector('.dropdownarrow');
                                if(arrow) arrow.style.transform = "rotate(180deg)";
                                parent.classList.add('open');
                                parent = parent.parentElement.closest('.dropdown');
                            }
                        }
                    }
                }
                showMenuItem();
            </script>
            <main-content>
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </main-content>
        </main>
    </body>
    <script>
        var popupZindex = 100;
    </script>
</html>