<div class="user-nav">
    <p class="pull-left">
        👋 Hello, {{ Auth::user()->name }}.
    </p>
    <a class="pull-right" href="{{ route('logout') }}">Logout</a>
</div>
<div class="user-nav-spacing"></div>