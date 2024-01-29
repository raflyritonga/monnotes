<div class="sidebar col-md-3 col-lg-2 p-10 bg-body-tertiary bg-dark position-fixed rounded-2">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        {{-- <div class="offcanvas-header bg-dark">
            <h5 class="offcanvas-title text-white"  id="sidebarMenuLabel">
                Monnotes
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div> --}}

        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto bg-dark justify-between">
            <h2 class="d-flex align-items-center gap-4 pt-2 pb-2"> <a href="/dashboard" class="text-white text-decoration-none">Monnotes</a></h2>
            <p class="offcanvas-title text-white">Hai {{ auth()->user()->name }}!</p>
            <hr class="text-white">
            <ul class="nav flex-column bg-dark">
                <li class="nav-item mt-2 mb-2">
                    <a class="nav-link d-flex align-items-center gap-4 pt-4 pb-4 " href="/dashboard">
                        <i class="bx bx-bar-chart-alt-2"></i>
                        My Stats
                    </a>
                </li>
                <li class="nav-item mt-2 mb-2">
                    <a class="nav-link d-flex align-items-center gap-4 pt-4 pb-4" href="/dashboard/income">
                        <i class='bx bx-wallet'></i>
                        Add Incomes
                    </a>
                </li>
                <li class="nav-item mt-2 mb-2">
                    <a class="nav-link d-flex align-items-center gap-4 pt-4 pb-4" href="/dashboard/expense" >
                        <i class='bx bx-money'></i>
                        Add Expenses
                    </a>
                </li>
                <li class="nav-item mt-2 mb-2">
                    <a class="nav-link d-flex align-items-center gap-4 pt-4 pb-4" href="/dashboard/tables?username={{ auth()->user()->username }}">
                        <i class='bx bx-table'></i>
                        View Tables
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column bg-dark">
                <hr class="text-white">
                <li class="nav-item mt-2 mb-2">
                    <a class="nav-link d-flex align-items-center gap-4 pt-4 pb-4" href="/dashboard/profile">
                        <i class='bx bxs-user'></i>
                        Profile
                    </a>
                </li>
                <li class="nav-item mt-2 mb-2">
                    <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="nav-link d-flex align-items-center gap-4 pt-4 pb-4" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class='bx bxs-log-out'></i>
                                Logout
                            </a>
                        </form>
                </li>

                <!-- Authentication -->

            </ul>
        </div>
    </div>
</div>
