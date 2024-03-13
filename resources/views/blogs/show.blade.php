<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-200 leading-tight">
            {{ __('') }}
        </h1>
    </x-slot>

    @if (session()->has('msg'))
       <div class=" justify-end flex max-w-100">
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg></div>
                <div>
                   {{session()->get('msg')}}
                </div>
            </div>
        </div>
       </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <h2 class=" flex justify-center text-gray-700 font-bold text-4xl py-5 mb-[40px] ">
                        {{ $post->title }}
                    </h2>
                    <div class=" justify-center flex">
                        <img src="/uplod/{{ $post->image_path }}" alt="" class="  max-h-[70vh] w-full">
                    </div>
                    <div>

                        <span class="  ">
                            <p class="text-l text-center text-gray-700 py-8 leading-6  justify-self-center  ">
                                {{ $post->sedcription }}
                            </p>
                            <div class=" flex float-end">
                                <div>
                                    By : <span class="text-gray-500 italic">{{ $post->user->name }}</span><br />
                                    on : <span
                                        class="text-gray-500 italic">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>

                        </span>
                    
                  
                        @if (Auth::user()->id == $post->user_id || $is_admin )
                            <div class=" flex mx-12">
                                <a href="/home/{{ $post->slug }}/edit"
                                    class=" bg-green-700 py-3 text-gray-100 px-4 rounded-lg font-bold uppercase hover:bg-green-500 ">
                                    updat your post
                                </a>

                                <form action="{{ route('home.destroy', [$post->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class=" bg-red-700 py-3 text-gray-100 px-4 rounded-lg font-bold uppercase hover:bg-red-500 mx-8 ">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-footer />
