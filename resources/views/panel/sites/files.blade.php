@extends('layouts.panel')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('panel.sites.files.title') }}: {{ $site->name }}
    </h2>
@endsection

@section('content')
    <div class="py-12" x-data="fileManager()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                 @dragover.prevent="dragging = true"
                 @dragleave.prevent="dragging = false"
                 @drop.prevent="dropHandler($event)">

                <!-- Drag and Drop Overlay -->
                <div x-show="dragging"
                     class="absolute inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
                    <div class="text-white text-2xl">{{ __('Drop files to upload') }}</div>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Breadcrumbs and Path -->
                    <nav class="flex mb-4" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="{{ route('panel.sites.files', [$organisation, $site, 'path' => '/']) }}"
                                   class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                    </svg>
                                    {{ __('Home') }}
                                </a>
                            </li>
                            @php
                                $breadcrumbs = collect(explode('/', $path))->filter();
                                $currentPath = '';
                            @endphp
                            @foreach ($breadcrumbs as $breadcrumb)
                                @php $currentPath .= '/' . $breadcrumb; @endphp
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                        <a href="{{ route('panel.sites.files', [$organisation, $site, 'path' => $currentPath]) }}"
                                           class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ $breadcrumb }}</a>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </nav>

                    <!-- Action Buttons -->
                    <div class="flex justify-between mb-4">
                        <div>
                            <template x-if="selectedItems.length > 0">
                                <div>
                                    <x-danger-button @click="openDeleteModal()">
                                        {{ __('Delete Selected') }}
                                    </x-danger-button>
                                    <x-secondary-button @click="openMoveModal()">
                                        {{ __('Move Selected') }}
                                    </x-secondary-button>
                                </div>
                            </template>
                        </div>
                        <div>
                            <x-primary-button @click="$dispatch('open-modal', 'upload-file')">{{ __('Upload File') }}</x-primary-button>
                            <x-secondary-button @click="$dispatch('open-modal', 'create-folder')">{{ __('Create Folder') }}</x-secondary-button>
                        </div>
                    </div>

                    <!-- Files and Folders Table -->
                    <table class="w-full">
                        <thead>
                            <tr class="border-b-2 border-gray-200 dark:border-gray-700">
                                <th class="p-2 text-left w-8"><input type="checkbox" @change="toggleSelectAll($event)"></th>
                                <th class="text-left p-2">{{ __('Name') }}</th>
                                <th class="text-left p-2">{{ __('Type') }}</th>
                                <th class="text-left p-2">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($directories as $directory)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="p-2"><input type="checkbox" value="{{ basename($directory) }}" x-model="selectedItems" data-type="dir"></td>
                                    <td class="p-2">
                                        <a href="{{ route('panel.sites.files', [$organisation, $site, 'path' => $path . basename($directory) . '/']) }}" class="text-gimysite-500 hover:underline">
                                            {{ basename($directory) }}
                                        </a>
                                    </td>
                                    <td class="p-2">{{ __('strings.folder') }}</td>
                                    <td class="p-2">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                                    <div>...</div>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link href="#" @click.prevent="openRenameModal('{{ basename($directory) }}', 'dir')">{{ __('Rename') }}</x-dropdown-link>
                                                <x-dropdown-link href="#" @click.prevent="openMoveModal('{{ basename($directory) }}', 'dir')">{{ __('Move') }}</x-dropdown-link>
                                                <x-dropdown-link href="#" @click.prevent="openDeleteModal('{{ basename($directory) }}', 'dir')">{{ __('Delete') }}</x-dropdown-link>
                                            </x-slot>
                                        </x-dropdown>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($files as $file)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="p-2"><input type="checkbox" value="{{ basename($file) }}" x-model="selectedItems" data-type="file"></td>
                                    <td class="p-2">{{ basename($file) }}</td>
                                    <td class="p-2">{{ __('strings.file') }}</td>
                                    <td class="p-2">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                                    <div>...</div>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link href="{{ route('panel.sites.files.edit', [$organisation, $site, 'file' => $path . basename($file)]) }}">{{ __('Edit') }}</x-dropdown-link>
                                                <x-dropdown-link href="#" @click.prevent="openRenameModal('{{ basename($file) }}', 'file')">{{ __('Rename') }}</x-dropdown-link>
                                                <x-dropdown-link href="#" @click.prevent="openMoveModal('{{ basename($file) }}', 'file')">{{ __('Move') }}</x-dropdown-link>
                                                <x-dropdown-link href="#" @click.prevent="openDeleteModal('{{ basename($file) }}', 'file')">{{ __('Delete') }}</x-dropdown-link>
                                            </x-slot>
                                        </x-dropdown>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modals -->
        <x-modal name="upload-file" :show="$errors->uploadFile->isNotEmpty()" focusable>
            <form @submit.prevent="uploadFiles($event.target.file.files)" class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Upload File') }}</h2>
                <div class="mt-6">
                    <x-input-label for="file" value="{{ __('File') }}" />
                    <input type="file" name="file" id="file" class="mt-1 block w-full" multiple />
                    <x-input-error :messages="$errors->uploadFile->get('file')" class="mt-2" />
                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button @click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                    <x-primary-button class="ms-3">{{ __('Upload') }}</x-primary-button>
                </div>
            </form>
        </x-modal>

        <x-modal name="create-folder" :show="$errors->createFolder->isNotEmpty()" focusable>
            <form method="post" action="{{ route('panel.sites.files.create-folder', [$organisation, $site, 'path' => $path]) }}" class="p-6">
                @csrf
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Create Folder') }}</h2>
                <div class="mt-6">
                    <x-input-label for="folder_name" value="{{ __('Folder Name') }}" />
                    <x-text-input id="folder_name" name="folder_name" type="text" class="mt-1 block w-full" />
                    <x-input-error :messages="$errors->createFolder->get('folder_name')" class="mt-2" />
                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button @click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                    <x-primary-button class="ms-3">{{ __('Create') }}</x-primary-button>
                </div>
            </form>
        </x-modal>

        <x-modal name="rename-item" focusable>
            <form @submit.prevent="renameItem" class="p-6">
                @csrf
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Rename Item') }}</h2>
                <div class="mt-6">
                    <x-input-label for="new_name" value="{{ __('New Name') }}" />
                    <x-text-input id="new_name" name="new_name" type="text" class="mt-1 block w-full" x-model="rename.newName" />
                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button @click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                    <x-primary-button class="ms-3">{{ __('Rename') }}</x-primary-button>
                </div>
            </form>
        </x-modal>

        <x-modal name="move-items" focusable>
            <form @submit.prevent="moveItems" class="p-6">
                @csrf
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Move Items') }}</h2>
                <div class="mt-6">
                    <x-input-label for="destination" value="{{ __('Destination Folder') }}" />
                    <x-text-input id="destination" name="destination" type="text" class="mt-1 block w-full" x-model="move.destination" placeholder="/path/to/destination" />
                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button @click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                    <x-primary-button class="ms-3">{{ __('Move') }}</x-primary-button>
                </div>
            </form>
        </x-modal>

        <x-modal name="delete-items" focusable>
            <form @submit.prevent="deleteItems" class="p-6">
                @csrf
                @method('delete')
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Are you sure?') }}</h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('This will permanently delete the selected items.') }}</p>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button @click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>
                    <x-danger-button class="ms-3">{{ __('Delete') }}</x-danger-button>
                </div>
            </form>
        </x-modal>
    </div>

    <script>
        function fileManager() {
            return {
                dragging: false,
                selectedItems: [],
                rename: { oldName: '', newName: '', type: '' },
                move: { items: [], destination: '/' },
                delete: { items: [] },

                dropHandler(event) {
                    this.dragging = false;
                    this.uploadFiles(event.dataTransfer.files);
                },

                uploadFiles(files) {
                    const formData = new FormData();
                    for (let i = 0; i < files.length; i++) {
                        formData.append('file', files[i]);
                    }

                    fetch('{{ route('panel.sites.files.upload', [$organisation, $site, 'path' => $path]) }}', {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        body: formData
                    }).then(response => {
                        if (response.ok) {
                            window.location.reload();
                        } else {
                            alert('File upload failed.');
                        }
                    });
                },

                toggleSelectAll(event) {
                    if (event.target.checked) {
                        this.selectedItems = Array.from(document.querySelectorAll('input[type="checkbox"][data-type]')).map(el => el.value);
                    } else {
                        this.selectedItems = [];
                    }
                },

                getItems(name = null, type = null) {
                    if (name && type) {
                        return [{ path: '{{ $path }}' + name, type: type }];
                    }
                    return Array.from(document.querySelectorAll('input[type="checkbox"][data-type]:checked')).map(el => {
                        return { path: '{{ $path }}' + el.value, type: el.dataset.type };
                    });
                },

                openRenameModal(name, type) {
                    this.rename = { oldName: name, newName: name, type: type };
                    this.$dispatch('open-modal', 'rename-item');
                },

                renameItem() {
                    // Implement fetch to rename endpoint
                    alert('Rename functionality not yet implemented.');
                    this.$dispatch('close');
                },

                openMoveModal(name = null, type = null) {
                    this.move.items = this.getItems(name, type);
                    this.$dispatch('open-modal', 'move-items');
                },

                moveItems() {
                    // Implement fetch to move endpoint
                    alert('Move functionality not yet implemented.');
                    this.$dispatch('close');
                },

                openDeleteModal(name = null, type = null) {
                    this.delete.items = this.getItems(name, type);
                    this.$dispatch('open-modal', 'delete-items');
                },

                deleteItems() {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ route('panel.sites.files.delete', [$organisation, $site]) }}';
                    
                    const csrf = document.createElement('input');
                    csrf.type = 'hidden';
                    csrf.name = '_token';
                    csrf.value = '{{ csrf_token() }}';
                    form.appendChild(csrf);

                    const method = document.createElement('input');
                    method.type = 'hidden';
                    method.name = '_method';
                    method.value = 'DELETE';
                    form.appendChild(method);

                    this.delete.items.forEach((item, index) => {
                        const pathInput = document.createElement('input');
                        pathInput.type = 'hidden';
                        pathInput.name = `items[${index}][path]`;
                        pathInput.value = item.path;
                        form.appendChild(pathInput);

                        const typeInput = document.createElement('input');
                        typeInput.type = 'hidden';
                        typeInput.name = `items[${index}][type]`;
                        typeInput.value = item.type;
                        form.appendChild(typeInput);
                    });

                    document.body.appendChild(form);
                    form.submit();
                }
            }
        }
    </script>
@endsection
