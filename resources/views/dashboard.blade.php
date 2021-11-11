<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Dashboard') }}
        </h2>
    </x-slot>

        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>
    
            <x-jet-validation-errors class="mb-4" />
    
            @if (session('Message'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('Message') }}
                </div>
            @endif
    
            <form method="POST" action="{{ route('mytask') }}">
                @csrf  

                @method('POST')
    
                <div>
                    <x-jet-label for="auth" value="{{ __('Task Name') }}" />
                    <x-jet-input id="auth" class="block mt-1 w-full" type="text" name="task" required autofocus />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Add Task') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    
</x-app-layout>
