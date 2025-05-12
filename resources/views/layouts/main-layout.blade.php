<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.8">

        <title>Kontoret</title>

        <link rel="shortcut icon" href="/images/favicon.png">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
        <link href="{{ asset('/css/buttons.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('/js/jquery.js') }}"></script>
        <script src="{{ asset('/js/apexcharts.js') }}"></script>
        <script src="{{ asset('/js/select3.js') }}"></script>
        <script src="{{ asset('/js/XLSX.js') }}"></script>
        <script src="{{ asset('/js/main.js') }}"></script>
    </head>
    <body>
        <header>
            @php $navigationItems = App\Models\NavigationItem::where('parent_id',null)->orderBy('order')->get(); @endphp
            <div id="headerbox" style="justify-content: space-between;">
                <div id="mainlogo">
                    <div style="display: flex;flex-direction: column;align-items: center"><img onclick="window.location.href = '/'" src="{{ asset('images/mainlogo_medium.png') }}" alt="Header logo" height="60px" style="padding: 10px 0px;cursor:pointer" /></div>
                </div>
            </div>
        </header>
        <main>
            <div id="nav">
                <ul>
                    @include('layouts.menu')
                </ul>
            </div>
            <script>
                function toggleDropdown(event, dropdown){
                    event.stopPropagation();
                    $(dropdown.querySelector('ul')).slideToggle(200);
                    if(dropdown.classList.contains('open')){
                        dropdown.querySelector('.dropdownarrow').style.rotate = "180deg";
                        dropdown.classList.remove('open');
                    }
                    else {
                        dropdown.querySelector('.dropdownarrow').style.rotate = "360deg";
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
                                parent.querySelector('.dropdownarrow').style.rotate = "360deg";
                                parent.classList.add('open');
                                parent = parent.parentElement.closest('.dropdown');
                            }
                        }
                    }
                }
                showMenuItem();
            </script>
            <messagecontainer></messagecontainer>
            <maincontainer>
                @yield('content')
            </maincontainer>
        </main>
    </body>
    <script>
        var popupZindex = 100;
    </script>
</html>