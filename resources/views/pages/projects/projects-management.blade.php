<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="project-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Administracion de proyectos"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <!-- New project Modal -->
        <div class="modal fade" id="new-project-modal" tabindex="-1" role="dialog" aria-labelledby="new-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="new-modal-label">Nuevo proyecto</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </div>
                    <div class="modal-body" id="attachment-body-content">
                        <form action="{{ route('new-project') }}" method="POST" role="form text-left" id="newProject">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="m-0">Proyecto</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <select class="form-control" name="organizationId" id="organizationId" onfocus="focused(this)" onfocusout="defocused(this)">
                                                    <option value="">Organizaciones</option>
                                                    @foreach($organizations as $organization)
                                                        <option value="{{ $organization->id }}">{{ $organization->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Nombre Proyecto</label>
                                                <input type="text" class="form-control" name="name" id="name" onfocus="focused(this)" onfocusout="defocused(this)">
                                                @error('name')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">                                        
                                        <div class="col-md-3">
                                            <div class="input-group input-group-outline my-3">
                                                <select class="form-control" name="active" id="active" onfocus="focused(this)" onfocusout="defocused(this)">
                                                    <option value="">Estado</option>
                                                    <option value="Y">Activo</option>
                                                    <option value="N">Inactivo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Fecha inicio</label>
                                                <input type="date" class="form-control" name="startDate" id="startDate" onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Fecha Fin</label>
                                                <input type="date" class="form-control" name="endDate" id="endDate" onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <select class="form-control" name="countryId" id="countryId" onfocus="focused(this)" onfocusout="defocused(this)">
                                                    <option value="">Pais</option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->country}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <select class="form-control" name="stateId" id="stateId" onfocus="focused(this)" onfocusout="defocused(this)">
                                                    <option value="">Departamento</option>
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->state}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <select class="form-control" name="cityId" id="cityId" onfocus="focused(this)" onfocusout="defocused(this)">
                                                    <option value="">Municipio</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->city}}</option>
                                                    @endforeach
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
                                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4" form="newProject">{{ 'Crear' }}</button>
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
                            <a id="edit-item" name="edit-item" class="btn bg-gradient-dark mb-0" type="button" data-bs-toggle="modal" data-bs-target="#new-project-modal">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Nuevo proyecto</a>
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
                                                Organizacion
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nombre
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Descripcion
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Pais
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Fecha Incio
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Fecha Fin
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @csrf
                                        @foreach($projects as $project)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$project->id}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$project->name}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$project->project}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$project->description}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$project->country}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$project->startDate}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$project->endDate}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{url('project-describe')}}/{{$project->id}}" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <!-- <button type="button" class="btn btn-danger btn-link" data-original-title="" title="">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                    </button> -->
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
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
    <script>
        document.getElementById('startDate').innerHtml = "";
    </script>
</x-layout>
