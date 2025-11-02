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
                     class="absolute inset-0 bg-gray-800 bg-opacity-75 flex flex-col items-center justify-center z-50 rounded-lg">
                    <svg class="w-24 h-24 text-gimysite-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                        </path>
                    </svg>
                    <div class="text-white text-2xl font-semibold">{{ __('Drop files to upload') }}</div>
                    <p class="text-gray-300 mt-2">{{ __('Release your files to start uploading') }}</p>
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Breadcrumbs and Path -->
                    <nav class="flex mb-4" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="{{ route('panel.sites.files', [$organisation, $site, 'path' => '/']) }}"
                                   class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gimysite-600 dark:text-gray-400 dark:hover:text-gimysite-400">
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
                                           class="ml-1 text-sm font-medium text-gray-700 hover:text-gimysite-600 md:ml-2 dark:text-gray-400 dark:hover:text-gimysite-400">{{ $breadcrumb }}</a>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </nav>

                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center mb-4">
                        <div x-cloak x-show="selectedItems.length > 0">
                            <x-danger-button @click="openDeleteModal()">
                                {{ __('Delete Selected') }}
                            </x-danger-button>
                            <x-secondary-button @click="openMoveModal()">
                                {{ __('Move Selected') }}
                            </x-secondary-button>
                        </div>
                        <div :class="{'ml-auto': selectedItems.length === 0}">
                            <x-primary-button @click="$dispatch('open-modal', 'upload-file')">{{ __('Upload File') }}</x-primary-button>
                            <x-secondary-button @click="$dispatch('open-modal', 'create-folder')">{{ __('Create Folder') }}</x-secondary-button>
                        </div>
                    </div>

                    <!-- Files and Folders Table -->
                    <div class="bg-gray-100 dark:bg-gray-900 rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="p-4 w-8">
                                        <input type="checkbox" @change="toggleSelectAll($event)"
                                               class="rounded border-gray-300 text-gimysite-600 shadow-sm focus:ring-gimysite-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-gimysite-600 dark:focus:ring-offset-gray-800">
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Name') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Type') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($directories as $directory)
                                    <tr>
                                        <td class="p-4 whitespace-nowrap">
                                            <input type="checkbox" value="{{ basename($directory) }}" x-model="selectedItems" data-type="dir"
                                                   class="rounded border-gray-300 text-gimysite-600 shadow-sm focus:ring-gimysite-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-gimysite-600 dark:focus:ring-offset-gray-800">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('panel.sites.files', [$organisation, $site, 'path' => $path . basename($directory) . '/']) }}" class="text-gimysite-500 hover:text-gimysite-700 dark:hover:text-gimysite-400 flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-gimysite-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path>
                                                </svg>
                                                {{ basename($directory) }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ __('strings.folder') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <x-dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4z"></path></svg>
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
                                    <tr>
                                        <td class="p-4 whitespace-nowrap">
                                            <input type="checkbox" value="{{ basename($file) }}" x-model="selectedItems" data-type="file"
                                                   class="rounded border-gray-300 text-gimysite-600 shadow-sm focus:ring-gimysite-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-gimysite-600 dark:focus:ring-offset-gray-800">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('panel.sites.files.edit', [$organisation, $site, 'file' => $path . basename($file)]) }}" class="text-gimysite-500 hover:text-gimysite-700 dark:hover:text-gimysite-400 flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.414L16.586 7A2 2 0 0117 8.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm0 3a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm0 3a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                {{ basename($file) }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ __('strings.file') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <x-dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4z"></path></svg>
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
        </div>

        <!-- Modals -->
        <x-modal name="upload-file" :show="$errors->uploadFile->isNotEmpty()" focusable>
            <form @submit.prevent="uploadFiles($event.target.file.files)" class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Upload File') }}</h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('Select one or more files to upload to the current directory.') }}</p>
                <div class="mt-6">
                    <x-input-label for="file" value="{{ __('File') }}" class="sr-only" />
                    <input type="file" name="file" id="file" class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-gimysite-50 file:text-gimysite-700
                        hover:file:bg-gimysite-100" multiple />
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
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('Enter a name for your new folder.') }}</p>
                <div class="mt-6">
                    <x-input-label for="folder_name" value="{{ __('Folder Name') }}" class="sr-only" />
                    <x-text-input id="folder_name" name="folder_name" type="text" class="mt-1 block w-full" placeholder="{{ __('New Folder Name') }}" required />
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
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('Enter the new name for the selected item.') }}</p>
                <div class="mt-6">
                    <x-input-label for="new_name" value="{{ __('New Name') }}" class="sr-only" />
                    <x-text-input id="new_name" name="new_name" type="text" class="mt-1 block w-full" x-model="rename.newName" required />
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
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('Enter the destination path to move the selected items.') }}</p>
                <div class="mt-6">
                    <x-input-label for="destination" value="{{ __('Destination Folder') }}" class="sr-only" />
                    <x-text-input id="destination" name="destination" type="text" class="mt-1 block w-full" x-model="move.destination" placeholder="/path/to/destination" required />
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
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ __('This will permanently delete the selected items. This action cannot be undone.') }}</p>
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
                        this.selectedItems = Array.from(document.querySelectorAll('input[type="checkbox"][data-type]'))
                            .map(el => el.value);
                    } else {
                        this.selectedItems = [];
                    }
                },

                getItems(name = null, type = null) {
                    if (name && type) {
                        return [{ path: '{{ $path }}' + name, type: type }];
                    }
                    return Array.from(document.querySelectorAll('input[type="checkbox"][data-type]:checked'))
                        .map(el => {
                            return { path: '{{ $path }}' + el.value, type: el.dataset.type };
                        });
                },

                openRenameModal(name, type) {
                    this.rename = { oldName: name, newName: name, type: type };
                    this.$dispatch('open-modal', 'rename-item');
                },

                renameItem() {
                    fetch('{{ route('panel.sites.files.rename', [$organisation, $site]) }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            old_path: '{{ $path }}' + this.rename.oldName,
                            new_name: this.rename.newName,
                            type: this.rename.type
                        })
                    }).then(response => {
                        if (response.ok) {
                            window.location.reload();
                        } else {
                            alert('Rename failed.');
                        }
                    });
                },

                openMoveModal(name = null, type = null) {
                    this.move.items = this.getItems(name, type);
                    this.$dispatch('open-modal', 'move-items');
                },

                moveItems() {
                    fetch('{{ route('panel.sites.files.move', [$organisation, $site]) }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            items: this.move.items,
                            destination: this.move.destination
                        })
                    }).then(response => {
                        if (response.ok) {
                            window.location.reload();
                        } else {
                            alert('Move failed.');
                        }
                    });
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