@extends('layouts.homeLayout')

@section('content')
<div class="container mx-auto max-w-lg p-6 bg-white rounded-lg shadow-md mt-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Update {{ $title }}</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
    <!-- Update Form -->
    <form action="{{ route(Auth::user()->role . '.ingredientType.update', $ingredientType->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $ingredientType->name) }}"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remarks Field -->
        <div class="mb-4">
            <label for="remarks" class="block text-gray-700 font-medium mb-2">Remarks:</label>
            <textarea id="remarks" name="remarks"
                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('remarks', $ingredientType->remarks) }}</textarea>
            @error('remarks')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Form Actions -->
        <div class="flex justify-end space-x-2">
            <a href="{{ route(Auth::user()->role . '.ingredientType.index') }}"
                class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg transition duration-200 mr-2">
                Cancel
            </a>
            <button type="submit"
                class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-lg transition duration-200">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
