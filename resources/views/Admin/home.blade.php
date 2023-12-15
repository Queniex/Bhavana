{{-- <!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.head')
</head>

<body class="antialiased">
    <div class="wrapper" id="app">
        @include('Admin.left-sidebar')
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                @include('Admin.navbar')
            </nav>
            <main class="content px-3 py-2" id="content">
                <div class="container-fluid">
                    <router-link></router-link>
                </div>
            </main>
        </div>
    </div>
    
    @include('Admin.script')
</body>
</html> --}}

<!DOCTYPE html>
<html>
    @include('Admin/head')
    <body class="antialiased">
        <div id="app">
            <div class="wrapper">
                <!-- Sidebar Holder -->
                @include('Admin/left-sidebar')
    
                <!-- Page Content Holder -->
                <div id="content">
    
                    <nav class="navbar navbar-expand px-3 border-bottom">
                        @include('Admin.navbar')
                    </nav>
    
                    <router-view></router-view>
                </div>
            </div>    
        </div>
    
        {{-- script --}}
        @include('Admin/script')

        @if (Session::has('berhasil'))
        <script>
            toastr.options = {
                "progressBar" : true,
                "closeButton" : true,
            }
            toastr.success("{{ Session::get('berhasil') }}", "Sukses!", {timeout:12000});
        </script>
        @endif
    </body>
</html>