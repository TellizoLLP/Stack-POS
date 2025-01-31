<div>

    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div
            class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200  bg-[--tw-content-bg] flex items-stretch grow">
            <div class="flex w-full">
                <div class="flex flex-wrap items-center justify-between w-full gap-3 px-4 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <div class="flex items-center space-x-2">

                            <span class="font-medium text-gray-800"> {{ $lang->data['dashboard'] ?? 'Dashboard' }}</span>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="pt-4 container-fluid">
        <div class="grid gap-5 lg:gap-5">
            <!-- begin: grid -->
            <div class="grid lg:grid-cols-2 gap-3 lg:gap-7.5 items-stretch">
                <div class="lg:col-span-2 ">
                    <div class="h-full rounded-lg overflow-clip card bg-slate-300">
                        <div class=" card-header">
                            <h3 class="card-title">
                                Sales Overview
                            </h3>
                        </div>
                        <div class="flex flex-col gap-2 card-body ">
                            <div class="p-1 ">
                                <div class="flex gap-4 flex-">
                                    <div class="flex gap-4">
                                        <div class="relative px-6 py-4 rounded-lg bg-white-200 flex-colw-32 flexfitems-center ring-1 ring-blue-400 ">
                                            <div class="absolute flex items-center bottom-2 right-3 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-truck align-middle">
                                                    <rect x="1" y="3" width="15" height="13">
                                                    </rect>
                                                    <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                                    <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                                    <circle cx="18.5" cy="18.5" r="2.5"></circle>
                                                </svg>
                                            </div>
                                            <div class="">
                                                <p class="text-l font-semibold ">{{ $lang->data['lifetime_orders'] ?? 'Lifetime Orders' }}</p>
                                                <p class="text-lg font-semibold text-black">{{ \App\Models\Order::count() }}</p>
                                            </div>
                                        </div>
                                        <div class="relative px-6 py-4 rounded-lg bg-white-200 flex-colw-32 flexfitems-center ring-1 ring-blue-400 ">
                                            <div class="absolute flex items-center bottom-3 right-2 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-users align-middle">
                                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="9" cy="7" r="4"></circle>
                                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                </svg>
                                            </div>
                                            <div class="">
                                                <p class="text-l font-semibold ">{{ $lang->data['today_order'] ?? 'Today Order' }}</p>
                                                <p class="font-semibold text-black text-l">{{ \App\Models\Order::whereDate('date', \Carbon\Carbon::today())->count() }}</p>
                                            </div>
                                        </div>
                                        <div class="relative px-6 py-4 rounded-lg bg-white-200 flex-colw-32 flexfitems-center ring-1 ring-blue-400 ">
                                            <div class="absolute flex items-center bottom-3 right-2 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-dollar-sign align-middle">
                                                    <line x1="12" y1="1" x2="12"
                                                        y2="23">
                                                    </line>
                                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="">
                                                <p class="text-l font-semibold">{{ $lang->data['today_sale'] ?? 'Today Sale' }}</p>
                                                <p class="font-semibold text-black text-l"> {{ getCurrency() }}{{ \App\Models\Order::whereDate('date', \Carbon\Carbon::today())->sum('total') }}</p>
                                            </div>
                                        </div>
                                        <div class="relative px-6 py-4 rounded-lg bg-white-200 flex-colw-32 flexfitems-center ring-1 ring-blue-400 ">
                                            <div class="absolute flex items-center bottom-3 right-2 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-shopping-cart align-middle">
                                                    <circle cx="9" cy="21" r="1"></circle>
                                                    <circle cx="20" cy="21" r="1"></circle>
                                                    <path
                                                        d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="">
                                                <p class="text-l font-semibold">{{ $lang->data['total_customer'] ?? 'Total Customer' }}</p>
                                                <p class="font-semibold text-black text-l">{{ \App\Models\Customer::count() }}</p>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2 ">
                    <div class="h-full rounded-lg overflow-clip card bg-slate-300">
                        <div class=" card-header">
                            <h3 class="card-title">
                                {{ $lang->data['overview'] ?? 'Overview' }}
                            </h3>
                        </div>
                        <div class="card-body text-center chart-holder">
                            <template x-if="showChart">
                                <div class="" id="chart"></div>
                            </template>
                            <template x-if="!showChart">
                                <div class="w-100 justify-content-center items-center">
                                    <x-no-data-component
                                        message="{{ $lang->data['no_data_found'] ?? 'No data was found..' }}" />
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <div class="h-full card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ $lang->data['latest_orders'] ?? 'Latest Orders' }}
                            </h3>

                        </div>
                        <div class="card-body ">
                            <table class="table table-striped table-sm table-bordered ">
                                <thead>
                                    <tr>

                                        <th>{{ $lang->data['order_no'] ?? 'Order Id' }}</th>
                                        <th>{{ $lang->data['customer'] ?? 'Customer' }}</thlass=>
                                        <th>{{ $lang->data['order_type'] ?? 'Order Type' }}</th>
                                        <th>{{ $lang->data['amount'] ?? 'Amount' }}</thclass=>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($latestorders as $order)
                                    <tr>
                                        <td>{{ $lang->data['order_no'] ?? 'Order ID' }}:
                                            {{ $order->order_number }}
                                        </td>
                                        <td>{{ $order->customer_name_fn }}</td>
                                        <td class="d-none d-xl-table-cell">
                                        <span class="badge badge-sm badge-outline {{ $order->OrderTypeBadge('badge', $order->order_type) }}">
                                            {{ $order->order_type_string }}
                                        </span>
                                        </td>
                                        <td><span
                                        class="badge badge-sm badge-outline {{ $order->OrderStatusBadge('badge', $order->status) }}">{{ $order->OrderStatusString($order->status) }}</span></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            @if (count($latestorders) == 0)
                            <div class="flex justify-center items-center w-full min-h-[200px]">
                                <x-no-data-component message="{{ $lang->data['no_data_found'] ?? 'No data was found..' }}" />
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
                <!-- pending orders -->
                <div class="lg:col-span-2">
                    <div class="h-full card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ $lang->data['pending_orders'] ?? 'Pending Orders' }}
                            </h3>

                        </div>
                        <div class="card-body ">
                            <table class="table table-striped table-sm table-bordered mb-0">
                                <thead>
                                    <tr>

                                        <th class="tw-10">{{ $lang->data['order_no'] ?? 'Order Id' }}</th>
                                        <th class="tw-20">{{ $lang->data['customer'] ?? 'Customer' }}</th>
                                        <th class="tw-10">{{ $lang->data['order_type'] ?? 'Order Type' }}</th>
                                        <th class="tw-10">{{ $lang->data['amount'] ?? 'Amount' }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendingorders as $order)
                                    <tr>
                                        <td>{{ $lang->data['order_no'] ?? 'Order ID' }}:
                                            {{ $order->order_number }}
                                        </td>
                                        <td>{{ $order->customer_name_fn }}</td>
                                        <td class="d-none d-xl-table-cell">
                                        <span class="badge badge-sm badge-outline {{ $order->OrderTypeBadge('badge', $order->order_type) }}">
                                            {{ $order->order_type_string }}
                                        </span>
                                        </td>
                                        <td><span
                                                class="badge {{ $order->OrderStatusBadge('bg', $order->status) }}">{{ $order->OrderStatusString($order->status) }}</span>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            @if (count($pendingorders) == 0)
                            <div class="flex justify-center items-center w-full min-h-[200px]">
                                <x-no-data-component message="{{ $lang->data['no_data_found'] ?? 'No data was found..' }}" />
                            </div>
                            @endif

                        </div>
                    </div>
                </div>


            </div>
            
        </div>
    </div>
