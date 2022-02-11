<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Blog Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6">
                    <div class="text-xl">Blog Posts</div>

                    <div>
                        <a class="btn btn-primary" href="{{ route('posts.create') }}">
                            Create Blog Post
                        </a> 
                    </div>
                </div>

                @if ($posts)
                <div class="overflow-x-auto m-4">
                    <table class="table w-full table-zebra">
                        <thead>
                            <tr>
                                <th>Title</th> 
                                <th>Description</th> 
                                <th>
                                   <div class="flex justify-start items-center space-x-4">
                                        <div>Publication Date</div>
                                        <div>
                                            @if ($sort == 'desc')
                                            <a href="{{ route('posts.index') }}?sort=asc">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 3.202l3.839 4.798h-7.678l3.839-4.798zm0-3.202l-8 10h16l-8-10zm8 14h-16l8 10 8-10z"/></svg>
                                            </a>
                                            @else
                                            <a href="{{ route('posts.index') }}?sort=desc">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0l-8 10h16l-8-10zm3.839 16l-3.839 4.798-3.839-4.798h7.678zm4.161-2h-16l8 10 8-10z"/></svg>
                                            </a>
                                            @endif
                                        </div>
                                   </div>
                                </th>
                            </tr>
                        </thead> 
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td> 
                                <td>{{ $post->description }}</td> 
                                <td>{{ $post->publication_date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    No posts
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
