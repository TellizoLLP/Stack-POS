<div>
    
<div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
        <h3><strong>{{$lang->data['item_wise_report'] ?? 'Item Wise Sales Report'}}</strong></h3>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card p-0">
            <div class="card-header p-3">
                <div class="row">
                    <div class="col-md-3">
                        <label>{{$lang->data['start_date'] ?? 'Start Date'}}</label>
                        <input type="date" class="form-control" wire:model="start_date">
                    </div>
                    <div class="col-md-3">
                        <label>{{$lang->data['end_date'] ?? 'End Date'}}</label>
                        <input type="date" class="form-control" wire:model="end_date">
                    </div>
                    <div class="col-md-3">
                        <label>{{$lang->data['search_item'] ?? 'Search Item'}}</label>
                        <input type="text" class="form-control" placeholder="{{$lang->data['all_items'] ?? 'All Items'}}" wire:model='search'>
                    </div>
                    <div class="col-md-3">
                       <br>
                        <a href="#" class="btn btn-primary" wire:click='getData'>{{$lang->data['search'] ?? 'Search'}}</a>
                    </div>
                    
                </div>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped table-sm table-bordered mb-0">
                    <thead class="bg-secondary-light">
                        <tr>
                            <th class="tw-2">{{$lang->data['sl'] ?? 'Sl'}}</th>
                            <th class="tw-25">{{$lang->data['item_name'] ?? 'Item Name'}}</th>
                            <th class="tw-10">{{$lang->data['qty'] ?? 'Qty'}}</th>
                            <th class="tw-20">{{$lang->data['amount'] ?? 'Amount'}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$item['name']}}</td>
                            <td>{{$item['qty']}}</td>
                            <td>{{getCurrency()}}{{number_format($item['amount'],2)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($data) == 0)
                    <x-no-data-component message="{{$lang->data['no_data_found'] ?? 'No data found..'}}" />
                @endif
            </div>
        </div>
    </div>
</div>

</div>
