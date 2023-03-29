<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-12 mx-auto">
            @if(auth()->check() && auth()->user()->role == 'Human_Resource')
            <div class="mb-12 flex items-center">
                <h2 class="text-2xl font-medium text-gray-900 title-font px-4">
                    vos annonces({{ $listings->count() }})
                </h2>
            </div>

            <div class="-my-6">
                @foreach($listings as $listing)
                    <a href="{{ route('listings.show', $listing->slug) }}" class="py-6 px-4 flex flex-wrap md:flex-nowrap border-b border-gray-100 {{ $listing->is_highlighted ? 'bg-yellow-100 hover:bg-yellow-200' : 'bg-white hover:bg-gray-100' }}" >
                        <div class="md:w-16 md:mb-0 mb-6 mr-4 flex-shrink-0 flex flex-col">
                            <img src="/storage/{{ $listing->logo }}" class="w-16 h-16 rounded-full object-cover">
                        </div>
                        <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                            <h2 class="text-xl font-bold text-gray-900 title-font mb-1">{{ $listing->title }}</h2>
                            <p class="leading-relaxed text-gray-900">{{ $listing->company }} &mdash; <span class="text-gray-600">{{ $listing->location }}</span></p>
                        </div>
                        <div class="md:flex-grow mr-8 mt-2 flex items-center justify-start">
                            @foreach($listing->tags as $tag)
                                <span class="inline-block mr-2 tracking-wide text-indigo-500 text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500">{{ strtoupper($tag->name) }}</span>
                            @endforeach
                        </div>
                        <div class="md:flex-grow flex flex-col items-end justify-between ml-auto">
                            <!-- afficher button -->
                            <a href="{{ url('/treatment/'.$listing->id) }}" class="text-indigo-500 hover:text-indigo-600">Afficher</a>
                            <!-- Edit button -->
                            <a href="{{ url('/edit/'.$listing->id) }}" class="text-indigo-500 hover:text-indigo-600">Modifier</a>
                            <!-- Delete button -->
                            <a href="{{ url('/delete/'.$listing->id) }}" class="text-red-500 hover:text-red-600">Supprimer</a>
                        </div>
                        {{-- <span class="md:flex-grow flex flex-col items-end justify-center">
                            <span>{{ $listing->created_at->diffForHumans() }}</span>
                            <span><strong class="text-bold">{{ $listing->clicks()->count() }}</strong> Apply Button Clicks</span>
                        </span> --}}
                    </a>
                @endforeach
            </div>
            
            @endif
        </div>

        
        @if(auth()->check() && auth()->user()->role == 'Student')
        @if(session('error'))
        <div class="alert alert-danger text-center text-red-600 text-lg">{{ session('error') }}</div>
        @endif
        <div class="mb-12 flex items-center">
            <h2 class="text-2xl font-medium text-gray-900 title-font px-4">
                votre postulation ({{ $listings->count() }})
            </h2>
        </div>
        <div class="-my-6">
            @foreach($listings as $listing)
                <a href="{{ route('listings.show', $listing->slug) }}"
                   class="py-6 px-4 flex flex-wrap md:flex-nowrap border-b border-gray-100 {{ $listing->is_highlighted ? 'bg-yellow-100 hover:bg-yellow-200' : 'bg-white hover:bg-gray-100' }}">
                    <div class="md:w-16 md:mb-0 mb-6 mr-4 flex-shrink-0 flex flex-col">
                        <img src="/storage/{{ $listing->logo }}" class="w-16 h-16 rounded-full object-cover">
                    </div>
                    <div class="md:w-1/2 mr-8 flex flex-col items-start justify-center">
                        <h2 class="text-xl font-bold text-gray-900 title-font mb-1">{{ $listing->title }}</h2>
                        <p class="leading-relaxed text-gray-900">{{ $listing->company }} &mdash; <span class="text-gray-600">{{ $listing->location }}</span></p>
                    </div>
                    <div class="md:flex-grow mr-8 mt-2 flex items-center justify-start">
                        @foreach($listing->tags as $tag)
                            <span class="inline-block mr-2 tracking-wide text-indigo-500 text-xs font-medium title-font py-0.5 px-1.5 border border-indigo-500">{{ strtoupper($tag->name) }}</span>
                        @endforeach
                    </div>
                    <span class="md:flex-grow flex flex-col items-end justify-center">
                        <span>{{ $listing->created_at->diffForHumans() }}</span>
                        <span>Application status: {{ $listing->status }}</span>
                    </span>
                </a>
            @endforeach
        </div>
    @endif
    



    </section>
</x-app-layout>
