<div class="">
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div
            class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200  bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{ $lang->data['app_settings'] ?? 'App Settings' }}
                        </h1>
                    </div>
                    <div class="flex items-center gap-1">
                        <a class="btn btn-light btn-sm" data-modal-toggle="#manage_modal"
                            href="{{ route('admin.dashboard') }}">
                            {{ $lang->data['back'] ?? 'Back' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="w-full grow scrollable-y-auto" style="max-height: 100vh;">
        <div class="min-w-full card card-grid rounded-none border-none shadow-none">
            <div class="row mb-2 mb-xl-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">{{ $lang->data['name'] ?? 'Name ' }}<span
                                            class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" class="form-control"
                                        placeholder="{{ $lang->data['enter_name'] ?? 'Enter Name' }}" wire:model="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label
                                        class="form-label">{{ $lang->data['contact_number'] ?? 'Contact Number' }}<span
                                            class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" class="form-control"
                                        placeholder="{{ $lang->data['enter_contact_number'] ?? 'Enter Contact Number' }}"
                                        wire:model="contact">
                                    @error('contact')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">{{ $lang->data['email'] ?? 'Email' }}<span
                                            class="text-danger"><strong>*</strong></span></label>
                                    <input type="email" class="form-control"
                                        placeholder="{{ $lang->data['enter_email'] ?? 'Enter Email' }}"
                                        wire:model="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">{{ $lang->data['password'] ?? 'Password' }}</label>
                                    <input type="password" class="form-control"
                                        placeholder="{{ $lang->data['enter_password'] ?? 'Enter Password' }}"
                                        wire:model="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ $lang->data['address'] ?? 'Address' }}</label>
                                <textarea class="form-control resize-none" rows="4" wire:model="address"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary float-end"
                                wire:click.prevent='save'>{{ $lang->data['save_changes'] ?? 'Save Changes' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
