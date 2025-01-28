<div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
    id="navbar">
    <div
        class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200  bg-[--tw-content-bg] flex items-stretch grow">
        <div class="w-full flex">
            <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                    <h1 class="text-lg font-medium text-gray-900">
                        {{$lang->data['staffs']??'Staffs'}}
                    </h1>
                </div>
                @if (Auth::user()->can('add_staff'))
                <div class="flex items-center gap-1">
                    <a class="btn btn-light btn-sm" href="{{route('admin.create_staff')}}">
                        {{ $lang->data['new_staff'] ?? 'New Staff' }}
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Make main scrollable -->
<main class="w-full grow h-[calc(100vh-<header-height>)] overflow-auto">
    <div class="min-w-full card card-grid rounded-none border-none shadow-none">
        <div class="card-body">
            <div class="scrollable-x-auto overflow-auto">
                <table class="table table-auto table-border">
                    <thead>
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
                                        {{ $lang->data['name'] ?? 'Name' }}
                                    </span>
                                </span>
                            </th>
                            <th class="">
                                <span class="sort">
                                    <span class="sort-label">
                                        {{ $lang->data['contact_number'] ?? 'Contact Number' }}
                                    </span>
                                </span>
                            </th>
                            <th class="">
                                <span class="sort">
                                    <span class="sort-label">
                                        {{ $lang->data['email'] ?? 'Email' }}
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
                    </thead>
                    @if (Auth::user()->can('staffs_list'))
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
                    @foreach ($staffs as $row)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div>
                                        @if (Auth::user()->can('edit_staff'))
                                        <a class="menu-link" href="{{ route('admin.edit_staff',$row->id) }}">
                                            <span class="menu-icon">
                                                <i class="ki-filled ki-pencil text-lg hover:text-blue-500"
                                                    >
                                                </i>
                                            </span>
                                        </a>
                                    </div>
                                    <div>
                                        @endif
                                        @if (Auth::user()->can('delete_staff'))
                                        <a class="menu-link">
                                            <i class="ki-filled ki-trash text-lg hover:text-red-500"
                                                wire:click="delete({{ $row->id }})">
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    @endif
                </table>
                @if(count($staffs) == 0)
                <x-no-data-component message="{{$lang->data['no_staffs_found']??'No staffs were found..'}}" />
                @endif
            </div>
        </div>
    </div>
</main>
