<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Partage</title>

        <!-- Fonts -->
        <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS (include Popper.js for Tooltip and Dropdown support) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                            <button type="button" class="button-17" data-toggle="modal" data-target="#fileUploadModal">
            Envoyer un fichier
        </button>      
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- jQuery and DataTables JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

        <!-- Initialize DataTables -->
        <script>
            $(document).ready(function() {
                $('table').DataTable(); // Adjust selector as needed
            });
        </script>
        
        <style>
            .button-17 {
              align-items: center;
              appearance: none;
              background-color: #fff;
              border-radius: 24px;
              border-style: none;
              box-shadow: rgba(0, 0, 0, .2) 0 3px 5px -1px,rgba(0, 0, 0, .14) 0 6px 10px 0,rgba(0, 0, 0, .12) 0 1px 18px 0;
              box-sizing: border-box;
              color: #3c4043;
              cursor: pointer;
              display: inline-flex;
              fill: currentcolor;
              font-family: "Google Sans",Roboto,Arial,sans-serif;
              font-size: 14px;
              font-weight: 500;
              height: 48px;
              justify-content: center;
              letter-spacing: .25px;
              line-height: normal;
              max-width: 100%;
              overflow: visible;
              padding: 2px 24px;
              position: relative;
              text-align: center;
              text-transform: none;
              transition: box-shadow 280ms cubic-bezier(.4, 0, .2, 1),opacity 15ms linear 30ms,transform 270ms cubic-bezier(0, 0, .2, 1) 0ms;
              user-select: none;
              -webkit-user-select: none;
              touch-action: manipulation;
              width: auto;
              will-change: transform,opacity;
              z-index: 0;
            }
            
            .button-17:hover {
              background: #F6F9FE;
              color: #174ea6;
            }
            
            .button-17:active {
              box-shadow: 0 4px 4px 0 rgb(60 64 67 / 30%), 0 8px 12px 6px rgb(60 64 67 / 15%);
              outline: none;
            }
            
            .button-17:focus {
              outline: none;
              border: 2px solid #4285f4;
            }
            
            .button-17:not(:disabled) {
              box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
            }
            
            .button-17:not(:disabled):hover {
              box-shadow: rgba(60, 64, 67, .3) 0 2px 3px 0, rgba(60, 64, 67, .15) 0 6px 10px 4px;
            }
            
            .button-17:not(:disabled):focus {
              box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
            }
            
            .button-17:not(:disabled):active {
              box-shadow: rgba(60, 64, 67, .3) 0 4px 4px 0, rgba(60, 64, 67, .15) 0 8px 12px 6px;
            }
            
            .button-17:disabled {
              box-shadow: rgba(60, 64, 67, .3) 0 1px 3px 0, rgba(60, 64, 67, .15) 0 4px 8px 3px;
            }</style>  
            <!-- Modal -->
    <div class="modal fade" id="fileUploadModal" tabindex="-1" role="dialog" aria-labelledby="fileUploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document"> <!-- Added modal-sm for smaller modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileUploadModalLabel">Envoyer un fichier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div class="flex items-center space-x-4">
                                <div class="w-full">
                                    <label for="recipient_id" class="block font-medium text-sm text-gray-700">Envoyer A:</label>
                                    <select name="recipient_id" id="recipient_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Selectioner un Utilisateur</option>
                                        @foreach (App\Models\User::where('id', '!=', Auth::id())->get() as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="file-upload" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm cursor-pointer hover:border-indigo-300 text-center py-2">
                                        Uploader un fichier
                                        <input id="file-upload" type="file" name="file" required class="hidden" onchange="updateFileName()">
                                    </label>
                                </div>  
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Envoyer
                            </button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
