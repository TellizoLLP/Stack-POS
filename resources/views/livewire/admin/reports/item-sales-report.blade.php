<div>
    <!-- Header Section -->
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div
            class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200 bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{ $lang->data['item_wise_report'] ?? 'Item Wise Sales Report' }}
                        </h1>
                    </div>
                    <div class="flex items-center gap-1">
                        <a class="btn btn-light btn-sm"
                            wire:click='getData'>
                            {{ $lang->data['search'] ?? 'Search' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <main class="w-full grow">
        <div class="min-w-full card card-grid rounded-none border-none shadow-none">
            <div class="card-body">

                <div class="card-header p-3">
                    <div class="flex flex-wrap gap-4">

                        <div class="flex flex-col p-4">
                            <label>{{ $lang->data['start_date'] ?? 'Start Date' }}</label>
                            <input type="date" class="form-control" wire:model="start_date">
                        </div>

                        <div class="flex flex-col p-4">
                            <label>{{ $lang->data['end_date'] ?? 'End Date' }}</label>
                            <input type="date" class="form-control" wire:model="end_date">
                        </div>

                        <div class="flex flex-col p-4">
                            <label class="">{{ $lang->data['search_item'] ?? 'Search Item' }}</label>
                            <input type="text" 
                                placeholder="{{ $lang->data['all_items'] ?? 'All Items' }}" wire:model='search'/>
                        </div>
                    </div>
                </div>


                <div class="card-body p-0">
                    <div class="scrollable-x-auto">
                        <table class="table table-auto table-border">
                            <thead>
                                <tr>
                                    <th class="tw-2">{{ $lang->data['sl'] ?? 'Sl' }}</th>
                                    <th class="tw-25">{{ $lang->data['item_name'] ?? 'Item Name' }}</th>
                                    <th class="tw-10">{{ $lang->data['qty'] ?? 'Qty' }}</th>
                                    <th class="tw-20">{{ $lang->data['amount'] ?? 'Amount' }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['qty'] }}</td>
                                        <td>{{ getCurrency() }}{{ number_format($item['amount'], 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        @if (count($data) == 0)
                            <x-no-data-component message="{{ $lang->data['no_data_found'] ?? 'No data found..' }}" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
