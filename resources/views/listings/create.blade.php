<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="w-full md:w-1/2 py-24 mx-auto">
            <div class="mb-4">
                <h2 class="text-2xl font-medium text-gray-900 title-font">
                   Crée une nouvelle offre(99€)
                </h2>
            </div>
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-200 text-red-800">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form
                action="{{ route('listings.store') }}"
                id="payment_form"
                method="post"
                enctype="multipart/form-data"
                class="bg-gray-100 p-4"
            >


                @guest
                    <div class="flex mb-4">
                        <div class="flex-1 mx-2">
                            <x-label for="email" value="Email" />
                            <x-input
                                class="block mt-1 w-full"
                                id="email"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus />
                        </div>
                        <div class="flex-1 mx-2">
                            <x-label for="name" value="Nom et Prenom" />
                            <x-input
                                class="block mt-1 w-full"
                                id="name"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required />
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="flex-1 mx-2">
                            <x-label for="password" value="Mot de passe" />
                            <x-input
                                class="block mt-1 w-full"
                                id="password"
                                type="password"
                                name="password"
                                required />
                        </div>
                        <div class="flex-1 mx-2">
                            <x-label for="password_confirmation" value="Confirme le Mot de passe" />
                            <x-input
                                class="block mt-1 w-full"
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required />
                        </div>
                    </div>
                @endguest
                <div class="mb-4 mx-2">
                    <x-label for="title" value="Titre d'emploi" />
                    <x-input
                        id="title"
                        class="block mt-1 w-full"
                        type="text"
                        name="title"
                        required />
                </div>
                <div class="mb-4 mx-2">
                    <x-label for="company" value="Nom de l'entreprise" />
                    <x-input
                        id="company"
                        class="block mt-1 w-full"
                        type="text"
                        name="company"
                        required />
                </div>
                <div class="mb-4 mx-2">
                    <x-label for="logo" value="Entreprise Logo" />
                    <x-input
                        id="logo"
                        class="block mt-1 w-full"
                        type="file"
                        name="logo" />
                </div>
                <div class="mb-4 mx-2">
                    <x-label for="location" value="localisation" />
                    <x-input
                        id="location"
                        class="block mt-1 w-full"
                        type="text"
                        name="location"
                        required />
                </div>
                <div class="mb-4 mx-2">
                    <x-label for="apply_link" value="Lien du site" />
                    <x-input
                        id="apply_link"
                        class="block mt-1 w-full"
                        type="text"
                        name="apply_link"
                        required />
                </div>
                <div class="mb-4 mx-2">
                    <x-label for="tags" value="Tags (séparer par des comma)" />
                    <x-input
                        id="tags"
                        class="block mt-1 w-full"
                        type="text"
                        name="tags" />
                </div>
                <div class="mb-4 mx-2">
                    <x-label for="content" value="Contenu de la liste (Markdown est correct)" />
                    <textarea
                        id="content"
                        rows="8"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                        name="content"
                    ></textarea>
                </div>
                <div class="mb-4 mx-2">
                    <label for="is_highlighted" class="inline-flex items-center font-medium text-sm text-gray-700">
                        <input
                            type="checkbox"
                            id="is_highlighted"
                            name="is_highlighted"
                            value="Yes"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2">Mettez en surbrillance ce message</span>
                    </label>
                </div>
                <div class="mb-6 mx-2">
                    <div id="card-element"></div>
                </div>
                <div class="mb-2 mx-2">
                    @csrf
                    <input
                        type="hidden"
                        id="payment_method_id"
                        name="payment_method_id"
                        value="">
                    <button type="submit" id="form_submit" class="block w-full items-center bg-indigo-500 text-white border-0 py-2 focus:outline-none hover:bg-indigo-600 rounded text-base mt-4 md:mt-0">Poster une offre </button>
                </div>
            </form>
        </div>
    </section>
  
</x-app-layout> 
