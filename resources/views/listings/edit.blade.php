<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="w-full md:w-1/2 py-24 mx-auto">
            <div class="mb-4">
                <h2 class="text-2xl font-medium text-gray-900 title-font">
                    modifier
                </h2>
            </div>
            <form action="{{ url('update-data/'.$listingPost->id) }}" method="POST">
                {{ csrf_field() }}
                @method('PUT')
            <div class="relative mb-4">
                <label for="title" class="leading-7 text-sm text-gray-600">Titre</label>
                <input type="text" id="title" name="title" value="{{ $listingPost->title }}" class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>

            <div class="relative mb-4">
                 <label for="company" class="leading-7 text-sm text-gray-600">Entreprise</label>
                 <input type="text" id="company" name="company" value="{{ $listingPost->company }}" class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="logo" class="leading-7 text-sm text-gray-600">Logo</label>
                <input type="file" id="logo" name="logo" class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>

            <div class="relative mb-4">
                <label for="location" class="leading-7 text-sm text-gray-600">localisation</label>
                <input type="text" id="location" name="location" value="{{ $listingPost->location }}" class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
           </div>
           
           <div class="relative mb-4">
            <label for="apply_link" class="leading-7 text-sm text-gray-600">Lien</label>
            <input type="text" id="apply_link" name="apply_link" value="{{ $listingPost->apply_link }}" class="w-full bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
       </div>

   <div class="relative mb-4">
    <label for="content" class="leading-7 text-sm text-gray-600">content</label>
    <textarea
    id="content"
    rows="8"
    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
    name="content">{{ $listingPost->content }}
    </textarea>
</div>
<button type="submit" id="form_submit" class="block w-full items-center bg-indigo-500 text-white border-0 py-2 focus:outline-none hover:bg-indigo-600 rounded text-base mt-4 md:mt-0">modifier</button>
</form>
</x-app-layout> 
