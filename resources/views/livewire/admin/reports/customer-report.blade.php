<div>
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]" id="navbar">
        <div class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200 bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">{{ $lang->data['customer_report'] ?? 'Customer Report' }}</h1>
                    </div>
                     <div class="flex items-center gap-4">
                        <div class="col-md-3 gap-2">
                            <label>{{$lang->data['search_customer'] ?? 'Search Customer'}}</label>
                            <input type="text" class="form-control" placeholder="{{$lang->data['all_customers'] ?? 'All Customers'}}" wire:model='search'>
                        </div>

                        <a href="#" class="btn btn-primary text-sm" wire:click='getData'>{{$lang->data['search'] ?? 'Search'}}</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="w-full grow">
        <div class="min-w-full card card-grid rounded-none border-none shadow-none">
            <div class="card-body">
                <div class="scrollable-x-auto">
                    <table class="table table-auto table-border">
                        <thead>
                            <tr>
                                <th class="tw-5">{{ $lang->data['sl'] ?? 'Sl' }}</th>
                                <th class="tw-40">{{ $lang->data['customer_name'] ?? 'Customer Name' }}</th>
                                <th class="tw-10">{{ $lang->data['sales_total'] ?? 'Sales Total' }}</th>
                                <th class="tw-20">{{ $lang->data['total_paid'] ?? 'Total Paid' }}</th>
                                <th class="tw-20">{{ $lang->data['balance'] ?? 'Balance' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $customer)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $customer['name'] }}</td>
                                    <td>{{ getCurrency() }}{{ number_format($customer['orders_sum_total'], 2) }}</td>
                                    <td>{{ getCurrency() }}{{ number_format($customer['payments_sum_amount'], 2) }}</td>
                                    <td>{{ getCurrency() }}{{ number_format($customer['orders_sum_total'] - $customer['payments_sum_amount'], 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(count($data) == 0)
                        <x-no-data-component message="{{ $lang->data['no_data_found'] ?? 'No data was found..' }}" />
                    @endif
                </div>
            </div>
        </div>
    </main>
</div>
