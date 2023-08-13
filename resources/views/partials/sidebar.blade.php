<aside class="sidebar" id="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('home') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Desa 2024</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('sidomulyo.index') }}">
                <i class="bi bi-journal-text"></i><span>Sidomulyo</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('sidorejo.index') }}">
                <i class="bi bi-journal-text"></i><span>Sidorejo</span>
            </a>
        </li>

        <li class="nav-heading">Desa 2023</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('mundurejo.index') }}">
                <i class="bi bi-journal-text"></i><span>Mundurejo</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('pondokjoyo.index') }}">
                <i class="bi bi-journal-text"></i><span>Pondok Joyo</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('sumberagung.index') }}">
                <i class="bi bi-journal-text"></i><span>Sumberagung</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('sidomekar.index') }}">
                <i class="bi bi-journal-text"></i><span>Sidomekar</span>
            </a>
        </li>
        @if (Auth::user()->id == 1)
            <li class="nav-heading">Admin Panel</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('koordinator.index') }}">
                    <i class="bi bi-person"></i>
                    <span>Koordinator</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('register') }}">
                    <i class="bi bi-person"></i>
                    <span>Tambah Akun</span>
                </a>
            </li>
        @endif

    </ul>

</aside><!-- End Sidebar-->
