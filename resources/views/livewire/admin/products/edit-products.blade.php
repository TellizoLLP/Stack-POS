<div>
    
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>{{$lang->data['edit_product'] ?? 'Edit Product'}}</strong></h3>
        </div>
    
        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{route('admin.view_products')}}" class="btn btn-dark">{{$lang->data['back'] ?? 'Back'}}</a>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="card">
    
            <div class="card-body">
                <form x-data="{ isUploading: false, progress: 0 }" 
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false">
                    <div class="row">
                        <div class="mb-3 col-md-2">
                            <label class="form-label" for="inputEmail4">{{$lang->data['product_code'] ?? 'Product Code '}}<span
                                    class="text-danger"><strong>*</strong></span></label>
                            <input type="email" class="form-control" placeholder="{{$lang->data['product_code'] ?? 'Product Code'}}" wire:model="code">
                            @error('code')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-10">
                            <label class="form-label">{{$lang->data['product_name'] ?? 'Product Name'}} <span
                                    class="text-danger"><strong>*</strong></span></label>
                            <input type="text" class="form-control" placeholder="{{$lang->data['product_name'] ?? 'Product Name'}}" wire:model="name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">{{$lang->data['category'] ?? 'Category '}}<span class="text-danger"><strong>*</strong></span></label>
                            <select class="form-control" wire:model="category">
                                <option selected value="">{{$lang->data['choose'] ?? 'Choose...'}}</option>
                                @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputCity">{{$lang->data['image'] ?? 'Image'}}</label>
                            <input type="file" class="form-control" wire:model="image">
                            @error('file')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
    
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputZip">{{$lang->data['price'] ?? 'Price'}} <span
                                    class="text-danger"><strong>*</strong></span></label>
                            <input type="number" class="form-control" wire:model="price">
                            @error('price')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="inputAddress">{{$lang->data['description'] ?? 'Description'}}</label>
                        <textarea class="form-control resize-none" rows="4" wire:model="description"></textarea>
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="isVeg" wire:model="is_veg">
                            <label class="form-check-label" for="isVeg">{{$lang->data['is_veg'] ?? 'isVeg'}}</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="isActive" wire:model="is_active">
                            <label class="form-check-label" for="isActive">{{$lang->data['is_active'] ?? 'isActive'}}</label>
                        </div>
                    </div>
    
                    <button type="button" class="btn btn-primary float-end" :disabled="isUploading == true" wire:click.prevent="update">{{$lang->data['submit'] ?? 'Submit'}}</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    