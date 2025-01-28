<div class="">
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div
            class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200  bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{ $lang->data['order_status_screen'] ?? 'Order Status Screen' }}
                        </h1>
                    </div>
                    <div class="flex items-center gap-1">
                        <a class="btn btn-light btn-sm" data-modal-toggle="#manage_modal"
                            href="{{ route('admin.pos') }}">
                            {{ $lang->data['new_order'] ?? 'New Order' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="w-full grow scrollable-y-auto" style="max-height: 100vh;">
        <div class="container-fluid">
            <div>
                <div class="row mb-2 mb-xl-3"></div>
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5 class="card-title text-pending">{{ $lang->data['pending'] ?? 'Pending' }}</h5>
                            </div>
                            <div class="card-body" id="pending" data-type="0">
                                @foreach ($pendingOrders as $order)
                                    <div id="tasks-completed{{ $order->id }}" class="mh-50"
                                        data-id="{{ $order->id }}">
                                        <div
                                            class="card mb-3 bg-s-pending cursor-grab border fixed-height-custom-status ">
                                            <div class="card-body p-2">

                                                <div class="d-flex justify-content-between mb-2">
                                                    <div>
                                                        <span
                                                            class="fw-bolder ms-2">{{ $order->customer_name_fn }}</span>
                                                        <div class="ms-2 mb-0 mt-2">
                                                            <span
                                                                class="text-xs">{{ $lang->data['order_type'] ?? 'Order Type' }}:</span>
                                                            <span
                                                                class="fw-bolder text-uppercase">{{ $order->order_type_string }}</span>

                                                        </div>
                                                        @if ($order->order_type == \App\Models\Order::DINING)
                                                            <div class="ms-2 mb-0 mt-2">
                                                                <span
                                                                    class="text-xs">{{ $lang->data['table_no'] ?? 'Table No' }}:</span>
                                                                <span
                                                                    class="fw-bolder text-uppercase">{{ $order->table_no }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="fw-600 text-sm ms-2">{{ $lang->data['order_no'] ?? 'Order No' }}:
                                                            {{ $order->order_number }} </span>
                                                        <div class="ms-2 mb-0 mt-2">
                                                            <span
                                                                class="text-xs">{{ $lang->data['bill_amount'] ?? 'Bill Amount' }}:
                                                                {{ getCurrency() }}{{ number_format($order->total, 2) }}</span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5 class="card-title text-cooking">{{ $lang->data['cooking'] ?? 'Cooking' }}</h5>
                            </div>
                            <div class="card-body" id="cooking" data-type="1">
                                @foreach ($cookingOrders as $order)
                                    <div id="tasks-completed{{ $order->id }}" class="mh-50"
                                        data-id="{{ $order->id }}">
                                        <div
                                            class="card mb-3 bg-s-cooking cursor-grab border fixed-height-custom-status">
                                            <div class="card-body p-2">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <div>
                                                        <span
                                                            class="fw-bolder ms-2">{{ $order->customer_name_fn }}</span>
                                                        <div class="ms-2 mb-0 mt-2">
                                                            <span
                                                                class="text-xs">{{ $lang->data['order_type'] ?? 'Order Type' }}:</span>
                                                            <span
                                                                class="fw-bolder text-uppercase">{{ $order->order_type_string }}</span>

                                                        </div>
                                                        @if ($order->order_type == \App\Models\Order::DINING)
                                                            <div class="ms-2 mb-0 mt-2">
                                                                <span
                                                                    class="text-xs">{{ $lang->data['table_no'] ?? 'Table No' }}:</span>
                                                                <span
                                                                    class="fw-bolder text-uppercase">{{ $order->table_no }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="fw-600 text-sm ms-2">{{ $lang->data['order_no'] ?? 'Order No' }}:
                                                            {{ $order->order_number }} </span>
                                                        <div class="ms-2 mb-0 mt-2">
                                                            <span
                                                                class="text-xs">{{ $lang->data['bill_amount'] ?? 'Bill Amount' }}:
                                                                {{ getCurrency() }}{{ number_format($order->total, 2) }}</span>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <h5 class="card-title text-ready">{{ $lang->data['ready'] ?? 'Ready' }}</h5>
                            </div>
                            <div class="card-body" id="ready" data-type="2">
                                @foreach ($readyOrders as $order)
                                    <div id="tasks-completed{{ $order->id }}" class="mh-50"
                                        data-id="{{ $order->id }}">
                                        <div class="card mb-3 bg-s-ready cursor-grab border fixed-height-custom-status">
                                            <div class="card-body p-2">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <div>
                                                        <span
                                                            class="fw-bolder ms-2">{{ $order->customer_name_fn }}</span>
                                                        <div class="ms-2 mb-0 mt-2">
                                                            <span
                                                                class="text-xs">{{ $lang->data['order_type'] ?? 'Order Type' }}:</span>
                                                            <span
                                                                class="fw-bolder text-uppercase">{{ $order->order_type_string }}</span>

                                                        </div>
                                                        @if ($order->order_type == \App\Models\Order::DINING)
                                                            <div class="ms-2 mb-0 mt-2">
                                                                <span
                                                                    class="text-xs">{{ $lang->data['table_no'] ?? 'Table No' }}:</span>
                                                                <span
                                                                    class="fw-bolder text-uppercase">{{ $order->table_no }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="fw-600 text-sm ms-2">{{ $lang->data['order_no'] ?? 'Order No' }}:
                                                            {{ $order->order_number }} </span>
                                                        <div class="ms-2 mb-0 mt-2">
                                                            <span
                                                                class="text-xs">{{ $lang->data['bill_amount'] ?? 'Bill Amount' }}:
                                                                {{ getCurrency() }}{{ number_format($order->total, 2) }}</span>

                                                        </div>
                                                        @if (Auth::user()->can('change_status'))
                                                            <div class="ms-2 mb-0 mt-2">
                                                                <button class="btn btn-success btn-sm"
                                                                    wire:click='changeStatus({{ $order->id }},3)'>{{ $lang->data['mark_as_completed'] ?? 'Mark as Completed' }}</button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @push('css')
                    <link rel="stylesheet" href="{{ asset('assets/js/dragula.css') }}">
                @endpush
                @push('script')
                    <script src="{{ asset('/assets/js/dragula.js') }}"></script>
                    <script>
                        $(document).ready(function() {
                            var drake = dragula([document.querySelector('#ready'), document.querySelector('#cooking'), document
                                .querySelector('#pending')
                            ], {
                                accepts: function(el, target, source, sibling) {
                                    if (target.id == 'new') {
                                        return false;
                                    }
                                    return true; // elements can be dropped in any of the `containers` by default
                                },
                            });
                            drake.on("drop", function(el, target, source, sibling) {
                                @this.changeStatus(el.dataset.id, target.dataset.type);
                            });
                        });
                    </script>
                @endpush
            </div>
        </div>
    </main>
</div>