<div class="sidebar col-md-3 col-lg-2 p-10 bg-body-tertiary bg-dark position-fixed rounded-2">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header bg-dark">
            <h5 class="offcanvas-title text-white"  id="sidebarMenuLabel">
                Monnotes
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto bg-dark justify-between">
            <h2 class="d-flex align-items-center gap-4 pt-2 pb-2"> <a href="/dashboard" class="text-white text-decoration-none">Monnotes</a></h2>
            <hr class="text-white">
            <ul class="nav flex-column bg-dark">
                <li class="nav-item mt-2 mb-2">
                    <a class="nav-link d-flex align-items-center gap-4 pt-4 pb-4 {{ $active === 'my_stats' ? 'active' : '' }}" href="/dashboard">
                        <i class="bx bx-bar-chart-alt-2"></i>
                        My Stats
                    </a>
                </li>
                <li class="nav-item mt-2 mb-2">
                    <a class="nav-link d-flex align-items-center gap-4 pt-4 pb-4 {{ $active === 'add_incomes' ? 'active' : '' }}" href="/dashboard/income">
                        <i class='bx bx-wallet'></i>
                        Add Incomes
                    </a>
                </li>
                <li class="nav-item mt-2 mb-2">
                    <a class="nav-link d-flex align-items-center gap-4 pt-4 pb-4 {{ $active === 'add_expenses' ? 'active' : '' }}" href="/dashboard/expense" >
                        <i class='bx bx-money'></i>
                        Add Expenses
                    </a>
                </li>
                <li class="nav-item mt-2 mb-2">
                    <a class="nav-link d-flex align-items-center gap-4 pt-4 pb-4 {{ $active === 'view_tables' ? 'active' : '' }}" href="/dashboard/{{ auth()->user()->username }}/tables">
                        <i class='bx bx-table'></i>
                        View Tables
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column bg-dark">
                <hr class="text-white">
                <li class="nav-item mt-2 mb-2">
                    <a class="nav-link d-flex align-items-center gap-4 pt-4 pb-4" href="/dashboard">
                        <i class="bx bx-bar-chart-alt-2"></i>
                        Profile
                    </a>
                </li>
                <li class="nav-item mt-2 mb-2">
                    <a class="nav-link d-flex align-items-center gap-4 pt-4 pb-4" href="/dashboard/income">
                        <i class='bx bx-wallet'></i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
