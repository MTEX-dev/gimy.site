@extends('layouts.panel')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Edit File') }}: {{ $file }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('panel.sites.files.update', [$organisation, $site, 'file' => $file]) }}"
                        method="POST" id="file-editor-form">
                        @csrf
                        @method('PUT')
                        <div class="mb-4 flex justify-end">
                            <x-secondary-button id="fullscreen-button" type="button">
                                {{ __('Fullscreen') }}
                            </x-secondary-button>
                        </div>
                        <textarea name="content" id="editor">{{ $content }}</textarea>
                        <div class="mt-4">
                            <x-primary-button type="submit">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/theme/dracula.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/htmlmixed/htmlmixed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/css/css.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/clike/clike.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/php/php.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
                lineNumbers: true,
                mode: "htmlmixed",
                theme: "dracula"
            });

            const fullscreenButton = document.getElementById('fullscreen-button');
            const fileEditorForm = document.getElementById('file-editor-form');
            let isFullscreen = false;

            function toggleFullscreen() {
                const editorWrapper = editor.getWrapperElement();
                if (!isFullscreen) {
                    editorWrapper.style.position = 'fixed';
                    editorWrapper.style.top = '0';
                    editorWrapper.style.left = '0';
                    editorWrapper.style.width = '100vw';
                    editorWrapper.style.height = '100vh';
                    editorWrapper.style.zIndex = '9999';
                    editorWrapper.style.backgroundColor = '#282a36';

                    const fullscreenControls = document.createElement('div');
                    fullscreenControls.id = 'fullscreen-controls';
                    fullscreenControls.style.position = 'fixed';
                    fullscreenControls.style.top = '10px';
                    fullscreenControls.style.right = '10px';
                    fullscreenControls.style.zIndex = '10000';

                    const exitButton = document.createElement('button');
                    exitButton.textContent = 'Exit Fullscreen';
                    exitButton.className = 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150';
                    exitButton.addEventListener('click', toggleFullscreen);

                    const saveButton = document.createElement('button');
                    saveButton.textContent = 'Save';
                    saveButton.className = 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-3';
                    saveButton.type = 'submit';
                    saveButton.addEventListener('click', () => {
                        fileEditorForm.submit();
                    });

                    fullscreenControls.appendChild(exitButton);
                    fullscreenControls.appendChild(saveButton);
                    document.body.appendChild(fullscreenControls);

                    document.body.style.overflow = 'hidden';
                    fullscreenButton.style.display = 'none';
                } else {
                    editorWrapper.style.position = '';
                    editorWrapper.style.top = '';
                    editorWrapper.style.left = '';
                    editorWrapper.style.width = '';
                    editorWrapper.style.height = '';
                    editorWrapper.style.zIndex = '';
                    editorWrapper.style.backgroundColor = '';

                    const fullscreenControls = document.getElementById('fullscreen-controls');
                    if (fullscreenControls) {
                        fullscreenControls.remove();
                    }

                    document.body.style.overflow = '';
                    fullscreenButton.style.display = 'inline-flex';
                }
                isFullscreen = !isFullscreen;
                editor.refresh();
            }

            fullscreenButton.addEventListener('click', function(e) {
                e.preventDefault();
                toggleFullscreen();
            });
        });
    </script>
@endpush