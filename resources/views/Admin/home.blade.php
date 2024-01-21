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

        <script src="js/app.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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