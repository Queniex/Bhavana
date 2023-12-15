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
                    @include('Admin/navbar')
    
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
