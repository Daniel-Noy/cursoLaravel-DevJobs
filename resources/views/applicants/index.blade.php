<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Candidatos de la vacante
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-3">
                <h1 class=" mt-4 mb-10 text-2xl font-bold text-center text-gray-800 dark:text-gray-200">Candidatos: {{ $vacant->title }}</h1>

                <div class="flex flex-col md:flex-row justify-center p-5">
                    <ul class="w-full divide-y divide-gray-400">
                        @forelse ($vacant->applicants as $applicant)
                        <li class="flex items-center p-3 ">
                            <div class="flex-1">
                                <p class="text-xl font-medium text-gray-800 dark:text-gray-300">
                                    {{ $applicant->user->name }}
                                </p>
                                <p class="text-gray-800 dark:text-gray-300">
                                    {{ $applicant->user->email }}
                                </p>
                                <p class="text-gray-800 dark:text-gray-300">
                                    Día que se postuló: <span class="font-bold">{{ $applicant->created_at->diffForHumans() }}</span>
                                </p>
                            </div>

                            <div class="">
                                <a class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full
                                text-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-400 dark:hover:bg-slate-700"
                                href=" {{ asset('storage/cv/'.$applicant->cv)}}" target="_blank" rel="noreferrer noopener">
                                    Ver CV
                                </a>
                            </div>
                            </li>
                        @empty
                            <p class="p-3 text-center text-sm text-gray-600 dark:text-gray-400">
                                Aún no hay candidatos para esta vacante
                            </p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
