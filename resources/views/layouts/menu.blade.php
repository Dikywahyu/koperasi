<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
        <ul class="menu-inner">
            <!-- Dashboards -->
            <li class="menu-item active">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-home-smile-line"></i>
                    <div data-i18n="Dashboards">Dashboards</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="app-ecommerce-dashboard.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-hand-heart-line"></i>
                            <div data-i18n="Simpan Pinjam">Simpan Pinjam</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="dashboards-crm.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-restaurant-line"></i>
                            <div data-i18n="Toko dan Depot">Toko dan Depot</div>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="{{ url('/') }}" class="menu-link">
                            <i class="menu-icon tf-icons ri-anchor-line"></i>
                            <div data-i18n="Keramba">Keramba</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="app-logistics-dashboard.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-truck-line"></i>
                            <div data-i18n="Bisnis Lain">Bisnis Lain</div>
                        </a>
                    </li>



                    <li class="menu-item">
                        <a href="app-academy-dashboard.html" class="menu-link">
                            <i class="menu-icon ri-money-dollar-box-fill"></i>
                            <div data-i18n="SHU">SHU</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="app-academy-dashboard.html" class="menu-link">
                            <i class="menu-icon tf-icons ri-book-open-line"></i>
                            <div data-i18n="FAT">FAT</div>
                        </a>
                    </li>
                </ul>
            </li>

            @php
            use Illuminate\Support\Facades\Auth;
            use Spatie\Permission\Models\Permission;
            use App\Models\Menu;

            $user = Auth::user();
            $permissions = $user->getAllPermissions()->pluck('id')->toArray(); // Ambil ID permission user


            $menus = Menu::with(['children.children', 'children', 'permission']) // support nested
            ->whereNull('parent_id')
            ->orderBy('order')
            ->get();
            @endphp

            @foreach ($menus as $menu)
            @if (!$menu->permission_id || in_array($menu->permission_id, $permissions))
            <li class="menu-item {{ request()->routeIs($menu->route) ? 'active' : '' }}">
                <a href="{{ $menu->route ? route($menu->route) : 'javascript:void(0)' }}"
                    class="menu-link {{ $menu->children->count() ? 'menu-toggle' : '' }}">
                    <i class="menu-icon tf-icons {{ $menu->icon }}"></i>
                    <div data-i18n="{{ $menu->title }} ">{{ $menu->title }}</div>
                </a>

                @if ($menu->children->count())
                <ul class="menu-sub">
                    @foreach ($menu->children as $child)
                    @if (!$child->permission_id || in_array($child->permission_id, $permissions))
                    <li class="menu-item {{ request()->routeIs($child->route) ? 'active' : '' }}">
                        <a href="{{ $child->route ? route($child->route) : 'javascript:void(0);' }}" class="menu-link {{ $child->children->count() ? 'menu-toggle' : '' }}">
                            <i class="menu-icon tf-icons {{ $child->icon }}"></i>
                            <div data-i18n="{{ $child->title }} ">{{ $child->title }}</div>
                        </a>
                        @if ($child->children->count())
                        <ul class="menu-sub">
                            @foreach ($child->children as $children)
                            @if (!$children->permission_id || in_array($children->permission_id, $permissions))
                            <li class="menu-item {{ request()->routeIs($children->route) ? 'active' : '' }}">
                                <a href="{{ $children->route ? route($children->route) : 'javascript:void(0);' }}" class="menu-link">
                                    <i class="menu-icon tf-icons {{ $children->icon }}"></i>
                                    <div data-i18n="{{ $children->title }} ">{{ $children->title }}</div>
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endif
                    @endforeach
                </ul>
                @endif
            </li>
            @endif
            @endforeach

        </ul>
    </div>
</aside>