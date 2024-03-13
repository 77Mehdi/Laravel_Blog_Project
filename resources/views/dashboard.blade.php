


<x-app-layout >
    <x-slot name="header">
        <h1 class="font-semibold text-3xl text-gray-200 leading-tight">
            {{ __('Welcome') }}
        </h1>
    </x-slot>

    
    @if (session()->has('msge'))
       <div class="  flex justify-end max-w-100">
        <div class="bg-teal-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg></div>
                <div>
                   {{session()->get('msge')}}
                </div>
            </div>
        </div>
       </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($type === 'blogs')
                        <x-blogs :posts="$posts" />
                    @elseif ($type === 'home')
                        <x-home />
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-footer />
