<div>
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div
            class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200  bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{ $lang->data['customers'] ?? 'Customers' }}
                        </h1>
                    </div>
                    <div class="flex items-center gap-1">
                        @if (Auth::user()->can('add_customer'))
                            <a class="btn btn-light btn-sm " data-modal-toggle="#ModalCustomer" href="#"
                                wire:click="resetFields">
                                {{ $lang->data['new_customer'] ?? 'New Customer' }}
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
                                    <th class="tw-35">{{ $lang->data['name'] ?? 'Name' }}</th>
                                    <th class="tw-15">{{ $lang->data['phone'] ?? 'Phone' }}</th>
                                    <th class="tw-35">{{ $lang->data['address'] ?? 'Address' }}</th>
                                    <th class="tw-10">{{ $lang->data['actions'] ?? 'Actions' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ Str::limit($item->address, 60) }}</td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <div>
                                                    @if (Auth::user()->can('edit_customer'))
                                                        <a class="menu-link" data-modal-toggle="#EditModalCustomer">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-pencil text-lg hover:text-blue-500"
                                                                    wire:click='edit({{ $item }})'>
                                                                </i>
                                                            </span>
                                                        </a>
                                                    @endif
                                                </div>
                                                <div>
                                                    @if (Auth::user()->can('delete_customer'))
                                                        <a class="menu-link">
                                                            <i class="ki-filled ki-trash text-lg hover:text-red-500"
                                                                wire:click="delete({{ $item }})">
                                                            </i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        {{-- <td>
                                    @if (Auth::user()->can('edit_customer'))
                                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#EditModalCustomer" wire:click='edit({{$item}})'>{{$lang->data['edit']??'Edit'}}</a>
                                    @endif
                                    @if (Auth::user()->can('delete_customer'))
                                    <a href="#" class="btn btn-sm btn-danger" wire:click="delete({{$item}})">{{$lang->data['delete']??'Delete'}}</a>
                                    @endif
                                </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($customers) == 0)
                            <x-no-data-component message="No Customers were found" messageindex="no_customers_found" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" data-modal="true" data-modal-disable-scroll="false" id="ModalCustomer" wire:ignore.self>
            <div class="modal-content max-w-[700px] top-5 lg:top-[15%]">
                <div class="modal-header pr-2.5">
                    <h3 class="modal-title">
                        {{ $lang->data['add_new_customer'] ?? 'Add New Customer' }}
                    </h3>
                    <button class="btn btn-sm btn-icon btn-light btn-clear shrink-0" data-modal-dismiss="true">
                        <i class="ki-filled ki-cross">
                        </i>
                    </button>
                </div>
                <div class="grid gap-5 px-0 py-5 modal-body">
                    <div class="grid grid-cols-2 gap-5 px-4">
                        <div class="flex flex-col gap-2.5">
                            <div class="flex gap-1 flex-center">
                                <label class="font-semibold text-gray-900 text-2sm">
                                    {{ $lang->data['name'] ?? 'Name' }} <span class="text-red-500">*</span>
                                </label>
                            </div>
                            <label class="input">
                                <input type="text" placeholder="{{ $lang->data['name'] ?? 'Name' }}"
                                    wire:model="name" />
                            </label>
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2.5">
                            <div class="flex gap-1 flex-center">
                                <label class="font-semibold text-gray-900 text-2sm">
                                    {{ $lang->data['phone_number'] ?? 'Phone Number' }} <span
                                        class="text-red-500">*</span>
                                </label>
                            </div>
                            <label class="input">
                                <input type="number" placeholder="{{ $lang->data['phone'] ?? 'Phone' }}"
                                    wire:model="phone" />
                            </label>
                            @error('phone')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col col-span-2 gap-2.5">
                            <div class="flex gap-1 flex-center">
                                <label class="font-semibold text-gray-900 text-2sm">
                                    {{ $lang->data['email'] ?? 'Email' }}
                                </label>
                            </div>
                            <label class="input">
                                <input type="text" placeholder="{{ $lang->data['email'] ?? 'Email' }}"
                                    wire:model="email" />
                            </label>
                            @error('email')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2.5 col-span-2">
                            <div class="flex gap-1 flex-center">
                                <label class="font-semibold text-gray-900 text-2sm">
                                    {{ $lang->data['address'] ?? 'Address' }}
                                </label>
                            </div>
                            <div>
                                <textarea placeholder="{{ $lang->data['address'] ?? 'Address' }}" wire:model="address"
                                    class="p-3 resize-none input min-h-20" id=""></textarea>
                            </div>
                            <button class="justify-center btn btn-primary" wire:click="create">
                                {{ $lang->data['save'] ?? 'Save' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" data-modal="true" data-modal-disable-scroll="false" id="EditModalCustomer" wire:ignore.self>
            <div class="modal-content max-w-[700px] top-5 lg:top-[15%]">
                <div class="modal-header pr-2.5">
                    <h3 class="modal-title">
                        {{ $lang->data['add_new_customer'] ?? 'Add New Customer' }}
                    </h3>
                    <button class="btn btn-sm btn-icon btn-light btn-clear shrink-0" data-modal-dismiss="true">
                        <i class="ki-filled ki-cross">
                        </i>
                    </button>
                </div>
                <div class="grid gap-5 px-0 py-5 modal-body">
                    <div class="grid grid-cols-2 gap-5 px-4">
                        <div class="flex flex-col gap-2.5">
                            <div class="flex gap-1 flex-center">
                                <label class="font-semibold text-gray-900 text-2sm">
                                    {{ $lang->data['name'] ?? 'Name' }} <span class="text-red-500">*</span>
                                </label>
                            </div>
                            <label class="input">
                                <input type="text" placeholder="{{ $lang->data['name'] ?? 'Name' }}"
                                    wire:model="name" />
                            </label>
                            @error('name')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2.5">
                            <div class="flex gap-1 flex-center">
                                <label class="font-semibold text-gray-900 text-2sm">
                                    {{ $lang->data['phone_number'] ?? 'Phone Number' }} <span
                                        class="text-red-500">*</span>
                                </label>
                            </div>
                            <label class="input">
                                <input type="number" placeholder="{{ $lang->data['phone'] ?? 'Phone' }}"
                                    wire:model="phone" />
                            </label>
                            @error('phone')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col col-span-2 gap-2.5">
                            <div class="flex gap-1  flex-center">
                                <label class="font-semibold text-gray-900 text-2sm">
                                    {{ $lang->data['email'] ?? 'Email' }}
                                </label>
                            </div>
                            <label class="input">
                                <input type="text" placeholder="{{ $lang->data['email'] ?? 'Email' }}"
                                    wire:model="email" />
                            </label>
                            @error('email')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col gap-2.5 col-span-2">
                            <div class="flex gap-1 flex-center">
                                <label class="font-semibold text-gray-900 text-2sm">
                                    {{ $lang->data['address'] ?? 'Address' }}
                                </label>
                            </div>
                            <div>
                                <textarea placeholder="{{ $lang->data['address'] ?? 'Address' }}" wire:model="address"
                                    class="p-3 resize-none input min-h-20" id=""></textarea>
                            </div>
                            <button class="justify-center btn btn-primary" wire:click="update">
                                {{ $lang->data['save'] ?? 'Save' }}
                            </button>
                        </div>                   
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>