</div>
<!-- @push('css')
                <link rel="stylesheet" href="{{ asset('assets/js/apex/apexcharts.css') }}">
            @endpush
            <script src="{{ asset('assets/js/apex/apexcharts.min.js') }}"></script>
            <script>
                function initAlpine() {
                    return {
                        showChart: false,
                        async init() {
                            let allseries = [{{ \App\Models\Order::whereStatus(\App\Models\Order::PENDING)->count() }},
                                {{ \App\Models\Order::whereStatus(\App\Models\Order::COOKING)->count() }},
                                {{ \App\Models\Order::whereStatus(\App\Models\Order::READY)->count() }},
                                {{ \App\Models\Order::whereStatus(\App\Models\Order::COMPLETED)->count() }}
                            ]
                            let showdata = false;
                            allseries.forEach((item) => {
                                if (item > 0) {
                                    showdata = true;
                                }
                            })
                            if (showdata == false) {
                                allseries = []
                                return;
                            } else {
                                this.showChart = true;
                            }
                            await this.$nextTick();
                            var options = {
                                chart: {
                                    type: 'donut',
                                    height: '150%',
                                    width: '130%',

                                },
                                noData: {
                                    text: "There's no data",
                                    align: 'center',
                                    verticalAlign: 'middle',
                                },
                                series: allseries,
                                labels: ['{{ $lang->data['pending'] ?? 'Pending' }}',
                                    '{{ $lang->data['cooking'] ?? 'Cooking' }}',
                                    '{{ $lang->data['ready'] ?? 'Ready' }}',
                                    '{{ $lang->data['completed'] ?? 'Completed' }}'
                                ],
                                colors: ['#fcb92c', '#8b1cbb', '#49c9a3', '#2106ed']
                            }
                            var chart = new ApexCharts(document.querySelector("#chart"), options);
                            chart.render();
                        }
                    }
                }
            </script> -->