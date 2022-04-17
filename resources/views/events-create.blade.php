<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('events') }}">{{ __('Eventos') }}</a>
            → {{ __('Novo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col col-md-6">
                            <form name="add-event" action="{{ route('event.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="nameHelper" value="{{ old('name') }}" placeholder=""
                                        required>
                                    <small id="nameHelper" class="form-text text-muted">Ex.: Micael Ferreira</small>
                                    @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="about">Sobre o evento</label>
                                    <textarea class="form-control" name="about" id="about" maxlength="254" rows="5">{{ old('about') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        aria-describedby="slugHelper" value="{{ old('slug') }}" placeholder=""
                                        required>
                                    <small id="slugHelper" class="form-text text-muted">Preenchido
                                        automaticamente</small>
                                </div>
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="number" class="form-control" id="year" name="year" placeholder=""
                                        value="{{ old('year') }}">
                                </div>
                                <div class="form-group">
                                    <label for="edition">Edição</label>
                                    <input type="text" class="form-control" id="edition" name="edition" placeholder=""
                                        value="{{ old('edition') }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Endereço</label>
                                    <select name="address_id" id="address" class="form-control" required>
                                        <option value="">Selecione</option>
                                        @foreach ($addresses as $address)
                                            <option value="{{ $address->id }}">{{ $address->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Data de início</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date"
                                        placeholder="@micaelmf" value="{{ old('start_date') }}">
                                </div>
                                <div class="form-group">
                                    <label for="end_date">Data de encerramento</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date"
                                        placeholder="@micaelmf" value="{{ old('end_date') }}">
                                </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="job_call_start_date">Chamada de Trabalhos - Início</label>
                                <input type="datetime-local" class="form-control" id="job_call_start_date"
                                    name="job_call_start_date" placeholder=""
                                    value="{{ old('job_call_start_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="job_call_end_date">Chamada de Trabalhos - Fim</label>
                                <input type="datetime-local" class="form-control" id="job_call_end_date"
                                    name="job_call_end_date" placeholder="" value="{{ old('job_call_end_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="announce_schedule_start_date">Anunciar Programação - Início</label>
                                <input type="datetime-local" class="form-control" id="announce_schedule_start_date"
                                    name="announce_schedule_start_date" placeholder=""
                                    value="{{ old('announce_schedule_start_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="certificates_issuance_start_date">Emissão de Certificados -
                                    Início</label>
                                <input type="datetime-local" class="form-control"
                                    id="certificates_issuance_start_date" name="certificates_issuance_start_date"
                                    placeholder="" value="{{ old('certificates_issuance_start_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="certificates_issuance_end_date">Emissão de Certificados - Fim</label>
                                <input type="datetime-local" class="form-control" id="certificates_issuance_end_date"
                                    name="certificates_issuance_end_date" placeholder=""
                                    value="{{ old('certificates_issuance_end_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="subscription_issuance_start_date">Inscrições - Início</label>
                                <input type="datetime-local" class="form-control"
                                    id="subscription_issuance_start_date" name="subscription_issuance_start_date"
                                    placeholder="" value="{{ old('subscription_issuance_start_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="subscription_issuance_end_date">Inscrições - Fim</label>
                                <input type="datetime-local" class="form-control" id="subscription_issuance_end_date"
                                    name="subscription_issuance_end_date" placeholder=""
                                    value="{{ old('subscription_issuance_end_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="link_registrations">Link de Inscrições</label>
                                <input type="text" class="form-control" id="link_registrations"
                                    name="link_registrations" placeholder="" value="{{ old('link_registrations') }}">
                            </div>
                            <div class="form-group">
                                <label for="link_schedule">Link da Programação</label>
                                <input type="text" class="form-control" id="link_schedule" name="link_schedule"
                                    placeholder="" value="{{ old('link_schedule') }}">
                            </div>
                            <div class="form-group">
                                <label for="link_certificates">Link dos Certificados</label>
                                <input type="text" class="form-control" id="link_certificates"
                                    name="link_certificates" placeholder="" value="{{ old('link_certificates') }}">
                            </div>
                            <div class="form-group">
                                <label for="link_photos">Link das Fotos</label>
                                <input type="text" class="form-control" id="link_photos" name="link_photos"
                                    placeholder="" value="{{ old('link_photos') }}">
                            </div>
                        </div>

                        <div class="col col-md-12">
                            <label for="start_date">Atividades</label>
                            <select name="activities[]" id="activities" class="form-control" multiple="multiple"
                                required>
                                <option value="">Selecione</option>
                                @foreach ($activities as $activity)
                                    <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                @endforeach
                            </select>
                            <label for="start_date">Patrocinadores</label>
                            <select name="sponsors[]" id="sponsors" class="form-control" multiple="multiple"
                                required>
                                <option value="">Selecione</option>
                                @foreach ($sponsors as $sponsor)
                                    <option value="{{ $sponsor->id }}">{{ $sponsor->name }}</option>
                                @endforeach
                            </select>
                            <button name="clear" class="btn btn-danger">Limpar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script type="text/javascript">
    $(document).ready(function(e) {

    });
</script>
