<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column align-items-center">
            <div class="navbar nav_title" style="border: 0;font-size: 23px;">
                <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
              </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a class="{{ Route::is('admin.dashboard.index') ? 'text-white' : '' }} nav-link fw-bolder"
                        href="{{ route('admin.dashboard.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                        </svg>
                        Trang chủ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('admin.user.index') ? 'text-white' : '' }} nav-link fw-bolder"
                        href="{{ route('admin.user.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em" fill="currentColor"
                            class="bi bi-people-fill mb-1" viewBox="0 0 16 16">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        </svg>
                        Quản lý người dùng
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('admin.product.index') ? 'text-white' : '' }} nav-link fw-bolder"
                        href="{{ route('admin.product.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em" fill="currentColor"
                            class="bi bi-box-seam mb-1" viewBox="0 0 16 16">
                            <path
                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                        </svg>
                        Quản lý sản phẩm
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('admin.withdrawal.index') ? 'text-white' : '' }} nav-link fw-bolder"
                        href="{{ route('admin.withdrawal.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                        </svg>
                        Quản lý thông tin rút tiền
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
