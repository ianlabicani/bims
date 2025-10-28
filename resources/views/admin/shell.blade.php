@extends('shell')

@section('content')
    @include('admin._ui.navbar')

    <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8 py-4">
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4 flex items-center" role="alert">
                <i class="fas fa-check-circle mr-3 text-green-600"></i>
                <span class="block sm:inline">{{ session('success') }}</span>
                <button type="button" class="ml-auto text-green-700 hover:text-green-900" onclick="this.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 flex items-center" role="alert">
                <i class="fas fa-exclamation-circle mr-3 text-red-600"></i>
                <span class="block sm:inline">{{ session('error') }}</span>
                <button type="button" class="ml-auto text-red-700 hover:text-red-900" onclick="this.parentElement.remove()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4" role="alert">
                <div class="flex items-center mb-2">
                    <i class="fas fa-exclamation-triangle mr-2 text-red-600"></i>
                    <strong>Validation Errors:</strong>
                    <button type="button" class="ml-auto text-red-700 hover:text-red-900" onclick="this.parentElement.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <ul class="list-disc pl-8 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    @yield('admin-content')
@endsection
