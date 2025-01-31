<div>
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]" id="navbar">
        <div class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200 bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{ $lang->data['edit_product'] ?? 'Edit Product' }}
                        </h1>
                    </div>
                    <div class="flex items-center gap-1">
                        <a class="btn btn-light btn-sm" href="{{ route('admin.view_products') }}">
                            {{ $lang->data['back'] ?? 'Back' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false">
            <div class="grid gap-5 px-0 py-5">
                <div class="grid grid-cols-2 gap-5 px-4">
                    <div class="flex flex-col gap-2">
                        <label class="form-label">
                            {{ $lang->data['product_code'] ?? 'Product Code' }} <span class="text-danger"><strong>*</strong></span>
                        </label>
                        <input class="input" type="text" placeholder="{{ $lang->data['product_code'] ?? 'Product Code' }}" wire:model="code" />
                        @error('code') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="form-label">
                            {{ $lang->data['product_name'] ?? 'Product Name' }} <span class="text-danger"><strong>*</strong></span>
                        </label>
                        <input class="input" type="text" placeholder="{{ $lang->data['product_name'] ?? 'Product Name' }}" wire:model="name" />
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="form-label">
                            {{ $lang->data['category'] ?? 'Category' }} <span class="text-danger"><strong>*</strong></span>
                        </label>
                        <select class="select" wire:model="category">
                            <option selected value="">{{ $lang->data['choose'] ?? 'Choose...' }}</option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="form-label">{{ $lang->data['image'] ?? 'Image' }}</label>
                        <input class="input pt-2" type="file" wire:model="image" />
                        @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="form-label">{{ $lang->data['price'] ?? 'Price' }}</label>
                        <input class="input" type="number" wire:model="price" />
                        @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="form-label">{{ $lang->data['description'] ?? 'Description' }}</label>
                        <textarea class="input resize-none" rows="4" wire:model="description"></textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="isVeg" wire:model="is_veg">
                            <label class="form-check-label" for="isVeg">{{ $lang->data['is_veg'] ?? 'isVeg' }}</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="isActive" wire:model="is_active">
                            <label class="form-check-label" for="isActive">{{ $lang->data['is_active'] ?? 'isActive' }}</label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end float-end gap-4 px-5">
                    <button class="justify-center btn btn-primary" :disabled="isUploading == true" wire:click.prevent="create">
                        {{ $lang->data['submit'] ?? 'Submit' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>