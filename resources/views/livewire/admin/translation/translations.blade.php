<div class="">
    <div class="flex items-stretch lg:fixed z-5 top-[--tw-header-height] start-[--tw-sidebar-width] end-5 h-[--tw-navbar-height] mx-5 lg:mx-0 bg-[--tw-page-bg] dark:bg-[--tw-page-bg-dark]"
        id="navbar">
        <div
            class="rounded-t-xl border border-gray-400 dark:border-gray-200 border-b-gray-300 dark:border-b-gray-200  bg-[--tw-content-bg] flex items-stretch grow">
            <div class="w-full flex">
                <div class="flex flex-wrap px-4 items-center justify-between w-full gap-3 container-fluid">
                    <div class="flex flex-wrap items-center gap-1 lg:gap-5">
                        <h1 class="text-lg font-medium text-gray-900">
                            {{ $lang->data['translations'] ?? 'Translations' }}
                        </h1>
                    </div>
                    @if (Auth::user()->can('add_translation'))
                    <div class="flex items-center gap-1">
                        <a class="btn btn-light btn-sm" data-modal-toggle="#manage_modal"
                        href="{{ route('admin.add_translation') }}">
                            {{ $lang->data['new_translation'] ?? 'New Translation' }}
                        </a>
                    @endif
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
                    <div class="col-12">
                        <div class="card p-0">
                            <div class="card-body p-0">
                                <table class="table table-striped table-bordered mb-0">
                                    <thead class="bg-secondary-light">
                                        <tr>
                                            <th class="tw-5">{{ $lang->data['sl'] ?? 'Sl' }}</th>
                                            <th class="tw-40">{{ $lang->data['name'] ?? 'Name' }}</th>
                                            <th class="tw-20">{{ $lang->data['actions'] ?? 'Actions' }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($translations as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>
                                                    {{ $item->name }} @if ($item->is_default)
                                                        <span
                                                            class="badge badge-primary">{{ $lang->data['default'] ?? 'Default' }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (Auth::user()->can('edit_translation'))
                                                        <a href="{{ route('admin.edit_translation', $item->id) }}"
                                                            class="btn btn-sm btn-primary">{{ $lang->data['edit'] ?? 'Edit' }}</a>
                                                    @endif
                                                    @if (Auth::user()->can('delete_translation'))
                                                        <a href="#" class="btn btn-sm btn-danger"
                                                            wire:click="delete({{ $item }})">{{ $lang->data['delete'] ?? 'Delete' }}</a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                                @if (count($translations) == 0)
                                    <x-no-data-component
                                        message="{{ $lang->data['no_translations_found'] ?? 'No translations were found..' }}" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>