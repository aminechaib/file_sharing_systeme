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
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SarlPro Partage') }}
        </h2>
    </x-slot>

<!-- Files Sent Table -->
<div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    <h3 class="text-lg leading-6 font-medium text-gray-900">Files Sent</h3>
    <table class="min-w-full divide-y divide-gray-200 mt-4">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fichier
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    To
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Date
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($sentFiles as $file)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $file->filename }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $file->recipient->name ?? 'Unknown' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $file->updated_at->format('F j, Y, g:i a') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('files.download', $file->id) }}" class="text-indigo-600 hover:text-indigo-900">Download</a>
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
