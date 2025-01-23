@extends('layouts.homeLayout')

@section('content')
<div class="container mx-auto mt-4">
    <!-- Email Verification Prompt -->
    @if (!Auth::user()->is_verified)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 flex items-center justify-center" role="alert">
            <div class="flex flex-col text-center">
                <strong class="font-bold mb-2">Please verify your email address!</strong>
                <p class="text-sm mb-2">To enjoy all features, kindly verify your email address.</p>
                <a href="{{ route('superadmin.verification.send') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Click here to verify</a>
            </div>
        </div>
    @else
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Email address verified!</strong>
        </div>
    @endif
</div>
@endsection
