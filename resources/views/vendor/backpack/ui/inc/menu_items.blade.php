<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="3" width="7" height="7" />
            <rect x="14" y="3" width="7" height="7" />
            <rect x="14" y="14" width="7" height="7" />
            <rect x="3" y="14" width="7" height="7" />
        </svg>
        <span>Dashboard</span>
    </a>
</li>

@if (backpack_user()->hasAnyRole(['admin', 'psb', 'pengasramaan', 'logistik']))
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('santri') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
            </svg>
            <span>Data Santri</span>
        </a>
    </li>
@endif

@if (backpack_user()->hasAnyRole(['admin', 'psb', 'logistik', 'pengasramaan']))
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('santri-logistik') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M20 6h-2.18c.07-.44.18-.86.18-1.3C18 2.55 16.45 1 14.5 1c-1.74 0-2.99 1.12-3.99 2.5C9.49 2.12 8.24 1 6.5 1 4.55 1 3 2.55 3 4.7c0 .44.11.86.18 1.3H1v2h2l1.86 9.3c.24 1.23 1.3 2.1 2.57 2.1h9.14c1.27 0 2.33-.87 2.57-2.1L21 8h1V6h-2z" />
            </svg>
            <span>Logistik Santri</span>
        </a>
    </li>
@endif

@if (backpack_user()->hasAnyRole(['admin', 'psb', 'logistik']))
    <li class="nav-item nav-item-header mt-3">
        <div class="nav-link nav-link-secondary text-uppercase font-weight-bold small">Master Data</div>
    </li>
@endif

@if (backpack_user()->hasAnyRole(['admin', 'psb']))
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('lembaga-pendidikan') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path d="M12 3L1 9l4 2.18V15h1v3H5v2h14v-2h-1v-3h1V11.18L19 9v1h2V9L12 3zm5 12v3H7v-3h10z" />
            </svg>
            <span>Lembaga Pendidikan</span>
        </a>
    </li>
@endif

@if (backpack_user()->hasAnyRole(['admin', 'psb', 'logistik']))
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('logistik') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 14l-5-5 1.41-1.41L12 14.17l7.59-7.59L21 8l-9 9z" />
            </svg>
            <span>Master Logistik</span>
        </a>
    </li>
@endif

@if (backpack_user()->hasRole('admin'))
    <li class="nav-item">
        <a class="nav-link" href="{{ backpack_url('user') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="nav-icon" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path
                    d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
            </svg>
            <span>Manajemen Pengguna</span>
        </a>
    </li>
@endif
