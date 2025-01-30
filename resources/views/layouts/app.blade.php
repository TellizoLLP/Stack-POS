<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SketchStack Pos">
    <meta name="author" content="SketchStack">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <title>{{getStoreName()}}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link href="{{ asset('new_assets/vendors/keenicons/styles.bundle.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('new_assets/css/toastr.min.css') }}">

    <link href="{{ asset('new_assets/css/styles.css') }}" rel="stylesheet" />
    <script>
        const defaultThemeMode = 'light'; // light|dark|system
        document.documentElement.classList.add(defaultThemeMode);
    </script>
    @stack('css')
    @livewireScripts()
    @livewireStyles()
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased flex h-full w-screen text-base text-gray-700 [--tw-page-bg:#f6f6f6] [--tw-page-bg-dark:var(--tw-coal-200)] [--tw-content-bg:var(--tw-light)] [--tw-content-bg-dark:var(--tw-coal-500)] [--tw-content-scrollbar-color:#e8e8e8] [--tw-header-height:58px] [--tw-sidebar-width:58px] [--tw-navbar-height:56px] bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark] lg:overflow-hidden">
    <div class="flex grow w-full">
        <livewire:components.header>
            <div class="flex flex-col lg:flex-row grow pt-[--tw-header-height]  w-full">
                <livewire:components.sidebar />
                <div
                    class=" w-full flex grow rounded-b-xl bg-[--tw-content-bg] dark:bg-[--tw-content-bg-dark] border-x border-b border-gray-400 dark:border-gray-200 lg:mt-[--tw-navbar-height] mx-5 lg:ms-[--tw-sidebar-width] mb-5">
                    <div
                        class=" w-full flex flex-col lg:[scrollbar-width:auto] lg:light:[--tw-scrollbar-thumb-color:var(--tw-content-scrollbar-color)] h-[calc(100vh-2rem)] overflow-y-auto">
                        {{ $slot }}
                    </div>
                </div>
            </div>

    </div>
    <script src="{{ asset('new_assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('new_assets/js/jquery-3.7.1.min.js') }}"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script src="{{ asset('new_assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('new_assets/js/core.bundle.js') }}"></script>
    <script src="{{ asset('new_assets/js/widgets/general.js') }}"></script>

    <script>
        "use strict";
        document.addEventListener('livewire:init', () => {
            Livewire.on('closemodal', (event) => {
                let modals = document.querySelectorAll('.modal.open')
                for (let i = 0; i < modals.length; i++) {
                    let modal = window.KTModal.getOrCreateInstance(modals[i])
                    modal.hide()
                }
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('notify', (event) => {
                toastr[event[0].type](event[0].message, event[0].title)
            });
        });
    </script>
    <!-- <script>
        "use strict"
        Livewire.on('closemodal', () => {
            $('.modal').modal('hide');
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open');
            $('body').removeAttr('style');
        })
    </script>
    <script>
        "use strict";
        Livewire.on('reloadpage', () => {
            window.location.reload();
        })
    </script>
    <script>
        "use strict";
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message, event.detail.title ?? '');
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });
        @if(Session::has('message'))
        toastr.info("{{ Session::get('message') }}");
        @endif
    </script> -->
    @stack('script')
</body>

</html>