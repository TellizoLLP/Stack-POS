<div>
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200 bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{$lang->data['sales_report'] ?? 'Sales Report'}}
                        </h1>
                    </div>
                    <div class="flex items-center gap-1">
                            <a class="btn btn-light btn-sm "
                            wire:click="getData">
                            {{$lang->data['search'] ?? 'Search'}}
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="w-full grow">
        <div class="min-w-full card card-grid rounded-none border-none shadow-none">
            <div class="card-body">
                <div>
                    <div class="flex flex-wrap gap-4">
                        <div class="flex flex-col p-4">
                            <label for="start_date" class="font-medium text-gray-700">
                                {{$lang->data['start_date'] ?? 'Start Date'}}
                            </label>
                            <input type="date" class="form-control text-sm" id="start_date" wire:model="start_date">
                        </div>
                        <div class="flex flex-col p-4">
                            <label for="end_date" class="font-medium text-gray-700">
                                {{$lang->data['end_date'] ?? 'End Date'}}
                            </label>
                            <input type="date" class="form-control text-sm" id="end_date" wire:model="end_date">
                        </div>
                        <div class="flex flex-col p-4">
                            <label for="order_type" class="font-medium text-gray-700">
                                {{$lang->data['order_type'] ?? 'Order Type'}}
                            </label>
                            <select class="text-sm" id="order_type" wire:model="order_type">
                                <option class="select-box" value="ALL">{{$lang->data['all_types'] ?? 'All Types'}}</option>
                                <option class="select-box" value="1">{{$lang->data['dining'] ?? 'Dinning'}}</option>
                                <option class="select-box" value="2">{{$lang->data['takeaway'] ?? 'Takeaway'}}</option>
                                <option class="select-box" value="3">{{$lang->data['delivery'] ?? 'Delivery'}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="scrollable-x-auto mt-5">
                        <table class="table table-auto table-border">
                            <thead>
                                <tr>
                                    <th class="tw-2">{{$lang->data['sl'] ?? 'Sl'}}</th>
                                    <th class="tw-10">{{$lang->data['order_Date'] ?? 'Order Date'}}</th>
                                    <th class="tw-10">{{$lang->data['order_no'] ?? 'Invoice No'}}</th>
                                    <th class="tw-20">{{$lang->data['customer'] ?? 'Customer'}}</th>
                                    <th class="tw-20">{{$lang->data['order_details'] ?? 'Order Details'}}</th>
                                    <th class="tw-20">{{$lang->data['payment_details'] ?? 'Payment Details'}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{\Carbon\Carbon::parse($order->date)->format('d/m/Y')}}</td>
                                        <td>{{$order->order_number}}</td>
                                        <td>{{$order->customer_name_fn}}</td>
                                        <td class="d-none d-xl-table-cell">
                                            <div class="text-muted">
                                                {{$lang->data['order_type'] ?? 'Order Type'}}: {{$order->order_type_string}}
                                            </div>
                                            <div class="text-muted">
                                                @if($order->order_type == \App\Models\Order::DINING)
                                                    {{$lang->data['table_no'] ?? 'Table No'}}: {{$order->table_no}}
                                                @endif
                                            </div>
                                            <div class="text-muted">
                                                {{$lang->data['order_status'] ?? 'Order Status'}}: {{$order->OrderStatusString($order->status)}}
                                            </div>
                                        </td>
                                        <td class="d-none d-xl-table-cell">
                                            <div class="text-muted">
                                                {{$lang->data['total'] ?? 'Total'}}: {{getCurrency()}}{{number_format($order->total,2)}}
                                            </div>
                                            <div class="text-muted">
                                                {{$lang->data['paid'] ?? 'Paid'}}: {{getCurrency()}}{{number_format($order->payments->sum('amount'),2)}}
                                            </div>
                                            <strong>{{$lang->data['balance'] ?? 'Balance'}}: {{getCurrency()}}{{number_format(($order->total - $order->payments->sum('amount')),2)}}</strong>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if(count($orders) == 0)
                            <x-no-data-component message="{{$lang->data['no_orders_found'] ?? 'No orders were found..'}}" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
