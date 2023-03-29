@if(\Auth::user()->role === "Student")
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Information supplémentaire
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            ajouter ou Modifier des informations supplémentaires       
        </p>
      
    </header>

    <form method="post" action="{{ route('profile.add_info') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
    @method('patch')


<div>
    <x-input-label for="campus" :value="__('campus')" />
    <select id="campus" name="campus" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" required autofocus autocomplete="campus">
        <option value="campus 1" @selected(old('campus', $user->campus) == "campus 1")>Campus 1</option>
        <option value="campus 2" @selected(old('campus', $user->campus) == "campus 2")>Campus 2</option>
    </select>
            <x-input-error class="mt-2" :messages="$errors->get('campus')" />
        </div>

        <div>
            <x-input-label for="formation" :value="__('formation')" />
            <select id="formation" name="formation" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" required autofocus autocomplete="formation">
                <option value="formation 1" @selected(old('formation') == "formation 1")>Formation 1</option>
                <option value="formation 2" @selected(old('formation') == "formation 2")>Formation 2</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('formation')" />
        </div>


        <div>
            <a href="{{"/storage/$user->cv" }}" alt='cv'class="mt-1 text-sm text-gray-600 dark:text-gray-400">VOIR LE CV</a>
            <x-input-label for="cv" :value="__('cv')" />
            <x-text-input id="cv" name="cv" type="file" class="mt-2 block w-full"  :value="old('cv', $user->cv)" required autofocus autocomplete="cv" />
            <x-input-error class="mt-2" :messages="$errors->get('cv')" />
        </div>
        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('sauvegarder') }}</x-primary-button>
        </div>
    </form>
</section>
</div>
@endif

