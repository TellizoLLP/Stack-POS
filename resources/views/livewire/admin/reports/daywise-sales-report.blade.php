<div>
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div
            class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200  bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{$lang->data['day_wise_report'] ?? 'Day Wise Sales Report'}}
                        </h1>
                    </div>
                    <div class="flex items-center gap-1">
                        @if (Auth::user()->can('search_customer'))
                            <a class="btn btn-light btn-sm " data-modal-toggle="#ModalCustomer" href="#"
                                wire:click="resetFields">
                               {{$lang->data['search'] ?? 'Search'}}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap gap-4">
        <div class="flex flex-col p-4 >
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
        <div class="flex items-center justify-center ">
            <a href="#" class="btn btn-primary btn-sm" wire:click="getData">
                {{$lang->data['search'] ?? 'Search'}}
            </a>
        </div>
    </div>
    
</div>
    <main class="w-full grow">
        <div class="min-w-full card card-grid rounded-none border-none shadow-none">
            <div class="card-body">
                <div>
                    <div class="scrollable-x-auto">
                        <table class="table table-auto table-border ">
                            <thead>
                                <tr>
                                    <th class="tw-2">{{$lang->data['sl'] ?? 'Sl'}}</th>
                                    <th class="tw-10">{{$lang->data['date'] ?? 'Date'}}</th>
                                    <th class="tw-10">{{$lang->data['no_of_orders'] ?? 'No of Orders'}}</th>
                                    <th class="tw-20">{{$lang->data['sales_total'] ?? 'Sales Total'}}</th>
                                    <th class="tw-20">{{$lang->data['payments_received'] ?? 'Payments Received'}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{Carbon\Carbon::parse($item['date'])->format('d/m/Y')}}</td>
                                    <td>{{$item['count']}}</td>
                                    <td>{{getCurrency()}}{{$item['total']}}</td>
                                    <td>{{getCurrency()}}{{$item['total_paid']}}</td>
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

    </main>

</div>
