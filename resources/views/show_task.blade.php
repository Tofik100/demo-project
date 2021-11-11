<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                @if (session('message'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('message') }}
                </div>
                @endif
                {{-- <x-jet-welcome /> --}}

                {{-- Fetch Customer Record --}}

                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100 ">
                            <th class="border px-4 py-2 w-20">No.</th>
                            <th class="border px-4 py-2">Task Name</th>
                            <th class="border px-4 py-2">Update</th>
                            <th class="border px-4 py-2">Delete</th>
                            {{-- <th class="border px-4 py-2">status</th> --}}
                        </tr>
                    </thead>
                    <tbody>

                         @foreach($task as $userTask)
                        <tr class="text-center ">
                            <td class="border px-4 py-2">{{$userTask->id}}</td>
                            <td class="border px-4 py-2">{{ $userTask->name }}</td>
                            <td class="border px-4 py-2">Edit</td>
                            <td class="border px-4 py-2">Delete</td>
                            {{-- <td class="border px-4 py-2">{{ $taskDetail->email }}</td> --}}
                        </tr>
                        @endforeach 
                    </tbody>
                </table>

                 {{-- Fetch Customer Record End --}}
                 
            </div>
        </div>
    </div>
</x-app-layout>
