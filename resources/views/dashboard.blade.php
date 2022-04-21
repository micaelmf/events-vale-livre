<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col col-md-12">
                            <h3>Leia-me</h3>
                            <ul>
                                <li>Antes de cadastrar o espaço, cadastre o endereço</li>
                                <li>Antes de cadastrar a atividade, cadastre o palestrante</li>
                                <li>Para ralatar um bug, sugerir melhorias ou novas funcinalidades, envie email para micaelmf@gmail.com e contato@valelivre.org</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>