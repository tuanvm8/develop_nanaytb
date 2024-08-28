<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column align-items-center">
            <div class="image">
                <a href="{{ route('admin.dashboard.index') }}" class="d-block">
                    <img src="{{ asset('asset/images/logo-white.jfif') }}" style="width:12.5rem !important; margin-left: -21px;" class="elevation-2" alt="User Image">
                </a>
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
                    <a class="{{ Route::is('admin.product.index') ? 'text-white' : '' }} nav-link fw-bolder"
                        href="{{ route('admin.product.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em" fill="currentColor"
                            class="bi bi-box-seam mb-1" viewBox="0 0 16 16">
                            <path
                                d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                        </svg>
                        Danh sách sản phẩm
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
                    <a class="{{ Route::is('admin.category.index') ? 'text-white' : '' }} nav-link fw-bolder"
                        href="{{ route('admin.category.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.1em" height="1.1em" fill="currentColor"
                            class="bi bi-columns-gap mb-1" viewBox="0 0 16 16">
                            <path
                                d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z" />
                        </svg>
                        Danh mục sản phẩm
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
