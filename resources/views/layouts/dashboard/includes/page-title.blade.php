<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        @if (Route::is('dashboard-home'))
        <li class="breadcrumb-item"><a href="{{ route('dashboard-home') }}">Home</a></li>
        @else
        <li class="breadcrumb-item"><a href="{{ route('dashboard-home') }}">Home</a></li>
        <li class="breadcrumb-item active">@yield ('page-title-1')</a></li>

        @endif
      </ol>
    </nav>
  </div><!-- End Page Title -->
