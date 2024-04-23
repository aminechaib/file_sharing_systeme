<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SarlPro Transfer') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Form -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data" class="flex items-center space-x-4">
                @csrf
                <div class="flex-grow">
                    <label for="recipient_id" class="block font-medium text-sm text-gray-700">Envoyer a:</label>
                    <select name="recipient_id" id="recipient_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Selectioner un utilisateur</option>
                        @foreach (App\Models\User::where('id', '!=', Auth::id())->get() as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                    
                    </select>
                </div>
                <div class="flex-grow">
                    <label for="file-upload" class="block font-medium text-sm text-gray-700">File:</label>
                    <label class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm cursor-pointer hover:border-indigo-300 text-center py-2">
                        Envoyer Fichier
                        <input id="file-upload" type="file" name="file" required class="hidden" onchange="updateFileName()">
                    </label>
                </div>
                <div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">Envoyer</button>
                </div>
            </form>
        </div>
        <script>
        function updateFileName() {
            var input = document.getElementById('file-upload');
            var fileName = document.getElementById('file-name');
            if(input.files.length > 0) {
                fileName.textContent = input.files[0].name;
            } else {
                fileName.textContent = 'No file chosen';
            }
        }
        </script>
        
        <!-- Data Table -->
        <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fichier
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            From
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse(App\Models\File::where('recipient_id', Auth::id())->get() as $file)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $file->filename }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $file->sender ? $file->sender->name : 'Unknown User' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $file->updated_at->format('F j, Y, g:i a') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('files.download', $file->id) }}" class="text-indigo-600 hover:text-indigo-900">Telecharger</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                No files found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
