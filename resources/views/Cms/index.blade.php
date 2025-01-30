@extends('layouts.homeLayout')

@section('content')
<div class="container mx-auto" x-data="{ openModal: false }">
    <!-- Header and Add Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">List of {{ $title }}</h2>

        <!-- Button to Open Modal -->
        <button @click="openModal = true"
            class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-bold py-2 px-6 rounded shadow-lg transition-transform transform hover:scale-105">
            + Add {{ $title }}
        </button>
    </div>

    <!-- DataTable -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden px-4 py-2">
        <table class="min-w-full table-auto border-collapse" id="{{ $resource }}-table">
            <thead class="bg-gradient-to-r from-gray-200 to-gray-300 text-gray-700 text-left text-sm uppercase">
                <tr>
                    <th class="px-4 py-3 border-b">Name</th>
                    <th class="px-4 py-3 border-b">Remarks</th>
                    <th class="px-4 py-3 border-b">Created By</th>
                    <th class="px-4 py-3 border-b">Updated By</th>
                    <th class="px-4 py-3 border-b text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @foreach($data as $item)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-2 border-b">{{ $item->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $item->remarks }}</td>
                    <td class="px-4 py-2 border-b">{{ $item->addedBy->full_name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border-b">{{ $item->updatedBy->full_name ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border-b text-center">
                        <div class="relative inline-block text-left">
                            <!-- Button to Toggle Dropdown -->
                            <button class="dropdown-toggle bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded shadow-sm flex items-center"
                                data-dropdown="dropdown-{{ $item->id }}">
                                Actions
                                <svg class="w-4 h-4 ml-2 transition-transform duration-200"
                                    fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div id="dropdown-{{ $item->id }}"
                                class="dropdown-menu hidden absolute right-0 mt-2 w-40 bg-white border rounded-md shadow-lg z-50">
                                <!-- Edit -->
                                <a href="{{ route(Auth::user()->role . '.' . $resource . '.edit', $item->id) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Edit
                                </a>
                                <!-- Destroy -->
                                <form action="{{ route(Auth::user()->role  . '.' . $resource . '.destroy', $item->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this ingredient type?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-red-100">
                                        Destroy
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div x-show="openModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md transform transition-all"
            @click.away="openModal = false">
            <h3 class="text-xl font-semibold mb-4">Add {{ $title }}</h3>
            <form action="{{ route(Auth::user()->role . '.ingredientType.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Name:</label>
                    <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-lg">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Remarks:</label>
                    <textarea id="remarks" name="remarks"
                        class="w-full p-3 border border-gray-300 rounded-lg"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" @click="openModal = false"
                        class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg mr-2">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded-lg">Save</button>
                </div>
            </form>
        </div>
    </div>

</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#{{ $resource }}-table').DataTable({
            "processing": true,
            "serverSide": false,
            "pageLength": 10,
            "order": [[0, "desc"]],
        });
    });
</script>
@endpush

@endsection
