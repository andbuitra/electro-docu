<!DOCTYPE html>
<html lang="es">
<head>
    @include('includes.dashboard.head')
    <title>Electro Cucuta Ltda</title>
</head>
<body>
    @include('includes.dashboard.navbar')
    
    <div class='page home-page'>
        <div class="page-content d-flex align-items-stretch">
            @include('includes.dashboard.sidebar')
            <div class="content-inner">
                @include('includes.dashboard.subheader')
            </div>
        </div>
    </div>
    

    @yield('body')
    

    @include('includes.dashboard.scripts')
</body>
</html>