<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
    aria-expanded="false">
    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Profil Saya</span>
    <img class="img-profile rounded-circle"

    @php
        $photo = ($employee_photo) ? 'image?file=' . $employee_photo : asset('img/noprofileimg.jpg');
    @endphp
        src="{{ url( $photo )  }}">
</a>
