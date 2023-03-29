<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    @if(auth()->check() && in_array(auth()->user()->role, ['Student', 'Pilote']))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- search --}}
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 align-middle">
                            <h3>rechercher </h3>
                            <form class="flex w-full justify-center items-end" action="{{ url('/users') }}" method="GET" role="search">
                                <div class="relative mr-4 w-full lg:w-1/2 text-left">
                                    <input type="text" placeholder="rechercher une entreprise" id="company" name="company" class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-indigo-200 focus:bg-transparent border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ session('company_search') }}">
                                </div>
                                <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">rechercher</button>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <table class="min-w-full divide-y divide-gray-200 border">

                            <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">company</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Détaille</span>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                    @foreach($listings as $listing)
                                        <tr class="bg-white">
                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                {{ $listing->company }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                                <a href="{{ url('/detail/'.$listing->id) }}"  class="text-indigo-600 hover:text-indigo-900">Détaille</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                            @endif
                        </table>

                        


                        @if(auth()->check() && in_array(auth()->user()->role, ['Human_Resource','Pilote']))
                        <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        {{-- search --}}
                        <div class="container">
                        <div class="row">
                        <div class="col-md-4 align-middle">
                        <h3>rechercher </h3>
                        <form class="flex w-full justify-center items-end" action="{{ url('/users') }}" method="GET" role="search">
                        <div class="relative mr-4 w-full lg:w-1/2 text-left">
                        <input type="text" placeholder="rechercher un(e) Etudiant(e)" id="student" name="student" class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-indigo-200 focus:bg-transparent border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" value="{{ session('student_search') }}">
                        </div>
                        <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">rechercher</button>
                        </form>
                        </div>
                        </div>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200 border">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Email</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">campus</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">formation</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach($students as $students)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $students->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $students->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $students->campus }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $students->formation }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            @endif
                        </table>

                    </div>
                    <div class="mt-2">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
