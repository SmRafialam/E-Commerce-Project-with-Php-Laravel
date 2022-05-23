
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- head -->
    @include('backend.includes.head')
    <!-- CSS -->
    @include('backend.includes.css')
  </head>

  <body>

    <!-- Sidebar -->
    @include('backend.includes.sidebar')
    <!-- Topbar -->
    @include('backend.includes.topbar')
    <!-- Rightbar -->
    @include('backend.includes.rightbar')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

      @yield('content')

      <!-- footer -->
      @include('backend.includes.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- Script -->
    @include('backend.includes.scripts')
  </body>
</html>

