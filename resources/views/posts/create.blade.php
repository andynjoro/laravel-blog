<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Blog Post
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <x-validation-errors :errors="$errors" />

                <x-session-status :status="session('status')" />

                <div class="flex justify-center">
                    <form action="{{ route('posts.store') }}" class="p-4 bg-slate-100 m-4 sm:w-1/2 w-full" method="post">
                        @csrf

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Title</span>
                            </label> 
                            <input type="text" name="title" placeholder="Title" class="input input-ghost bg-white" value="{{ old('title') }}">
                        </div>
                        <div class="form-control mt-4">
                            <label class="label">
                                <span class="label-text">Description</span>
                            </label> 
                            <textarea  name="description" class="textarea h-24 textarea-ghost bg-white" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                        <div class="mt-4">
                            <button class="btn" type="submit">CREATE</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
