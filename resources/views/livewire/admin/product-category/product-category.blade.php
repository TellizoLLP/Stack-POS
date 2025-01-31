<div>
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div
            class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200  bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{ $lang->data['category'] ?? 'Category' }}
                        </h1>
                    </div>
                    <div class="flex items-center gap-1">
                    <div class="flex items-center gap-1">
                    <a class="btn btn-light btn-sm" href="{{route('admin.view_inventory')}}">
                        {{ $lang->data['back'] ?? 'Back' }}
                    </a>
                </div>
                        @if (Auth::user()->can('add_category'))
                            <a class="btn btn-light btn-sm " data-modal-toggle="#modalCategory" href="#"
                                wire:click="resetFields">
                                {{ $lang->data['new_category'] ?? 'New Category' }}
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
                            <thead class="bg-secondary-light">
                                <tr>
                                    <th class="tw-5">{{ $lang->data['sl'] ?? 'Sl' }}</th>
                                    <th class="tw-40">{{ $lang->data['name'] ?? 'Name' }}</th>
                                    <th class="tw-10">{{ $lang->data['status'] ?? 'Status' }}</th>
                                    <th class="tw-20">{{ $lang->data['actions'] ?? 'Actions' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <span class="badge badge-sm badge-outline {{ $item->is_active == 1 ? 'badge-success text-white' : 'badge-danger text-white' }}">
                                                {{ $item->is_active == 1 ? $lang->data['active'] ?? 'Active' : $lang->data['inactive'] ?? 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="flex items-center gap-3">
                                                <div>
                                                    @if (Auth::user()->can('edit_category'))
                                                        <a class="menu-link" data-modal-toggle="#modalCategory">
                                                            <span class="menu-icon">
                                                                <i class="ki-filled ki-pencil text-lg hover:text-blue-500"
                                                                    wire:click='edit({{ $item }})'>
                                                                </i>
                                                            </span>
                                                        </a>
                                                    @endif
                                                </div>
                                                <div>
                                                    @if (Auth::user()->can('delete_category'))
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
                        @if (count($categories) == 0)
                            <x-no-data-component
                                message="{{ $lang->data['no_categories_found'] ?? 'No categories were found..' }}" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal" data-modal="true" data-modal-disable-scroll="false" id="modalCategory" wire:ignore.self>
        <div class="modal-content max-w-[500px] top-5 lg:top-[15%]">
            <div class="modal-header pr-2.5">
                <h3 class="modal-title">
                    Category
                </h3>
                <button class="btn btn-sm btn-icon btn-light btn-clear shrink-0" data-modal-dismiss="true">
                    <i class="ki-filled ki-cross">
                    </i>
                </button>
            </div>
            <div class="modal-body grid gap-5 px-0 py-5">
                <div class="flex flex-col px-5 gap-2.5">
                    <div class="flex flex-center gap-1">
                        <label class="text-gray-900 font-semibold text-2sm">
                            Category Name <span class="text-red-500">*</span>
                        </label>
                    </div>
                    <label class="input">
                        <input type="text" value="" placeholder="Enter Name" wire:model="name"></input>
                    </label>
                    @error('name')
                        <span class="text-red-500 text-xs font-medium">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col px-5 gap-2.5">
                    <div class="flex flex-col gap-2.5 col-span-3">
                        <label class="text-gray-900 font-semibold text-2sm">Description</label>
                        <textarea wire:model="description" class="textarea" placeholder="Enter the description"></textarea>
                    </div>

                </div>
                <div class="flex flex-col px-5 gap-2.5">
                    <div class="flex items-center  gap-1">
                        <label class="text-gray-900 font-semibold text-2sm">
                            Is Active :
                        </label>
                        <div class="switch switch-sm">
                            <input name="param" type="checkbox" wire:model="is_active" checked="">
                        </div>
                    </div>
                </div>
                <div class="border-b border-b-gray-200">
                </div>
                <div class="flex flex-col px-5 gap-4">
                    <button class="btn btn-primary justify-center"
                        @if ($category) wire:click.prevent="update" @else wire:click.prevent="create" @endif>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
