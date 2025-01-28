<div>
   
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>{{$lang->data['products'] ?? 'Products'}}</strong></h3>
    </div>
    @if(Auth::user()->can('add_product'))
    <div class="col-auto ms-auto text-end mt-n1">
        <a href="{{route('admin.add_products')}}" class="btn btn-primary">{{$lang->data['new_product'] ?? 'New Product'}}</a>
    </div>
    @endif
</div>

<div class="row">
    <div class="col-12">
        <div class="card p-0">
            <div class="card-body p-0">
                <table class="table table-striped table-bordered mb-0">
                    <thead class="bg-secondary-light">
                        <tr>
                            <th class="tw-5">{{$lang->data['sl'] ?? 'Sl'}}</th>
                            <th class="tw-40">{{$lang->data['name'] ?? 'Name'}}</th>
                            <th class="tw-15">{{$lang->data['price'] ?? 'Price'}}</th>
                            <th class="tw-15">{{$lang->data['category'] ?? 'Category'}}</th>
                            <th class="tw-10">{{$lang->data['status'] ?? 'Status'}}</th>
                            <th class="tw-15">{{$lang->data['actions'] ?? 'Actions'}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{getCurrency()}}{{$item->price}}</td>
                            <td><span class="badge bg-dark">{{$item->category->name}}</span></td>
                            <td><span class="badge {{$item->is_active == 1 ? 'bg-success' : 'bg-secondary'}}">{{$item->is_active == 1 ? ($lang->data['active'] ?? 'Active') : ($lang->data['inactive'] ?? 'Inactive')}}</span></td>
                            <td>
                                @if(Auth::user()->can('add_addon'))
                                <a href="{{route('admin.addons',$item->id)}}" class="btn btn-sm btn-success">{{$lang->data['add_addons'] ?? 'Add Addons'}}</a>
                                @endif

                                @if(Auth::user()->can('edit_product'))
                                <a href="{{route('admin.edit_product',$item->id)}}" class="btn btn-sm btn-primary">{{$lang->data['edit'] ?? 'Edit'}}</a>
                                @endif

                                @if(Auth::user()->can('delete_product'))
                                <a href="#" class="btn btn-sm btn-danger" wire:click="delete({{$item}})">{{$lang->data['delete'] ?? 'Delete'}}</a>
                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($products) == 0)
                    <x-no-data-component message="{{$lang->data['no_products_found'] ?? 'No products were found..'}}" />
                @endif
            </div>
        </div>
    </div>
</div>
</div>
