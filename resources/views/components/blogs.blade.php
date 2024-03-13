@props(['posts'])

<div class="container m-auto text-center pt-5 pb-5 ">
    <h1 class="text-5xl font-bold">All Posts</h1>
</div>

@if (Auth::check())
    <div class="">
        <a href="/home/create" class=" bg-green-700 py-3 text-gray-100 px-4 rounded-lg font-bold uppercase float-end">
            Creat post
        </a>
    </div>
@endif



<div class=" container sm:grid grid-cols-2 gap-10 mx-auto px-5 border-b border-gray-700 py-11">

    @foreach ($posts as $post)
        @if (Auth::check())
            <div>
                <img src="/uplod/{{ $post->image_path }}" alt="" class=" max-h-[70vh]">
            </div>
            <div>
                <h2 class=" text-gray-700 font-bold text-4xl py-5 md:pt-0 ">{{ $post->title }}</h2>
                <span>
                    @if (Auth::user()->id == $post->user_id)
                        By : <span class="text-green-500 italic">{{ $post->user->name }}</span><br />
                    @else
                        By : <span class="text-gray-500 italic">{{ $post->user->name }}</span><br />
                    @endif

                    on : <span class="text-gray-500 italic">{{ $post->created_at->diffForHumans() }}</span>
                    <p class="text-l text-gray-700 py-8 leading-6">
                        {{ $post->sedcription }}
                    </p>
                    <a href="home/{{ $post->slug }}"
                        class=" bg-gray-700 py-3 text-gray-100 px-4 rounded-lg font-bold uppercase mr-[200px]">
                        Read More
                    </a>
                </span>

            </div>
        @else
            @if ($loop->index < 4)
                <div>
                    <img src="/uplod/{{ $post->image_path }}" alt="" class=" max-h-[70vh]">
                </div>
                <div>
                    <h2 class=" text-gray-700 font-bold text-4xl py-5 md:pt-0 ">{{ $post->title }}</h2>
                    <span>
                        By : <span class="text-gray-500 italic">{{ $post->user->name }}</span><br />
                        on : <span class="text-gray-500 italic">{{ $post->created_at->diffForHumans() }}</span>
                        <p class="text-l text-gray-700 py-8 leading-6">
                            {{ $post->sedcription }}
                        </p>
                        <a href=""
                            class=" bg-gray-700 py-3 text-gray-100 px-4 rounded-lg font-bold uppercase mr-[200px]">
                            Read More
                        </a>
                    </span>

                </div>
            @endif
        @endif
    @endforeach

</div>
