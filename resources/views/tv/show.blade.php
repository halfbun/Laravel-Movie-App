@extends('layouts.main')

@section('content')
    <div class="tv-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $tvshow['poster_path'] }}" alt="" class="w-64 md:w-96">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{ $tvshow['name'] }}</h2>
                <div class="flex items-center text-gray-400  text-sm flex-wrap">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-4 text-orange-500" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>
                    <span class="ml-1">{{ $tvshow['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $tvshow['first_air_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>
                    {{  $tvshow['genres'] }}</span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $tvshow['overview'] }}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">
                            @foreach ($tvshow['created_by'] as $crew)                               
                                    <div class="mr-8">
                                        <div>{{ $crew['name'] }}</div>
                                        <div class="text-sm text-gray-400">Creator</div>
                                    </div>                            
                            @endforeach
                    </div>
                </div>

                    <div x-data="{isOpen: false}">    
                        @if (count($tvshow['videos']['results']) > 0)
                        <div class="mt-12">
                            <button
                            @click ="isOpen = true"
                            class="inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 fill-current" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"/></svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>
                        @endif

                        <div 
                        style="background-color:rgba(0,0,0, .5);"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        x-show.transition.opacity ="isOpen">

                            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                <div class="bg-gray-900 rounded">
                                    <div class="flex justify-end pr-4 pt-2">
                                        <button @click= "isOpen = false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
                                    </div>
                                    <div class="modal-body px-8 py-8">
                                        <div class="responsive-container overflow-hidden relative" style="padding-top:56.25%">
                                            <iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full min-h-full" src="https://youtube.com/embed/{{ $tvshow['videos']['results'][0]['key'] }}" allow="autoplay;encrypted-media;" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
    </div>
    <div class="tv-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-16">
                @foreach ($tvshow['cast'] as $cast)                    
                        <div class="mt-8">
                            <a href="/actors/{{ $cast['id'] }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w185/'.$cast['profile_path'] }}" alt="profile" class="hover:opacity-75 transition ease-in duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="/actors/{{ $cast['id'] }}" class="text-lg mt-2 hover:text-gray:300">{{ $cast['name'] }}</a>
                                <div class="flex items-center text-gray-400  text-sm mt-1">
                                    <span>{{ $cast['character'] }}</span>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="tv-images border-b border-gray-800" x-data="{ isOpen: false, images: ''}">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-x-8">
                @foreach ($tvshow['images'] as $image)   
                        <div class="mt-8">
                            <a href="#" @click.prevent=
                            "isOpen = true
                            image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'"
                            >
                                <img src="{{ 'https://image.tmdb.org/t/p/w780/'.$image['file_path'] }}" alt="backdrop" class="hover:opacity-75 transition ease-in duration-150">
                            </a>
                        </div>
                @endforeach
            </div>



                <div 
                style="background-color:rgba(0,0,0, .5);"
                class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show ="isOpen"
                >

                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pt-2">
                                <button
                                @click="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="text-3xl leading-none hover:text-gray-300">&times;</button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <img :src="image" alt="poster">
                            </div>
                        </div>
                    </div>
                </div>


        </div>
    </div>
@endsection