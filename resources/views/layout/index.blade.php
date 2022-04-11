<!DOCTYPE html>
<html lang="en">
<head>

    @include('component.style')
    
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('component.navbar')

  @include('component.sidebar')

  
  <div class="content-wrapper">
      @yield('content')
  </div>
 
  @include('component.footer')

  <aside class="control-sidebar control-sidebar-dark">

  </aside>
 
</div>


  @include('component.script')

  @stack('addon-script')
    
  @stack('js')

</body>
</html>
