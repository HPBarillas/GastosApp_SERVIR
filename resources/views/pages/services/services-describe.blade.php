<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="project-management"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Descripsion de proyecto'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{$project[0]->project}}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                {{$project[0]->country}}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href=".detalle" role="tab" aria-selected="true">
                                        <i class="material-icons text-lg position-relative">home</i>
                                        <span class="ms-1">Detalles</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href=".rublos" role="tab" aria-selected="false">
                                        <i class="material-icons text-lg position-relative">settings</i>
                                        <span class="ms-1">Rubros</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="container-fluid py-4 tab-pane active detalle">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">{{ __('Informacion del proyecto') }}</h6>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <form action="{{route('describe-project-update')}}" method="POST" role="form text-left">
                                    @csrf
                                    @if(session('error'))
                                        <div class="m-3  alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert">
                                            <span class="alert-text text-white">
                                            {{ session('error') }}</span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if(session('success'))
                                        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                                            <span class="alert-text text-white">
                                            {{ session('success') }}</span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="input-group input-group-static mb-4">
                                                <input value="{{$project[0]->id }}" type="hidden" name="projectId" id="projectId">
                                                <label>{{ __('Nombre del proyecto') }}</label>
                                                <input type="text" class="form-control" value="{{$project[0]->project }}" name="projectName" id="projectName" required>
                                                @error('projectName')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Organizacion') }}</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="projectOrganization" id="projectOrganization" required>
                                                    <option vlaue=""></option>
                                                    @foreach($organizations as $organization)
                                                        <option value="{{ $organization->id }}" {{ ($organization->id === $project[0]->organizationId) ? "selected" : "" }}>{{ $organization->name}} </option>
                                                    @endforeach
                                                </select>
                                                @error('projectOrganization')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Descripcion') }}</label>
                                                <input type="text" class="form-control" value="{{$project[0]->description }}" name="projectDescription" id="projectDescription">
                                                @error('projectDescription')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Estado') }}</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="projectActive" id="projectActive">
                                                    <option vlaue=""></option>
                                                    @if($project[0]->active === 'Y')
                                                        <option value="Y" selected>Activo</option>
                                                        <option value="N">Inctivo</option>
                                                    @else
                                                        <option value="N" selected>Inctivo</option>
                                                        <option value="Y">Activo</option>
                                                    @endif
                                                </select>
                                                @error('projectActive')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>{{ __('Fecha de inicio') }}</label>
                                                <input type="date" class="form-control" value="{{$project[0]->startDate}}" name="projectStartDate" id="projectStartDate">
                                                @error('projectStartDate')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>{{ __('Fecha fin') }}</label>
                                                <input type="date" class="form-control" value="{{$project[0]->endDate}}" name="projectEndDate" id="projectEndDate">
                                                @error('projectEndDate')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{{ __('Fecha Creacion') }}</label>
                                                <input type="datetime-local" class="form-control" value="{{$project[0]->created_at}}" id="projectCreatedDate" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{{ __('Fecha modificacion') }}</label>
                                                <input type="datetime-local" class="form-control" value="{{$project[0]->updated_at}}" id="projectUpdatedDate" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Pais') }}</label>
                                                <select class="form-control" id="projectCountry" name="projectCountry">
                                                    <option vlaue=""></option>
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}" {{ ($country->id === $project[0]->countryId) ? "selected" : "" }}>{{ $country->country}} </option>
                                                    @endforeach
                                                </select>
                                                @error('projectCountry')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Departamento') }}</label>
                                                <select class="form-control" id="projectState" name="projectState">
                                                    <option vlaue=""></option>
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}" {{ ($state->id === $project[0]->stateId) ? "selected" : "" }}>{{ $state->state}} </option>
                                                    @endforeach
                                                </select>
                                                @error('projectState')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Municipio') }}</label>
                                                <select class="form-control" id="projectCity" name="projectCity">
                                                    <option vlaue=""></option>
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}" {{ ($city->id === $project[0]->cityId) ? "selected" : "" }}>{{ $city->city}} </option>
                                                    @endforeach
                                                </select>
                                                @error('projectCity')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-end mb-3">
                                                <div class="p-2">
                                                    <a class="btn bg-gradient-dark btn-md mt-4 mb-4" href="{{url('project-management')}}">{{ 'Regresar' }}</a>
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
                    <div class="container-fluid py-4 tab-pane rublos">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">{{ __('Rublos del proyecto') }}</h6>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <form action="{{route('describe-project-update')}}" method="POST" role="form text-left">
                                    @csrf
                                    @if(session('error'))
                                        <div class="m-3  alert alert-danger alert-dismissible fade show" id="alert-danger" role="alert">
                                            <span class="alert-text text-white">
                                            {{ session('error') }}</span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if(session('success'))
                                        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                                            <span class="alert-text text-white">
                                            {{ session('success') }}</span>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="input-group input-group-static mb-4">
                                                <input value="{{$project[0]->id }}" type="hidden" name="projectId" id="projectId">
                                                <label>{{ __('Nombre del proyecto') }}</label>
                                                <input type="text" class="form-control" value="{{$project[0]->project }}" name="projectName" id="projectName" required>
                                                @error('projectName')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Organizacion') }}</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="projectOrganization" id="projectOrganization" required>
                                                    <option vlaue=""></option>
                                                    @foreach($organizations as $organization)
                                                        <option value="{{ $organization->id }}" {{ ($organization->id === $project[0]->organizationId) ? "selected" : "" }}>{{ $organization->name}} </option>
                                                    @endforeach
                                                </select>
                                                @error('projectOrganization')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
