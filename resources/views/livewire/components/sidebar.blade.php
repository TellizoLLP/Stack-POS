<div class="fixed w-[--tw-sidebar-width] lg:top-[--tw-header-height] top-0 bottom-0 z-20 hidden lg:flex flex-col items-stretch shrink-0 group py-3 lg:py-0"
    data-drawer="true" data-drawer-class="top-0 bottom-0 drawer drawer-start" data-drawer-enable="true|lg:false"
    id="sidebar">
    <div class="flex h-full grow shrink-0" id="sidebar_content">
        <div class="h-[calc(100dvh-4rem)] overflow-y-auto grow gap-2.5 shrink-0 flex items-center flex-col">
            <a class=" @if(Request::is('admin/dashboard')) active  @endif btn btn-icon btn-icon-lg rounded-full size-10 border border-transparent text-gray-600 hover:bg-light hover:text-primary hover:border-gray-300 [.active&amp;]:bg-light [.active&amp;]:text-primary [.active&amp;]:border-gray-300"
                data-tooltip="" data-tooltip-placement="right"  href="{{ route('admin.dashboard') }}">
                <span class="menu-icon">
                    <i class="ki-filled ki-chart-line-star">
                    </i>
                </span>
                <span class="tooltip">
                    {{$lang->data['dashboard'] ?? 'Dashboard'}}
                </span>
            </a>
            @if (Auth::user()->can('add_order'))
            <a class=" @if(Request::is('admin/pos')) active  @endif btn btn-icon btn-icon-lg rounded-full size-10 border border-transparent text-gray-500 hover:bg-light hover:text-primary hover:border-gray-300 [.active&amp;]:bg-light [.active&amp;]:text-primary [.active&amp;]:border-gray-300"
                data-tooltip="" data-tooltip-placement="right" href="{{ route('admin.pos') }}">
                <span class="menu-icon">
                    <i class="ki-filled ki-cheque">
                    </i>
                </span>
                <span class="tooltip">
                    {{$lang->data['pos'] ?? 'POS'}}
                </span>
            </a>
            @endif
            @if (Auth::user()->can('add_order') ||Auth::user()->can('orders_list') ||Auth::user()->can('edit_order') || Auth::user()->can('delete_order'))
            <a class=" @if(Request::is('admin/orders')) active  @endif btn btn-icon btn-icon-lg rounded-full size-10 border border-transparent text-gray-500 hover:bg-light hover:text-primary hover:border-gray-300 [.active&amp;]:bg-light [.active&amp;]:text-primary [.active&amp;]:border-gray-300"
                data-tooltip="" data-tooltip-placement="right" href="{{ route('admin.orders') }}">
                <span class="menu-icon">
                    <i class="ki-filled ki-grid"></i>
                </span>
                <span class="tooltip">
                    {{$lang->data['orders'] ?? 'Orders'}}
                </span>
            </a>
            @endif
            @if (Auth::user()->can('view_status_screen') )
            <a class=" @if(Request::is('admin/orders/status-screen')) active  @endif btn btn-icon btn-icon-lg rounded-full size-10 border border-transparent text-gray-600 hover:bg-light hover:text-primary hover:border-gray-300 [.active&amp;]:bg-light [.active&amp;]:text-primary [.active&amp;]:border-gray-300"
                data-tooltip="" data-tooltip-placement="right"  href="{{ route('admin.order_status_screen') }}">
                <span class="menu-icon">
                    <i class="ki-filled ki-check-circle"></i>
                </span>
                <span class="tooltip">
                    {{$lang->data['order_status_screen'] ?? 'Order Status Screen'}}
                </span>
            </a>
            @endif
            @if (Auth::user()->can('customers_list'))
            <a class=" @if(Request::is('admin/customers')) active  @endif btn btn-icon btn-icon-lg rounded-full size-10 border border-transparent text-gray-600 hover:bg-light hover:text-primary hover:border-gray-300 [.active&amp;]:bg-light [.active&amp;]:text-primary [.active&amp;]:border-gray-300"
                data-tooltip="" data-tooltip-placement="right"   href="{{ route('admin.customers') }}">
                <span class="menu-icon">
                    <i class="ki-filled ki-users">
                    </i>
                </span>
                <span class="tooltip">
                    {{$lang->data['customers']??'Customers'}}
                </span>
            </a>
            @endif
            @if (Auth::user()->can('products_list') ||Auth::user()->can('categories_list'))
            <a class=" @if(Request::is('admin/inventory')) active  @endif btn btn-icon btn-icon-lg rounded-full size-10 border border-transparent text-gray-600 hover:bg-light hover:text-primary hover:border-gray-300 [.active&amp;]:bg-light [.active&amp;]:text-primary [.active&amp;]:border-gray-300"
                data-tooltip="" data-tooltip-placement="right"   href="{{route('admin.view_inventory')}}">
                <span class="menu-icon">
                    <i class="ki-filled ki-shop"></i>
                </span>
                <span class="tooltip">
                    {{$lang->data['inventory']??'Inventory'}}
                </span>
            </a>
            @endif
            @if (Auth::user()->can('tables_list'))
            <a class=" @if(Request::is('admin/tables')) active  @endif btn btn-icon btn-icon-lg rounded-full size-10 border border-transparent text-gray-600 hover:bg-light hover:text-primary hover:border-gray-300 [.active&amp;]:bg-light [.active&amp;]:text-primary [.active&amp;]:border-gray-300"
                data-tooltip="" data-tooltip-placement="right"   href="{{ route('admin.tables') }}">
                <span class="menu-icon">
                    <i class="ki-filled ki-grid">
                    </i>
                </span>
                <span class="tooltip">
                    {{$lang->data['table']??'Table'}}
                </span>
            </a>
            @endif
            @if (Auth::user()->can('add_staff') ||Auth::user()->can('staffs_list') ||Auth::user()->can('edit_staff') || Auth::user()->can('delete_staff'))
            <a class=" @if(Request::is('admin/staffs')) active  @endif btn btn-icon btn-icon-lg rounded-full size-10 border border-transparent text-gray-600 hover:bg-light hover:text-primary hover:border-gray-300 [.active&amp;]:bg-light [.active&amp;]:text-primary [.active&amp;]:border-gray-300"
                data-tooltip="" data-tooltip-placement="right"   href="{{ route('admin.staffs') }}">
                <span class="menu-icon">
                    <i class="ki-filled ki-users"></i>
                </span>
                <span class="tooltip">
                    {{$lang->data['staffs']??'Staffs'}}
                </span>
            </a>
            @endif
            @if (Auth::user()->can('sales_report') || Auth::user()->can('day_wise_sales_report') || Auth::user()->can('item_wise_sales_report') || Auth::user()->can('customer_report'))
            <a class=" @if(Request::is('admin/reports')) active  @endif btn btn-icon btn-icon-lg rounded-full size-10 border border-transparent text-gray-600 hover:bg-light hover:text-primary hover:border-gray-300 [.active&amp;]:bg-light [.active&amp;]:text-primary [.active&amp;]:border-gray-300"
                data-tooltip="" data-tooltip-placement="right" href="{{route('admin.report_view')}}">
                <span class="menu-icon">
                    <i class="ki-filled ki-shop"></i>
                </span>
                <span class="tooltip">
                    {{$lang->data['reports']??'Reports'}}
                </span>
            </a>
            @endif
            @if (Auth::user()->can('translations_list') )
            <a class=" @if(Request::is('admin/translations')) active  @endif btn btn-icon btn-icon-lg rounded-full size-10 border border-transparent text-gray-600 hover:bg-light hover:text-primary hover:border-gray-300 [.active&amp;]:bg-light [.active&amp;]:text-primary [.active&amp;]:border-gray-300"
                data-tooltip="" data-tooltip-placement="right" href="{{ route('admin.translations') }}">
                <span class="menu-icon">
                    <i class="ki-filled ki-notepad-bookmark"></i>
                </span>
                <span class="tooltip">
                    {{$lang->data['translations']??'Translations'}}
                </span>
            </a>
            @endif
            @if (Auth::user()->can('account_settings') || Auth::user()->can('app_settings'))
            <a class=" @if(Request::is('admin/settings')) active  @endif btn btn-icon btn-icon-lg rounded-full size-10 border border-transparent text-gray-600 hover:bg-light hover:text-primary hover:border-gray-300 [.active&amp;]:bg-light [.active&amp;]:text-primary [.active&amp;]:border-gray-300"
                data-tooltip="" data-tooltip-placement="right" href="{{ route('admin.view_settings') }}">
                <span class="menu-icon">
                    <i class="ki-filled ki-setting-2">
                    </i>
                </span>
                <span class="tooltip">
                    {{$lang->data['settings']??'Settings'}}
                </span>
            </a>
            @endif
            {{-- <a class=" btn btn-icon btn-icon-lg rounded-full size-10 border border-transparent text-gray-600 hover:bg-light hover:text-primary hover:border-gray-300 [.active&amp;]:bg-light [.active&amp;]:text-primary [.active&amp;]:border-gray-300"
                 href="#" wire:click.prevent='logout'>
                <span class="menu-icon">
                    <i class="ki-filled ki-setting-2">
                    </i>
                </span>
                <span class="tooltip">
                    {{$lang->data['logout']??'Logout'}}
                </span>
            </a> --}}
        </div>
    </div>
</div>