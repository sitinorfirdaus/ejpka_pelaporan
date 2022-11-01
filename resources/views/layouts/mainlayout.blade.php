<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
    {{-- ok --}}
</head>
<body class="main-body app sidebar-mini">

    {{-- ok --}}
    @include('partials.loader')


    {{-- page --}}
    <div class="page">

        {{-- main-sidebar --}}
        @include('partials.mainsidebar')
        {{-- main-sidebar --}}
        {{-- ok --}}

        {{-- main content opened --}}
        <div class="main-content app-content">

            {{-- main-header --}}
            @include('partials.nav')
            {{-- end main-header --}}

            {{-- container --}}
            <div class="container-fluid">

                @yield('content')
                {{-- 1. breadcrumb --}}
                {{-- 2. row opened and closed --}}
            </div>
            {{-- end container --}}

        </div>
        {{-- main content close --}}

        {{-- footer opened --}}
        @include('partials.footer')
        {{-- footer closed --}}

    </div>
    {{-- end page --}}
    @include('partials.backtotop')
    @include('partials.footer-scripts')
</body>
</html>

