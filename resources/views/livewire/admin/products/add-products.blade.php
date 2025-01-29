<div>
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div
            class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200  bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{ $lang->data['create_product'] ?? 'Create Product' }}
                        </h1>
                    </div>
                    <div class="flex items-center gap-1">
                        <a class="btn btn-light btn-sm " href="{{ route('admin.view_products') }}">
                            {{ $lang->data['back'] ?? 'Back' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="card">

        <div class="card-body grid gap-5 col-md-12">
            <form x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false">

                <div class="flex flex-col flex-wrap lg:flex-nowrap gap-2.5">
                    <label class="form-label">
                        {{ $lang->data['product_code'] ?? 'Product Code' }} <span
        class="text-danger"><strong>*</strong></span>
    </label>
    <div class="grow">
        <input class="input" type="text"
            placeholder="{{ $lang->data['product_code'] ?? 'Product Code' }}" wire:model="code" />
        @error('code')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="flex flex-col flex-wrap lg:flex-nowrap gap-2.5 mt-2">
    <label class="form-label">
        {{ $lang->data['product_name'] ?? 'Product Name ' }} <span
            class="text-danger"><strong>*</strong></span>
    </label>
    <div class="grow">
        <input class="input" type="text"
            placeholder="{{ $lang->data['product_name'] ?? 'Product Name' }}" wire:model="name" />
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="flex flex-col  flex-wrap lg:flex-nowrap gap-2.5 mt-2">
    <label class="form-label ">
        {{ $lang->data['category'] ?? 'Category ' }} <span class="text-danger"><strong>*</strong></span>
    </label>
    <div class="grow">
        <select class="select" wire:model="category">
            <option selected value="">
                {{ $lang->data['choose'] ?? 'Choose...' }}
            </option>
            @foreach ($categories as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="flex flex-col  flex-wrap lg:flex-nowrap gap-2.5 mt-2">
    <label class="form-label ">
        {{ $lang->data['image'] ?? 'Image' }}
    </label>
    <div class="grow">
        <div class="grow">
            <input class="input pt-2" type="file" wire:model="image" />
            @error('file')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="flex flex-col  flex-wrap lg:flex-nowrap gap-2.5 mt-2">
    <label class="form-label ">
        {{ $lang->data['price'] ?? 'Price' }}
    </label>
    <div class="grow">
        <div class="grow">
            <input class="input" type="number" wire:model="price" />
            @error('price')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="flex flex-col  flex-wrap lg:flex-nowrap gap-2.5 mt-2">
    <label class="form-label ">
        {{ $lang->data['description'] ?? 'Description' }}
    </label>
    <div class="grow">
        <div class="grow">
            <textarea class="input resize-none" rows="4" wire:model="description"></textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="flex flex-col  flex-wrap lg:flex-nowrap gap-2.5 mt-2">
    <label class="form-label ">
        {{ $lang->data['description'] ?? 'Description' }}
    </label>
    <div class="grow">
        <div class="grow">
            <textarea class="input resize-none" rows="4" wire:model="description"></textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="mb-3">
    <div class="form-check form-switch">
        <input class="checkbox checkbox-sm form-check-input" type="checkbox" id="isVeg" wire:model="is_veg">
        <label class="form-check-label" for="isVeg">{{ $lang->data['is_veg'] ?? 'isVeg' }}</label>
    </div>


</div>
<div class="mb-3">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="isActive" wire:model="is_active">
        <label class="form-check-label"
            for="isActive">{{ $lang->data['is_active'] ?? 'isActive' }}</label>
    </div>
</div>
<div class="flex justify-end gap-4 px-5">
    <button class="justify-center btn btn-primary" :disabled="isUploading == true"
        wire:click.prevent="create">
        {{ $lang->data['submit'] ?? 'Submit' }}
    </button>
</div>

</form>
</div>
</div> --}}
{{-- <div class="col-md-12"> --}}

<div class="card-body">
    <form x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false">

        <div class="grid gap-5 px-0 py-5 ">
            <div class="grid grid-cols-2 gap-5 px-4">
                <div class="flex flex-col gap-2">
                    <label class="form-label">
                        {{ $lang->data['product_code'] ?? 'Product Code' }} <span
                            class="text-danger"><strong>*</strong></span>
                    </label>
                    <div class="grow">
                        <input class="input" type="text"
                            placeholder="{{ $lang->data['product_code'] ?? 'Product Code' }}" wire:model="code" />
                        @error('code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="form-label">
                        {{ $lang->data['product_name'] ?? 'Product Name ' }} <span
                            class="text-danger"><strong>*</strong></span>
                    </label>
                    <div class="grow">
                        <input class="input" type="text"
                            placeholder="{{ $lang->data['product_name'] ?? 'Product Name' }}" wire:model="name" />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="form-label ">
                        {{ $lang->data['category'] ?? 'Category ' }} <span
                            class="text-danger"><strong>*</strong></span>
                    </label>
                    <div class="grow">
                        <select class="select" wire:model="category">
                            <option selected value="">
                                {{ $lang->data['choose'] ?? 'Choose...' }}
                            </option>
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="form-label ">
                        {{ $lang->data['image'] ?? 'Image' }}
                    </label>
                    <div class="grow">
                        <div class="grow">
                            <input class="input pt-2" type="file" wire:model="image" />
                            @error('file')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="form-label ">
                        {{ $lang->data['price'] ?? 'Price' }}
                    </label>
                    <div class="grow">
                        <div class="grow">
                            <input class="input" type="number" wire:model="price" />
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="form-label ">
                        {{ $lang->data['description'] ?? 'Description' }}
                    </label>
                    <div class="grow">
                        <div class="grow">
                            <textarea class="input resize-none" rows="4" wire:model="description"></textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="isVeg" wire:model="is_veg">
                        <label class="form-check-label"
                            for="isVeg">{{ $lang->data['is_veg'] ?? 'isVeg' }}</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="isActive" wire:model="is_active">
                        <label class="form-check-label"
                            for="isActive">{{ $lang->data['is_active'] ?? 'isActive' }}</label>
                    </div>
                </div>

                {{-- <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="isVeg" wire:model="is_veg">
                                    <label class="form-check-label"
                                        for="isVeg">{{ $lang->data['is_veg'] ?? 'isVeg' }}</label>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="isActive"
                    wire:model="is_active">
                <label class="form-check-label"
                    for="isActive">{{ $lang->data['is_active'] ?? 'isActive' }}</label>
            </div>
        </div> --}}
        <div class="flex justify-end float-end gap-4 px-5">
            <button class="justify-center btn btn-primary" :disabled="isUploading == true"
                wire:click.prevent="create">
                {{ $lang->data['submit'] ?? 'Submit' }}
            </button>
        </div>

    </form>
</div>

{{-- <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="grid gap-5 px-0 py-5 ">
                        <div class="grid grid-cols-2 gap-5 px-4">
                            <div class="flex flex-col gap-2.5">
                                <label class="font-semibold text-gray-900 text-2sm">
                                    {{ $lang->data['staff_name'] ?? 'Staff Name' }} <span class="text-red-500">*</span>
</label>
<input type="text" class="input" placeholder="{{ $lang->data['enter_staff_name'] ?? 'Enter Staff Name' }}" wire:model="name" />
@error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
</div>

<div class="flex flex-col gap-2.5">
    <label class="font-semibold text-gray-900 text-2sm">
        {{ $lang->data['contact_number'] ?? 'Contact Number' }} <span class="text-red-500">*</span>
    </label>
    <input type="number" class="input" placeholder="{{ $lang->data['enter_contact_number'] ?? 'Enter Contact Number' }}" wire:model="phone" />
    @error('phone') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
</div>

<div class="flex flex-col gap-2.5">
    <label class="font-semibold text-gray-900 text-2sm">
        {{ $lang->data['email'] ?? 'Email' }}
    </label>
    <input type="text" class="input" placeholder="{{ $lang->data['enter_email'] ?? 'Enter Email' }}" wire:model="email" />
    @error('email') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
</div>

<div class="flex flex-col gap-2.5">
    <label class="font-semibold text-gray-900 text-2sm">
        {{ $lang->data['password'] ?? 'Password' }}
    </label>
    <input type="text" class="input" placeholder="{{ $lang->data['enter_password'] ?? 'Enter Password' }}" wire:model="password" />
    @error('password') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
</div>

<div class="flex flex-col gap-2.5 col-span-2">
    <label class="font-semibold text-gray-900 text-2sm">
        {{ $lang->data['address'] ?? 'Address' }}
    </label>
    <textarea placeholder="{{ $lang->data['address'] ?? 'Address' }}" wire:model="address" class="p-3 resize-none input min-h-20"></textarea>
</div>

<div class="flex flex-col gap-2.5 col-span-2">
    <label class="font-semibold text-gray-900 text-2sm">
        {{ $lang->data['permissions'] ?? 'Permissions' }}
    </label>
    <div class="row px-2">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="tw-20">{{ $lang->data['menu_title'] ?? 'Menu Title' }}</th>
                    <th class="tw-80">{{ $lang->data['actions'] ?? 'Actions' }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                $permission_individual = App\Models\Permission::latest()->get();
                $permission_group = App\Models\Permission::groupBy('list','category')->select('list','category', DB::raw('count(*) as total'))->orderBy('list')->get();
                @endphp
                @foreach ($permission_group as $permission)
                <tr>
                    <td>{{$permission->category}}</td>
                    <td>
                        @foreach ($permission_individual as $row)
                        @if ($permission->list == $row->list)
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="{{ $row->id }}" wire:model="selected_permissions.{{ $row->id }}">
                            <span class="form-check-label">
                                {{$row->name }}
                            </span>
                        </label>
                        @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
<button type="submit" class="btn btn-primary" wire:click.prevent="save">
    {{ $lang->data['save'] ?? 'Save' }}
</button>
</form>
</div>
</div>
</div> --}}


{{-- <main class="w-full grow">
        <div class="min-w-full card card-grid rounded-none border-none shadow-none">
            <div class="card-body">
                <div>

                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-body">
                                <form x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false">
                                    <div class="row">
                                        <div class="mb-3 col-md-2">
                                            <label class="form-label"
                                                for="inputEmail4">{{ $lang->data['product_code'] ?? 'Product Code' }}
<span class="text-danger"><strong>*</strong></span></label>
<input type="email" class="form-control"
    placeholder="{{ $lang->data['product_code'] ?? 'Product Code' }}"
    wire:model="code">
@error('code')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>
<div class="mb-3 col-md-10">
    <label
        class="form-label">{{ $lang->data['product_name'] ?? 'Product Name ' }}<span
            class="text-danger"><strong>*</strong></span></label>
    <input type="text" class="form-control"
        placeholder="{{ $lang->data['product_name'] ?? 'Product Name' }}"
        wire:model="name">
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
</div>
<div class="row">
    <div class="mb-3 col-md-4">
        <label class="form-label">{{ $lang->data['category'] ?? 'Category ' }}<span
                class="text-danger"><strong>*</strong></span></label>
        <select class="form-control" wire:model="category">
            <option selected value="">
                {{ $lang->data['choose'] ?? 'Choose...' }}
            </option>
            @foreach ($categories as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @error('category')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3 col-md-4">
        <label class="form-label"
            for="inputCity">{{ $lang->data['image'] ?? 'Image' }}</label>
        <input type="file" class="form-control" wire:model="image">
        @error('file')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3 col-md-4">
        <label class="form-label"
            for="inputZip">{{ $lang->data['price'] ?? 'Price' }} <span
                class="text-danger"><strong>*</strong></span></label>
        <input type="number" class="form-control" wire:model="price">
        @error('price')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<div class="mb-3">
    <label class="form-label"
        for="inputAddress">{{ $lang->data['description'] ?? 'Description' }}</label>
    <textarea class="form-control resize-none" rows="4" wire:model="description"></textarea>
    @error('description')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="isVeg"
            wire:model="is_veg">
        <label class="form-check-label"
            for="isVeg">{{ $lang->data['is_veg'] ?? 'isVeg' }}</label>
    </div>
</div>
<div class="mb-3">
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="isActive"
            wire:model="is_active">
        <label class="form-check-label"
            for="isActive">{{ $lang->data['is_active'] ?? 'isActive' }}</label>
    </div>
</div>

<button type="button" class="btn btn-primary float-end"
    :disabled="isUploading == true"
    wire:click.prevent="create">{{ $lang->data['submit'] ?? 'Submit' }}</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</main> --}}
</div>