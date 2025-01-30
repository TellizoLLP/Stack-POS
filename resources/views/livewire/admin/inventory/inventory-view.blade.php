<div>
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div
            class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200  bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{$lang->data['inventory']??'Inventory'}}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="grow  w-full" role="content">
        <div class="pb-6 w-full ">
            <div class="flex gap-5 p-5">
                <div class="card p-5 grid grid-cols-1 lg:grid-cols-4 gap-5">
                    <div class="flex flex-col gap-2.5">
                        <i class="ki-filled ki-menu  text-2xl text-primary mb-1.5">
                        </i>
                        <div class="flex flex-col gap-3">
                            <h3 class="text-base font-medium leading-none text-gray-900">
                                @if (Auth::user()->can('products_list'))
                                <a href="{{ route('admin.view_products') }}">
                                    {{$lang->data['products']??'Products'}}
                                </a>
                                @endif
                            </h3>
                            <div class="text-2sm text-gray-700 leading-5">
                                An Extensive Overview of Products and Customization Options
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-5 grid grid-cols-1 lg:grid-cols-4 gap-5">
                    <div class="flex flex-col gap-2.5">
                        <i class="ki-filled ki-category text-2xl text-primary mb-1.5">
                        </i>
                        <div class="flex flex-col gap-3">
                            <h3 class="text-base font-medium leading-none text-gray-900">
                                @if (Auth::user()->can('categories_list'))
                                <a href="{{ route('admin.product_category') }}">
                                    {{$lang->data['category']??'Category'}}
                                </a>
                                @endif
                            </h3>
                            <div class="text-2sm text-gray-700 leading-5">
                                Manage and Organize Your Product Categories and Classification
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
