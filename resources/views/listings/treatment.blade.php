<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des candidatures') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        @if ($errors->has('message'))
                        <div class="alert alert-danger">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                    

                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nom</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">E-mail</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">CV</span>
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">status</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                @foreach($show as $application)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $application->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        {{ $application->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                        <p>CV : <a href="{{ asset('storage/' . $application->cv) }}" target="_blank">{{ $application->cv }}</a></p>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                        @if ($application->status == 'en cours')
                                        <form method="POST" action="{{ url('update_status/'.$application->offer_id.'/'.$application->email) }}">
                                            @csrf
                                            <div class="inline-flex">
                                                <button type="submit" name="status" value="accepter" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                    Valider
                                                </button>

                                                <button type="submit" name="status" value="refuser" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">
                                                    Refuser
                                                </button>
                                            </div>
                                        </form>
                                        @elseif ($application->status == 'accepter')
                                        <p>Ce candidat est accepter</p>
                                        @elseif ($application->status == 'refuser')
                                        <p>Ce candidat est refuser</p>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
