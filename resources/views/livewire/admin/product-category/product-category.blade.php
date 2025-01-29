<div class="">
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
                        @if (Auth::user()->can('add_category'))
                            <a class="btn btn-light btn-sm" data-modal-toggle="#manage_modal"
                                data-bs-target="#ModalCategory" wire:click="resetFields">
                                {{ $lang->data['new_category'] ?? 'New Category' }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="w-full grow scrollable-y-auto" style="max-height: 100vh;">
        <div class="min-w-full card card-grid rounded-none border-none shadow-none">

            <div>
                <div class="row mb-2 mb-xl-3">
                    {{-- <div class="col-auto d-none d-sm-block">
                        <h3><strong>{{ $lang->data['category'] ?? 'Category' }}</strong></h3>
                    </div>
                    <div class="col-auto ms-auto text-end mt-n1">
                        @if (Auth::user()->can('add_category'))
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#ModalCategory"
                                wire:click="resetFields">{{ $lang->data['new_category'] ?? 'New Category' }}</a>
                        @endif
                    </div> --}}
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card p-0">
                            <div class="card-body p-0">
                                <table class="table table-striped table-bordered mb-0">
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
                                                <td><span
                                                        class="badge {{ $item->is_active == 1 ? 'bg-success' : 'bg-secondary' }}">{{ $item->is_active == 1 ? 'Active' : 'Inactive' }}</span>
                                                </td>
                                                <td>
                                                    @if (Auth::user()->can('edit_category'))
                                                        <a href="#" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#EditModalCategory"
                                                            wire:click='edit({{ $item }})'>{{ $lang->data['edit'] ?? 'Edit' }}</a>
                                                    @endif

                                                    @if (Auth::user()->can('delete_category'))
                                                        <a href="#" class="btn btn-sm btn-danger"
                                                            wire:click="delete({{ $item }})">{{ $lang->data['delete'] ?? 'Delete' }}</a>
                                                    @endif
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

                <div class="modal fade" id="ModalCategory" tabindex="-1" role="dialog" aria-hidden="true"
                    wire:ignore.self>
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $lang->data['add_new_category'] ?? 'Add New Category' }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">{{ $lang->data['name'] ?? 'Name' }} <span
                                            class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" class="form-control"
                                        placeholder="{{ $lang->data['name'] ?? 'Name' }}" wire:model="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ $lang->data['description'] ?? 'Description' }}
                                    </label>
                                    <textarea class="form-control resize-none" rows="3"
                                        placeholder="{{ $lang->data['description'] ?? 'Description' }}" wire:model="description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="isActive"
                                            wire:model="is_active">
                                        <label class="form-check-label"
                                            for="isActive">{{ $lang->data['is_active'] ?? 'isActive' }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{ $lang->data['close'] ?? 'Close' }}</button>
                                <button type="button" class="btn btn-success"
                                    wire:click='create'>{{ $lang->data['save'] ?? 'Save' }}</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="EditModalCategory" tabindex="-1" role="dialog" aria-hidden="true"
                    wire:ignore.self>
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ $lang->data['add_new_category'] ?? 'Add New Category' }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">{{ $lang->data['name'] ?? 'Name' }} <span
                                            class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" class="form-control"
                                        placeholder="{{ $lang->data['name'] ?? 'Name' }}" wire:model="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ $lang->data['description'] ?? 'Description' }}
                                    </label>
                                    <textarea class="form-control resize-none" rows="3"
                                        placeholder="{{ $lang->data['description'] ?? 'Description' }}" wire:model="description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="isActive"
                                            wire:model="is_active">
                                        <label class="form-check-label"
                                            for="isActive">{{ $lang->data['is_active'] ?? 'isActive' }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">{{ $lang->data['close'] ?? 'Close' }}</button>
                                <button type="button" class="btn btn-success"
                                    wire:click="update">{{ $lang->data['save'] ?? 'Save' }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
