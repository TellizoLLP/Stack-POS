<div>
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div
            class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200  bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{ $lang->data['orders'] ?? 'Orders' }}
                        </h1>
                    </div>
                    @if (Auth::user()->can('add_order'))
                        <div class="flex items-center gap-1">
                            <a class="btn btn-light btn-sm" href="{{ route('admin.pos') }}">
                                {{ $lang->data['new_order'] ?? 'New Order' }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Make main scrollable -->
    <main class="w-full grow">
        <div class="min-w-full card card-grid rounded-none border-none shadow-none">
            <div class="card-body">
                <div>
                    <div class="scrollable-x-auto">
                        <table class="table table-auto table-border ">
                            <thead>
                                <tr>
                                    <th class="tw-5">{{ $lang->data['sl'] ?? 'Sl' }}</th>
                                    <th class="tw-20">{{ $lang->data['order_details'] ?? 'Order Details' }}</th>
                                    <th class="tw-15"> {{ $lang->data['customer'] ?? 'Customer' }}</th>
                                    <th class="tw-10">{{ $lang->data['order_type'] ?? 'Order Type' }}</th>
                                    <th class="tw-20">{{ $lang->data['order_status'] ?? 'Order Status' }}</th>
                                    <th class="tw-10">{{ $lang->data['payment_details'] ?? 'Payment Details' }}</th>
                                    <th class="tw-10"> {{ $lang->data['more'] ?? 'More' }}</th>
                                    <th class="tw-10">{{ $lang->data['actions'] ?? 'Actions' }}</th>
                                </tr>
                            </thead>
                            {{-- <thead>
                                <tr>
                                    <th class="">
                                        <span class="sort">
                                            <span class="sort-label">
                                                {{ $lang->data['sl'] ?? 'Sl' }}
                                            </span>
                                        </span>
                                    </th>
                                    <th class="">
                                        <span class="sort">
                                            <span class="sort-label">
                                                {{ $lang->data['order_details'] ?? 'Order Details' }}
                                            </span>
                                        </span>
                                    </th>
                                    <th class="">
                                        <span class="sort">
                                            <span class="sort-label">
                                                {{ $lang->data['customer'] ?? 'Customer' }}
                                            </span>
                                        </span>
                                    </th>
                                    <th class="">
                                        <span class="sort">
                                            <span class="sort-label">
                                                {{ $lang->data['order_type'] ?? 'Order Type' }}
                                            </span>
                                        </span>
                                    </th>
                                    <th class="">
                                        <span class="sort">
                                            <span class="sort-label">
                                                {{ $lang->data['order_status'] ?? 'Order Status' }}
                                            </span>
                                        </span>
                                    </th>
                                    <th class="">
                                        <span class="sort">
                                            <span class="sort-label">
                                                {{ $lang->data['payment_details'] ?? 'Payment Details' }}
                                            </span>
                                        </span>
                                    </th>
                                    <th class="">
                                        <span class="sort">
                                            <span class="sort-label">
                                                {{ $lang->data['more'] ?? 'More' }}
                                            </span>
                                        </span>
                                    </th>
                                    <th class="">
                                        <span class="sort">
                                            <span class="sort-label">
                                                {{ $lang->data['actions'] ?? 'Actions' }}
                                            </span>
                                        </span>
                                    </th>
                                </tr>
                            </thead> --}}
                            <div class="absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                data-datatable-spinner="true" style="display: none;">
                                <div
                                    class="flex items-center gap-2 px-4 py-2 font-medium leading-none text-gray-500 border border-gray-200 rounded-md text-2sm shadow-default bg-light">
                                    <svg class="w-5 h-5 -ml-1 text-gray-600 animate-spin"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="3"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    Loading...
                                </div>
                            </div>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td class="d-none d-xl-table-cell">
                                            <strong>{{ $lang->data['order_id'] ?? 'Order ID' }}:
                                                {{ $item->order_number }}</strong>
                                            <div class="text-muted">
                                                {{ $lang->data['order_date'] ?? 'Order Date' }}:
                                                {{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}
                                            </div>
                                        </td>
                                        <td>
                                            @if ($item->customer_name)
                                                {{ $item->customer_name }}
                                            @else
                                                {{ $lang->data['walk_in_customer'] ?? 'Walk-In Customer' }}
                                            @endif
                                        </td>
                                        <td class="d-none d-xl-table-cell">
                                            <span
                                                class="badge {{ $item->order_type_badge }}">{{ $item->order_type_string }}</span>
                                            @if ($item->order_type == \App\Models\Order::DINING)
                                                <div class="text-muted">
                                                    {{ $lang->data['table_no'] ?? 'Table No' }}: {{ $item->table_no }}
                                                </div>
                                            @endif
                                        </td>
                                        <td><span
                                                class="badge {{ $item->OrderStatusBadge('bg', $item->status) }}">{{ $item->OrderStatusString($item->status) }}</span>
                                        </td>
                                        <td class="d-none d-xl-table-cell">
                                            <div class="text-muted">
                                                {{ $lang->data['total'] ?? 'Total' }}:
                                                {{ getCurrency() }}{{ number_format($item->total, 2) }}
                                            </div>
                                            <div class="text-muted">
                                                {{ $lang->data['paid'] ?? 'Paid' }}:
                                                {{ getCurrency() }}{{ number_format($item->payments->sum('amount'), 2) }}
                                            </div>
                                            <strong>{{ $lang->data['balance'] ?? 'Balance' }}:
                                                {{ getCurrency() }}{{ number_format($item->total - $item->payments->sum('amount'), 2) }}</strong>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.view_order', $item->id) }}"
                                                class="btn btn-sm w-100 btn-gray">{{ $lang->data['view'] ?? 'View' }}</a>
                                            @if ($item->total - $item->payments->sum('amount') > 0)
                                                <a href="#" class="btn btn-sm btn-gray mt-2"
                                                    data-bs-target="#ModalPayment" data-bs-toggle="modal"
                                                    wire:click="viewPayment({{ $item->id }})">{{ $lang->data['add_payment'] ?? 'Add Payment' }}</a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($item->status < 3 && Auth::user()->can('change_status'))
                                                <a href="#"
                                                    class="btn btn-sm {{ $item->OrderStatusBadge('btn', $item->status + 1) }}"
                                                    wire:click="changeStatus({{ $item }})">{{ $lang->data['mark_as'] ?? 'Mark As' }}
                                                    {{ $item->OrderStatusString($item->status + 1) }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (count($orders) == 0)
                            <x-no-data-component
                                message="{{ $lang->data['no_orders_found'] ?? 'No orders were found..' }}" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
