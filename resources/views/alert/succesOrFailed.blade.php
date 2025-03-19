@if (session('Success'))
<div class="bg-green-100 border border-green-400 text-white-700 px-4 py-3 rounded relative mb-4 text-center"
    role="alert">
    <span class="block sm:inline">{{ session('Success') }}</span>
</div>
@endif
@if (session('Failed'))
<div class="bg-red-100 border border-red-400 text-white-700 px-4 py-3 rounded relative mb-4 text-center" role="alert">
    <span class="block sm:inline">{{ session('Failed') }}</span>
</div>
@endif