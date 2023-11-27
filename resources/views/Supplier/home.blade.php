<!DOCTYPE html>
<html>
    @include('Admin/head')
    <body class="antialiased">
        <div id="app">
            <div class="wrapper">
                <!-- Sidebar Holder -->
                @include('Supplier/left-sidebar')
    
                <!-- Page Content Holder -->
                <div id="content">
    
                    {{-- Top Bar --}}
                    @include('Supplier/navbar')
    
                    <router-view></router-view>
                </div>
            </div>    
        </div>
    
        {{-- script --}}
        @include('Admin/script')
    </body>
</html>