<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-xl">Blog Posts</div>

                    <div>
                        <a class="btn btn-primary" href="{{ route('posts.index') }}">
                            Manage Blog Posts
                        </a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
