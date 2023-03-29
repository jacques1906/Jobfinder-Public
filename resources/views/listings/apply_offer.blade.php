<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="w-full md:w-1/2 py-24 mx-auto">
            <div class="mb-4">
                <h2 class="text-2xl title-font sm:text-4xl  font-medium text-gray-900 title-font">
                    POSTULER
                </h2>
            </div>
            <form action="{{ url('/apply/'.$listing_post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="relative mb-4">
                <label for="company" class="leading-7 text-sm text-gray-600">Entreprise</label>
                <p class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $listing_post->company }}</p>
            </div>

            <div class="relative mb-4">
                <label for="company" class="leading-7 text-sm text-gray-600">Titre de l'offre</label>
                <p class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $listing_post->title }}</p>
            </div>

            <div class="relative mb-4">
                <label for="company" class="leading-7 text-sm text-gray-600">Votre nom</label>
                <p class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $name }}</p>
            </div>

            <div class="relative mb-4">
                <label for="company" class="leading-7 text-sm text-gray-600">Votre email</label>
                <p class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $email }}</p>
            </div>

            @if (Auth::check() && Auth::user()->cv)
            <embed src="{{ asset('storage/' . Auth::user()->cv) }}" type="application/pdf" width="100%" height="600px" />
        @else
            <p>Aucun CV enregistré pour cet utilisateur.</p>
        @endif                   
         <button type="submit" id="form_submit" class="block w-full items-center bg-indigo-500 text-white border-0 py-2 focus:outline-none hover:bg-indigo-600 rounded text-base mt-4 md:mt-0">postuler l'offre </button>
            </form>
</x-app-layout>