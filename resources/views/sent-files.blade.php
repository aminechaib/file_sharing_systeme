<!-- SweetAlert2 script to display success message -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Trigger SweetAlert if there's a success message in the session
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        @endif
    });
    </script>
    
    
<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SarlPro Partage') }}
        </h2> --}}
        <!-- Trigger/Button -->
        <button type="button" class="button-17" data-toggle="modal" data-target="#fileUploadModal">
            Envoyer un fichier
        </button>
    </x-slot>


    

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Data Table -->
        <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fichier
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            A
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                    </tr>
                </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($sentFiles as $file)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('files.download', $file->id) }}" class="text-indigo-600 hover:text-indigo-900">{{ $file->filename }}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $file->recipient->name ?? 'Unknown' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $file->updated_at->format('F j, Y, g:i a') }}
                    </td>                 
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                        No files sent.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>
