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
    <div class="card-body grid gap-5">
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
                <input class="input pt-3" placeholder="" type="file" wire:model='logo' />
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
                <input class="input pt-3" type="file" class="form-control" wire:model='favicon' />
                @error('favicon')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label max-w-56">
                {{ $lang->data['contact_number'] ?? 'Contact Number' }} <span
                    class="text-danger"><strong>*</strong></span>
            </label>
            <div class="grow">
                <input class="input" placeholder="{{ $lang->data['enter_contact_number'] ?? 'Enter Contact Number' }}"
                    type="number" wire:model='phone' />
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label max-w-56">
                {{ $lang->data['email'] ?? 'Email' }} <span class="text-danger"><strong>*</strong></span>
            </label>
            <div class="grow">
                <input class="input" type="email" placeholder="{{ $lang->data['enter_email'] ?? 'Enter Email' }}"
                    wire:model='email' />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex items-center flex-wrap lg:flex-nowrap gap-2.5">
            <label class="form-label max-w-56">
                {{ $lang->data['currency_symbol'] ?? 'Currency Symbol' }} <span
                    class="text-danger"><strong>*</strong></span>
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
                {{ $lang->data['tax_percentage'] ?? 'Tax Percentage' }} <span
                    class="text-danger"><strong>*</strong></span>
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
                <textarea class="input pt-3 resize-none min-h-20" type="text" wire:model='address'></textarea>
            </div>
        </div>
        <div class="flex justify-end">
            <button class="btn btn-primary" type="submit" wire:click.prevent='save'>
                {{ $lang->data['save_changes'] ?? 'Save Changes' }}
            </button>
        </div>
    </div>
</div>