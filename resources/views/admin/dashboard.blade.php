<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
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
                            <th class="border px-4 py-2">Customer Name</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Task Status</th>
                            <th class="border px-4 py-2">Approve/Disapprove</th>
                            <th class="border px-4 py-2">Task Action</th>
                            <th class="border px-4 py-2">Active/Inactive Status</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $usersDetail)
                        <tr class="text-center ">
                            <td class="border px-4 py-2">{{$usersDetail->id}}</td>
                            <td class="border px-4 py-2">{{ $usersDetail->first_name }}</td>
                            <td class="border px-4 py-2">{{ $usersDetail->email }}</td>
                            <td class="border px-4 py-2">{{ $usersDetail->task_status }}</td>

                            <td class="border px-4 py-2">@if($usersDetail->task_status == 0)Disapprove @else Approve @endif</td>
                            <td class="border px-4 py-2"><button class="bg-indigo-500 px-2 py-2 rounded"><a href="{{ route('task',['id'=> $usersDetail->id]) }}">
                                @if($usersDetail->task_status == 1)Disapprove @else Approve @endif</a></button></td>
                            
                                <td class="border px-4 py-2">{{ $usersDetail->status }}</td>
                            <td class="border px-4 py-2">@if($usersDetail->status == 0)Inactive @else Active @endif</td>
                            <td class="border px-4 py-2"><button class="bg-indigo-500 px-2 py-2 rounded"><a href="{{ route('status',['id'=> $usersDetail->id]) }}">
                                @if($usersDetail->status == 1)Inactive @else Active @endif</a></button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                 {{-- Fetch Customer Record End --}}
                 
            </div>
        </div>
    </div>
</x-app-layout>
