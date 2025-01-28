<div>
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{route('admin.dashboard')}}">
                <span class="sidebar-brand-text align-middle">
                    {{getStoreName()}}
                    <sup><small class="badge bg-primary text-uppercase">{{$lang->data['version']??'v2'}}</small></sup>
                </span>
                <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24"
                    fill="none" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter"
                    color="#FFFFFF" class="mm-3">
                    <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                    <path d="M20 12L12 16L4 12"></path>
                    <path d="M20 16L12 20L4 16"></path>
                </svg>
            </a>

            

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    {{$lang->data['pages']??'Pages'}}
                </li>
                <li class="sidebar-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">{{$lang->data['dashboard'] ?? 'Dashboard'}}</span>
                    </a>
                </li>
                @if (Auth::user()->can('add_order'))
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.pos') }}">
                        <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">{{$lang->data['pos'] ?? 'POS'}}</span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->can('add_order') ||Auth::user()->can('orders_list') ||Auth::user()->can('edit_order') || Auth::user()->can('delete_order'))
                <li
                    class="sidebar-item  {{ Request::is('admin/orders') || Request::is('admin/orders/view*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.orders') }}">
                        <i class="align-middle" data-feather="layout"></i> <span class="align-middle">{{$lang->data['orders'] ?? 'Orders'}}</span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->can('view_status_screen') )
                <li class="sidebar-item {{ Request::is('admin/orders/status-screen*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.order_status_screen') }}">
                        <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">{{$lang->data['order_status_screen'] ?? 'Order Status Screen'}}</span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->can('customers_list'))
                <li class="sidebar-item {{ Request::is('admin/customers*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin.customers') }}">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">{{$lang->data['customers']??'Customers'}}</span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->can('products_list') ||Auth::user()->can('categories_list'))
                <li class="sidebar-item {{ Request::is('admin/inventory/*') ? 'active' : '' }}">
                    <a data-bs-target="#forms" data-bs-toggle="collapse" class="sidebar-link collapsed">
                        <i class="align-middle" data-feather="check-circle"></i> <span
                            class="align-middle">{{$lang->data['inventory']??'Inventory'}}</span>
                    </a>
                    <ul id="forms"
                        class="sidebar-dropdown list-unstyled collapse {{ Request::is('admin/inventory/*') ? 'show' : '' }}"
                        data-bs-parent="#sidebar">
                        @if (Auth::user()->can('products_list'))
                        <li class="sidebar-item {{ Request::is('admin/inventory/products*') ? 'active' : '' }}"><a
                                class="sidebar-link" href="{{ route('admin.view_products') }}">{{$lang->data['products']??'Products'}}</a></li>
                        @endif
                        @if (Auth::user()->can('categories_list'))
                        <li class="sidebar-item {{ Request::is('admin/inventory/category*') ? 'active' : '' }}"><a
                                class=" sidebar-link" href="{{ route('admin.product_category') }}">{{$lang->data['category']??'Category'}}</a></li>
                        @endif
                    </ul>
                </li>
                @endif
            @if (Auth::user()->can('tables_list'))
            <li class="sidebar-item {{ Request::is('admin/tables*') ? 'active' : '' }}">
                <a class="sidebar-link " href="{{ route('admin.tables') }}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">{{$lang->data['table']??'Table'}}</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->can('add_staff') ||Auth::user()->can('staffs_list') ||Auth::user()->can('edit_staff') || Auth::user()->can('delete_staff'))
            <li class="sidebar-item {{ Request::is('admin/staff*') ? 'active' : '' }}">
                <a class="sidebar-link " href="{{ route('admin.staffs') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">{{$lang->data['staffs']??'Staffs'}}</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->can('sales_report') || Auth::user()->can('day_wise_sales_report') || Auth::user()->can('item_wise_sales_report') || Auth::user()->can('customer_report'))
            <li class="sidebar-item {{ Request::is('admin/reports*') ? 'active' : '' }}">
                <a data-bs-target="#reports" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="bar-chart"></i> <span class="align-middle">{{$lang->data['reports']??'Reports'}}</span>
                </a>
                <ul id="reports" class="sidebar-dropdown list-unstyled collapse {{ Request::is('admin/reports*') ? 'show' : '' }}" data-bs-parent="#sidebar">
                    @if (Auth::user()->can('sales_report'))
                        <li class="sidebar-item {{ Request::is('admin/reports/sales*') ? 'active' : '' }} "><a class="sidebar-link" href="{{route('admin.sales_report')}}">{{$lang->data['sales_report'] ?? 'Sales Report'}}</a>
                        </li>
                    @endif
                    @if (Auth::user()->can('day_wise_sales_report'))
                        <li class="sidebar-item {{ Request::is('admin/reports/day-wise*') ? 'active' : '' }} "><a class="sidebar-link" href="{{route('admin.daywise_report')}}">{{$lang->data['day_wise_report']??'Day Wise Sales
                                Report'}}</a></li>
                    @endif
                    @if (Auth::user()->can('item_wise_sales_report'))
                        <li class="sidebar-item {{ Request::is('admin/reports/item-sales*') ? 'active' : '' }} "><a class="sidebar-link" href="{{route('admin.item_sales_report')}}">{{$lang->data['item_wise_report']??'Item Wise
                                Sales Report'}}</a></li>
                    @endif
                    @if (Auth::user()->can('customer_report'))
                        <li class="sidebar-item {{ Request::is('admin/reports/customer*') ? 'active' : '' }} "><a class="sidebar-link" href="{{route('admin.customer_report')}}">{{$lang->data['customer_report']??'Customer Report'}}</a></li>
                    @endif

                </ul>
            </li>
            @endif
            @if (Auth::user()->can('translations_list') )
            <li class="sidebar-item {{ Request::is('admin/translations*') ? 'active' : '' }}">
                <a class="sidebar-link " href="{{ route('admin.translations') }}">
                    <i class="align-middle" data-feather="globe"></i> <span class="align-middle">{{$lang->data['translations']??'Translations'}}</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->can('account_settings') || Auth::user()->can('app_settings'))
            <li class="sidebar-item {{ Request::is('admin/settings*') ? 'active' : '' }}">
                <a data-bs-target="#settings" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="settings"></i> <span class="align-middle">{{$lang->data['settings']??'Settings'}}</span>
                </a>
                <ul id="settings" class="sidebar-dropdown list-unstyled collapse  {{ Request::is('admin/settings/*') ? 'show' : '' }}" data-bs-parent="#sidebar">
                    @if (Auth::user()->can('account_settings') )
                    <li class="sidebar-item {{ Request::is('admin/settings/account') ? 'active' : '' }}" ><a class="sidebar-link"
                            href="{{ route('admin.account_settings') }}">{{$lang->data['account_settings']??'Account Settings'}}</a>
                    </li>
                    @endif
                    @if (Auth::user()->can('app_settings') )
                    <li class="sidebar-item {{ Request::is('admin/settings/app') ? 'active' : '' }}"><a class="sidebar-link" href="{{ route('admin.app_settings') }}">{{$lang->data['app_settings']??'App
                            Settings'}}</a></li>
                    @endif
                </ul>
            </li>
            @endif
            <li class="sidebar-item">
                <a class="sidebar-link" href="#" wire:click.prevent='logout'>
                    <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">{{$lang->data['logout']??'Logout'}}</span>
                </a>
            </li>
            </ul>
        </div>
    </nav>
</div>
