<header
    class="flex items-center fixed z-10 top-0 left-0 right-0 shrink-0 h-[--tw-header-height] bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
    id="header">
    <!-- Container -->
    <div class="container-fluid flex justify-between items-stretch px-5 lg:ps-0 lg:gap-4" id="header_container">
        <div class="flex items-center mr-1">
            <div class="flex items-center justify-center lg:w-[--tw-sidebar-width] gap-2 shrink-0">
                <button class="btn btn-icon btn-light btn-clear btn-sm -ms-2 lg:hidden" data-drawer-toggle="#sidebar">
                 <i class="ki-filled ki-menu">
                 </i>
                </button>
                <a class="mx-1" href="/metronic/tailwind/demo3/">
                 <img class=" min-h-[24px]" src="/new_assets/media/app/mini-logo-primary.svg">
                </a>
               </div>
            <div class="flex items-center">
                <h3 class="text-gray-700 text-base hidden md:block">
                    {{getStoreName()}}
                </h3>
                <span class="text-sm text-gray-400 font-medium px-2.5 hidden md:inline">
                </span>
                <div class="menu menu-default" data-menu="true">
                    <div class="menu-item" data-menu-item-offset="0, 10px" data-menu-item-placement="bottom-start"
                        data-menu-item-toggle="dropdown" data-menu-item-trigger="hover">
                        <button class="menu-toggle text-gray-900 font-medium">
                            Account
                            <span class="menu-arrow">
                                <i class="ki-filled ki-down">
                                </i>
                            </span>
                        </button>
                        <div class="menu-dropdown w-48 py-2">
                            <div class="menu-item">
                                <a class="menu-link" href="public-profile/profiles/default.html" tabindex="0">
                                    <span class="menu-icon">
                                        <i class="ki-filled ki-profile-circle">
                                        </i>
                                    </span>
                                    <span class="menu-title">
                                        Public Profile
                                    </span>
                                </a>
                            </div>
                            <div class="menu-item active">
                                <a class="menu-link" href="index.html" tabindex="0">
                                    <span class="menu-icon">
                                        <i class="ki-filled ki-setting-2">
                                        </i>
                                    </span>
                                    <span class="menu-title">
                                        Account
                                    </span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="network/get-started.html" tabindex="0">
                                    <span class="menu-icon">
                                        <i class="ki-filled ki-users">
                                        </i>
                                    </span>
                                    <span class="menu-title">
                                        Network
                                    </span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="authentication/get-started.html" tabindex="0">
                                    <span class="menu-icon">
                                        <i class="ki-filled ki-security-user">
                                        </i>
                                    </span>
                                    <span class="menu-title">
                                        Authentication
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Logo -->
        <!-- Topbar -->
        <div class="flex items-center lg:gap-3.5">
          
            <div class="menu" data-menu="true">
                <div class="menu-item" data-menu-item-offset="0px, 9px" data-menu-item-placement="bottom-end"
                    data-menu-item-placement-rtl="bottom-start" data-menu-item-toggle="dropdown"
                    data-menu-item-trigger="click|lg:click">
                    <div class="menu-toggle btn btn-icon rounded-full">
                        <img alt=""
                            class="size-8 rounded-full justify-center border border-gray-500 shrink-0"
                            src="/new_assets/media/avatars/gray/5.png">
                        </img>
                    </div>
                    <div class="menu-dropdown menu-default light:border-gray-300 w-screen max-w-[250px]">
                        <div class="flex items-center justify-between px-5 py-1.5 gap-1.5">
                            <div class="flex items-center gap-2">
                                <img alt="" class="size-9 rounded-full border-2 border-success"
                                    src="/new_assets/media/avatars/300-2.png">
                                <div class="flex flex-col gap-1.5">
                                    <span class="text-sm text-gray-800 font-semibold leading-none">
                                        Cody Fisher
                                    </span>
                                    <a class="text-xs text-gray-600 hover:text-primary font-medium leading-none"
                                        href="account/home/get-started.html">
                                        c.fisher@gmail.com
                                    </a>
                                </div>
                                </img>
                            </div>
                            <span class="badge badge-xs badge-primary badge-outline">
                                Pro
                            </span>
                        </div>
                       
                        <div class="flex flex-col">
                            <div class="menu-item mb-0.5">
                                <div class="menu-link">
                                    <span class="menu-icon">
                                        <i class="ki-filled ki-moon">
                                        </i>
                                    </span>
                                    <span class="menu-title">
                                        Dark Mode
                                    </span>
                                    <label class="switch switch-sm">
                                        <input data-theme-state="dark" data-theme-toggle="true" name="check"
                                            type="checkbox" value="1">
                                        </input>
                                    </label>
                                </div>
                            </div>
                            <div class="menu-item px-4 py-1.5">
                                <a class="btn btn-sm btn-light justify-center"
                                     wire:click="logout">
                                    Log out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Topbar -->
    </div>
    <!-- End of Container -->
</header>
