<div>
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
                        <a class="btn btn-light btn-sm " data-modal-toggle="#manage_modal"
                            href="{{ route('admin.dashboard') }}">
                            {{ $lang->data['back'] ?? 'Back' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        {{-- <div class="card-header" id="webhooks">
            <h3 class="card-title">
                Webhooks
            </h3>
        </div> --}}
        <div class="card-body grid gap-5">
            {{-- <p class="text-2sm text-gray-800">
                Set up Webhooks to trigger actions on external services in real-time. Stay informed on updates and
                changes
                to
                <br />
                ensure seamless integration.
            </p> --}}
            <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                <label class="form-label max-w-56">
                    {{ $lang->data['store_name'] ?? 'Store Name ' }} <span class="text-danger"><strong>*</strong></span>
                </label>
                <div class="grow">
                    <input class="input" placeholder="{{ $lang->data['enter_store_name'] ?? 'Enter Store Name' }}"
                        type="text" value="" wire:model='name' />
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                <label class="form-label max-w-56">
                    {{ $lang->data['application_logo'] ?? 'Application Logo' }}
                </label>
                <div class="grow">
                    <input class="input" placeholder="" type="file" wire:model='logo' />
                    @error('logo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                <label class="form-label max-w-56">
                    {{ $lang->data['fav_icon'] ?? 'Fav Icon ' }}
                </label>
                <div class="grow">
                    <input class="input" type="file" class="form-control" wire:model='favicon' />
                    @error('favicon')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                <label class="form-label max-w-56">
                    {{ $lang->data['contact_number'] ?? 'Contact Number' }}
                </label>
                <div class="grow">
                    <input class="input"
                        placeholder="{{ $lang->data['enter_contact_number'] ?? 'Enter Contact Number' }}"
                        type="number" wire:model='phone' />
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                <label class="form-label max-w-56">
                    {{ $lang->data['email'] ?? 'Email' }}
                </label>
                <div class="grow">
                    <input class="input" type="email"
                        placeholder="{{ $lang->data['enter_email'] ?? 'Enter Email' }}" wire:model='email' />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                <label class="form-label max-w-56">
                    {{ $lang->data['currency_symbol'] ?? 'Currency Symbol' }}
                </label>
                <div class="grow">
                    <input class="input" type="text"
                        placeholder="{{ $lang->data['enter_currency_symbol'] ?? 'Enter Currency Symbol' }}"
                        wire:model='currency_symbol' />
                    @error('currency_symbol')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                <label class="form-label max-w-56">
                    {{ $lang->data['tax_percentage'] ?? 'Tax Percentage' }}
                </label>
                <div class="grow">
                    <input class="input" type="text"
                        placeholder="{{ $lang->data['enter_tax_percentage'] ?? 'Enter Tax Percentage' }}"
                        wire:model='tax_percentage' />
                    @error('tax_percentage')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
                <label class="form-label max-w-56">
                    {{ $lang->data['address'] ?? 'Address' }}
                </label>
                <div class="grow">
                    <textarea class="input pt-3 resize-none" type="text" rows="4" wire:model='address'></textarea>
                </div>
            </div>
            <div class="flex justify-end">
                <button class="btn btn-primary" type="submit" wire:click.prevent='save'>
                    {{ $lang->data['save_changes'] ?? 'Save Changes' }}
                </button>
            </div>
        </div>
    
</div>







{{-- <div class="">
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
                                    <label class="form-label">{{ $lang->data['store_name'] ?? 'Store Name ' }}<span
                                            class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" class="form-control"
                                        placeholder="{{ $lang->data['enter_store_name'] ?? 'Enter Store Name' }}"
                                        wire:model='name'>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label
                                        class="form-label">{{ $lang->data['application_logo'] ?? 'Application Logo' }}
                                    </label>
                                    <input type="file" class="form-control" wire:model='logo'>
                                    @error('logo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">{{ $lang->data['fav_icon'] ?? 'Fav Icon ' }}</label>
                                    <input type="file" class="form-control" wire:model='favicon'>
                                    @error('favicon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label
                                        class="form-label">{{ $lang->data['contact_number'] ?? 'Contact Number' }}<span
                                            class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" class="form-control"
                                        placeholder="{{ $lang->data['enter_contact_number'] ?? 'Enter Contact Number' }}"
                                        wire:model='phone'>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">{{ $lang->data['email'] ?? 'Email' }}<span
                                            class="text-danger"><strong>*</strong></span></label>
                                    <input type="email" class="form-control"
                                        placeholder="{{ $lang->data['enter_email'] ?? 'Enter Email' }}"
                                        wire:model='email'>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label
                                        class="form-label">{{ $lang->data['currency_symbol'] ?? 'Currency Symbol' }}<span
                                            class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" class="form-control"
                                        placeholder="{{ $lang->data['enter_currency_symbol'] ?? 'Enter Currency Symbol' }}"
                                        wire:model='currency_symbol'>
                                    @error('currency_symbol')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label
                                        class="form-label">{{ $lang->data['tax_percentage'] ?? 'Tax Percentage' }}<span
                                            class="text-danger"><strong>*</strong></span></label>
                                    <input type="text" class="form-control"
                                        placeholder="{{ $lang->data['enter_tax_percentage'] ?? 'Enter Tax Percentage' }}"
                                        wire:model='tax_percentage'>
                                    @error('tax_percentage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ $lang->data['address'] ?? 'Address' }}</label>
                                <textarea class="form-control resize-none" rows="4" wire:model='address'></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary float-end"
                                wire:click.prevent='save'>{{ $lang->data['save_changes'] ?? 'Save Changes' }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div> --}}
