@extends('layouts.welcomeLayout')

@section('content')
<div class="container mx-auto mt-4">
    <!-- Success Alert -->
    @if (session('Success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
</div>
@endsection
