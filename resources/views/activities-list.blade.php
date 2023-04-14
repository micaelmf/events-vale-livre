<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atividades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col col-md-2">
                            <a href="{{ route('activity.create') }}" class="btn btn-sm btn-primary">Novo</a>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col col-md-12">
                            <table id="table" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Palestrante</th>
                                        <th scope="col">Espaço</th>
                                        <th scope="col" class="text-right">Ações</th>
                                    </tr>
                                </thead>
                                <tbody id="table-content">
                                    @foreach ($activities as $activity)
                                        <tr id="{{ $activity->id }}">
                                            <th scope="row">{{ $activity->position }}</th>
                                            <td>{{ $activity->name }}</td>
                                            <td>{{ $activity->type }}</td>
                                            <td>{{ $activity->status }}</td>
                                            <td>{{ $activity->speaker->name }}</td>
                                            <td>{{ $activity->space->name ?? 'Nenhum' }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('activity.destroy', ['id' => $activity->id]) }}"
                                                    class="btn btn-sm btn-outline-danger">
                                                    Excluir
                                                </a>
                                                <a href="{{ route('activity.edit', ['id' => $activity->id]) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    Editar
                                                </a>
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
    </div>
</x-app-layout>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<script type="text/javascript">
    $(document).ready(function() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "1000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        
        $("#table").DataTable();
        $("#table-content").sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function() {
                sendOrderToServer();

            }
        });

        function sendOrderToServer() {
            var order = [];
            var token = $('meta[name="csrf-token"]').attr('content');

            $('tbody>tr').each(function(index, element) {
                order.push({
                    id: $(this).attr('id'),
                    position: index + 1
                });

            });

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('activity.sortable') }}",
                data: {
                    order: order,
                    _token: token
                },
                success: function(response) {
                    toastr["success"]("Ordem atualizada com sucesso!")
                },
                error: function(response) {
                    toastr["error"]("Erro ao ordenar!")
                }
            });
        }
    });
</script>
