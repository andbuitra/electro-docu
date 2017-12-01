<!DOCTYPE html>
<html lang="es" ng-App="demoapp">
<head>
    @include('includes.dashboard.head')
    <title>Electro Cucuta Ltda</title>
</head>
<body>
    <div class="page home-page">
        @include('includes.dashboard.navbar')
        <div class="page-content d-flex align-items-stretch">
            @include('includes.dashboard.sidebar-subheader')
            @yield('content')
            @include('includes.dashboard.footer')
        </div>
    </div>

    @include('includes.dashboard.scripts')
    @yield('js')
    
</body>
</html>