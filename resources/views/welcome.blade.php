<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-lg mb-2">Welcome to our blog</div>    

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
    
                    @foreach ($posts as $post)
                    <div class="card shadow-lg border-slate-200 card-bordered  mb-4">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            
                            <div>{{ $post->description }}</div> 

                            <div class="text-sm text-right">Published on {{ Carbon\Carbon::parse($post->publication_date)->toDayDateTimeString() }}</div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
