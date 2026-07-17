<div class="sidebar p-3 position-fixed">

    <h3 class="text-white fw-bold mb-4">
        Sigma Store
    </h3>

    <ul class="nav flex-column">

        <!-- Dashboard -->
        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>

        <!-- Kategori -->
        <li class="nav-item mb-2">
            <a href="{{ route('kategori.index') }}"
               class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                <i class="bi bi-folder-fill me-2"></i>
                Kategori
            </a>
        </li>

        <!-- Produk -->
        <li class="nav-item mb-2">
            <a href="{{ route('produk.index') }}"
               class="nav-link {{ request()->routeIs('produk.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam me-2"></i>
                Produk
            </a>
        </li>

        <!-- Spacer -->
        <li class="mt-auto pt-5">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn btn-danger w-100">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    Logout
                </button>
            </form>
        </li>

    </ul>

</div>