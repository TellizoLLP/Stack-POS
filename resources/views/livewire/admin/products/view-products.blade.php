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



            {{-- @if (Auth::user()->can('add_product'))
                <div class="col-auto ms-auto text-end mt-n1">
                    <a href="{{ route('admin.add_products') }}"
                        class="btn btn-primary">{{ $lang->data['new_product'] ?? 'New Product' }}</a>
                </div>
            @endif --}}
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
                                        <td><span class="badge bg-dark">{{ $item->category->name }}</span></td>
                                        <td><span
                                                class="badge {{ $item->is_active == 1 ? 'bg-success' : 'bg-secondary' }}">{{ $item->is_active == 1 ? $lang->data['active'] ?? 'Active' : $lang->data['inactive'] ?? 'Inactive' }}</span>
                                        </td>
                                        <td>
                                            @if (Auth::user()->can('add_addon'))
                                                <a href="{{ route('admin.addons', $item->id) }}"
                                                    class="btn btn-sm btn-success">{{ $lang->data['add_addons'] ?? 'Add Addons' }}</a>
                                            @endif

                                            @if (Auth::user()->can('edit_product'))
                                                <a href="{{ route('admin.edit_product', $item->id) }}"
                                                    class="btn btn-sm btn-primary">{{ $lang->data['edit'] ?? 'Edit' }}</a>
                                            @endif

                                            @if (Auth::user()->can('delete_product'))
                                                <a href="#" class="btn btn-sm btn-danger"
                                                    wire:click="delete({{ $item }})">{{ $lang->data['delete'] ?? 'Delete' }}</a>
                                            @endif

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
