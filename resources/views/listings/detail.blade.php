
<x-app-layout>
    <div>
<div class="bg-gray-50 py-16 px-4 sm:grid sm:grid-cols-12">
    <div class="sm:col-start-4 sm:col-span-6">

        <div class="bg-white mt-4 px-4 py-6 rounded-sm shadow-sm">
            <div class="flex items-center">


                <div class="ml-3">
                    <p class="text-sm leading-5 font-medium text-gray-900"></p>
                </div>
            </div>

            <div class="mt-4 rounded-sm overflow-hidden">
            </div>

            <h2 class="mt-6 text-4xl leading-10 tracking-tight font-bold text-gray-900 text-center">{{ $company->title }}</h2>
            <p class="mt-6 leading-6 text-gray-500">la déscription de ezojzaekopaze kozekopaz </p>
        </div>
        <h2 class="mt-6 text-4xl leading-10 tracking-tight font-bold text-gray-900 text-center">Commentaire</h2>

        <div>
            {{--  --}}
            <form action="/detail/{{ $company->id }}/comments" method="POST" class="mb-0">
                @csrf
                <label for="author" class="text-sm font-medium text-gray-700">{{ $user->name }}</label>        
                <textarea name="text" class="mt-1 py-2 px-3 block w-full borded border-gray-400 rounded-md shadow-sm" required>{{ old('text') }}</textarea>
    
                @if ($errors->any())
                    <div class="mt-6">
                        <ul class="bg-red-100 px-4 py-5 roundend-md">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        
                <button type="submit" class="mt-6 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">Envoyer</button>
            </form>
        </div>


        <div class="mt-6">
            @foreach ($comment as $comment)
                <div class="mb-5 bg-white px-4 py-6 rounded-sm shadow-md">
                    <div class="flex">
                        {{-- Avatar --}}
                        <div class="mr-3 flex flex-col justify-center">
                            <div>
                
                            </div>
                        </div>
                        {{-- Avatar --}}
        
                        <div class="flex flex-col justify-center">
                            <p class="mr-2 font-bold">{{ $comment->name }}</p>
                        </div>
                    </div>
        
                    <div class="mt-3">
                        <p>{{ $comment->text }}</p>
                    </div>
                </div>
            @endforeach
    
        </div>

</div>
</div>
</x-app-layout>