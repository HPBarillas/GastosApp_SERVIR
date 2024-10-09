<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="services-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Administracion de rublos"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <!-- New service Modal -->
        <div class="modal fade" id="new-service-modal" tabindex="-1" role="dialog" aria-labelledby="new-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="new-modal-label">Nuevo rublo</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </div>
                    <div class="modal-body" id="attachment-body-content">
                        <form action="{{ route('new-service') }}" method="POST" role="form text-left" id="newService">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="m-0">Rublo</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Rublo</label>
                                                <input type="text" class="form-control" name="name" id="name" onfocus="focused(this)" onfocusout="defocused(this)">
                                                @error('name')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group input-group-outline my-3">
                                                <select class="form-control" name="active" id="active" onfocus="focused(this)" onfocusout="defocused(this)">
                                                    <option value="">Estado</option>
                                                    <option value="Y">Activo</option>
                                                    <option value="N">Inactivo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Descripcion</label>
                                                <input type="text" class="form-control" name="description" id="description" onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4" form="newService">{{ 'Crear' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /New project Modal -->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        @if(session('error'))
                            <div class="m-3  alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert">
                                <span class="alert-text text-white">
                                    {{ session('error') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(session('status'))
                            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                                <span class="alert-text text-white">
                                    {{ session('status') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class=" me-3 my-3 text-end">
                            <a id="edit-item" name="edit-item" class="btn bg-gradient-dark mb-0" type="button" data-bs-toggle="modal" data-bs-target="#new-service-modal">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Nuevo rublo</a>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Id
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Rublo
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Descripcion
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Activa
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Fecha creacion
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Fecha edicion
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @csrf
                                        @foreach($services as $service)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$service->id}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$service->service}}</p>
                                                            <input type="hidden" value="{{$service->service}}" id="service-{{$service->id}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$service->description}}</p>
                                                            <input type="hidden" value="{{$service->description}}" id="description-{{$service->id}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$service->active === 'Y' ? "Activa" : "Inactiva"}}</p>
                                                            <input type="hidden" value="{{$service->active}}" id="active-{{$service->id}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$service->created_at}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$service->updated_at}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a onclick=updateRate("update",{{$service->id}}) rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
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
            <div id="updateServiceDiv" style="display: none;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">{{ __('Edicion de rublo') }}</h6>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <form action="{{route('describe-service-update')}}" method="POST" role="form text-left">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group input-group-static mb-4">
                                                <input value="" type="hidden" name="serviceId" id="serviceId">
                                                <label>{{ __('Rublo') }}</label>
                                                <input type="text" class="form-control" value="" name="service-update" id="service-update" required>
                                                @error('service-update')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Estado') }}</label>
                                                <select class="form-control" name="active-update" id="active-update">
                                                    <option vlaue=""></option>
                                                    <option value="Y" selected>Activo</option>
                                                    <option value="N">Inctivo</option>
                                                </select>
                                                @error('active-update')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Descripcion') }}</label>
                                                <input type="text" class="form-control" value="" name="description-update" id="description-update" required>
                                                @error('description-update')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-end mb-3">
                                                <div class="p-2">
                                                    <a class="btn bg-gradient-dark btn-md mt-4 mb-4" onclick=updateRate("cancel")>{{ 'Cancelar' }}</a>
                                                </div>
                                                <div class="p-2">    
                                                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Guardar cambios' }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>

    <script>
        function updateRate(status, id){
            if (status === 'update') {
                document.getElementById("updateServiceDiv").style.display = "block";
                document.getElementById("serviceId").value = id;

                var service = document.getElementById("service-"+id).value;
                document.getElementById("service-update").value = service;
                
                var decription = document.getElementById("description-"+id).value;
                document.getElementById("description-update").value = decription;
                
                var active = document.getElementById("active-"+id).value;
                document.getElementById("active-update").value = active;
            }
            if (status === 'cancel') {
                document.getElementById("updateServiceDiv").style.display = "none";
            }
        }        
    </script>

    <x-plugins></x-plugins>

</x-layout>
