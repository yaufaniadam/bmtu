<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
    aria-expanded="false">
    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $employee_name }}</span>
    <img class="img-profile rounded-circle"
        src="{{ url('image?file='.$employee_photo) ?? asset('img/undraw_profile.svg') }}">
</a>
