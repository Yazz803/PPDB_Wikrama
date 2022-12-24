<!--header-->
<header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#" style="font-size: 15px"><em>SMK</em> Wikrama Bogor</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li><a href="#section1">Home</a></li>
        <li><a href="#section2">Jurusan</a></li>
        <li><a href="#section4">Testimoni</a></li>
        <!-- <li><a href="#section5">Video</a></li> -->
        <li><a href="#section6">Contact</a></li>
        @Auth
        <li><a href="{{ route('dashboard.index') }}" class="external">Dashboard</a></li>
        @else
        <li><a href="{{ route('login.index') }}" class="external">Login</a></li>
        @endif
      </ul>
    </nav>
  </header>