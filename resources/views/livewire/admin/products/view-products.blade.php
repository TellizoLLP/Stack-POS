<div>
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div
            class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200  bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{ $lang->data['products'] ?? 'Products' }}
                        </h1>
                    </div>
                    <div class="flex items-center gap-1">
                        @if (Auth::user()->can('add_product'))
                        <a class="btn btn-light btn-sm " data-modal-toggle="#ModalCustomer"
                            href="{{ route('admin.add_products') }}">
                            {{ $lang->data['new_product'] ?? 'New Product' }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="w-full grow">
        <div class="min-w-full card card-grid rounded-none border-none shadow-none">
            <div class="card-body">
                <div>
                    <div class="scrollable-x-auto">
                        <table class="table table-auto table-border ">
                            <thead>
                                <tr>
                                    <th class="tw-5">{{ $lang->data['sl'] ?? 'Sl' }}</th>
                                    <th class="tw-40">{{ $lang->data['name'] ?? 'Name' }}</th>
                                    <th class="tw-15">{{ $lang->data['price'] ?? 'Price' }}</th>
                                    <th class="tw-15">{{ $lang->data['category'] ?? 'Category' }}</th>
                                    <th class="tw-10">{{ $lang->data['status'] ?? 'Status' }}</th>
                                    <th class="tw-15">{{ $lang->data['actions'] ?? 'Actions' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ getCurrency() }}{{ $item->price }}</td>
                                    <td><span class="badge badge-sm badge-outline">{{ $item->category->name }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-sm badge-outline {{ $item->is_active == 1 ? 'badge-success text-white' : 'badge-secondary text-white' }}">
                                            {{ $item->is_active == 1 ? $lang->data['active'] ?? 'Active' : $lang->data['inactive'] ?? 'Inactive' }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div>
                                                @if (Auth::user()->can('add_addon'))
                                                <a class="menu-link" href="{{ route('admin.addons', $item->id) }}">
                                                    <span class="menu-icon">
                                                        <i class="ki-filled ki-plus text-lg hover:text-green-600">
                                                        </i>
                                                    </span>
                                                </a>
                                                @endif
                                            </div>
                                            <div>
                                                @if (Auth::user()->can('edit_product'))
                                                <a class="menu-link" href="{{ route('admin.edit_product', $item->id) }}">
                                                    <span class="menu-icon">
                                                        <i class="ki-filled ki-pencil text-lg hover:text-blue-500">
                                                        </i>
                                                    </span>
                                                </a>
                                                @endif
                                            </div>
                                            <div>
                                                @if (Auth::user()->can('delete_product'))
                                                <a class="menu-link">
                                                    <i class="ki-filled ki-trash text-lg hover:text-red-500"
                                                        wire:click="delete({{ $item }})">
                                                    </i>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($products) == 0)
                        <x-no-data-component
                            message="{{ $lang->data['no_products_found'] ?? 'No products were found..' }}" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>