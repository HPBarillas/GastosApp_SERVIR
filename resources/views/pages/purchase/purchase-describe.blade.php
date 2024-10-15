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
                                
                                 Detalle de orden de compra
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                Orden de compra para 
                                @if($project[0]->id<10)
                                    P-000{{$project[0]->id}}
                                @else
                                    P-00{{$project[0]->id}}
                                @endif
                                
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
                                <h6 class="mb-0">{{ __('Informacion de la orden de compra') }}</h6>
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
                                                <input value="" type="hidden" name="projectId" id="projectId">
                                                <label>{{ __('Detalle') }}</label>
                                                <input type="text" class="form-control" value="{{$purchases_details[0]->description}}" name="projectName" id="projectName" required>
                                                @error('projectName')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Descripcion') }}</label>
                                                <input type="text" class="form-control" value="" name="projectDescription" id="projectDescription">
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
                                                <select class="form-control" name="projectActive" id="projectActive">
                                                    <option vlaue=""></option>
                                                        <option value="Y" selected>Activo</option>
                                                        <option value="N">Inctivo</option>
                                                </select>
                                                @error('projectActive')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>{{ __('Fecha de inicio') }}</label>
                                                <input type="date" class="form-control" value="" name="projectStartDate" id="projectStartDate">
                                                @error('projectStartDate')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>{{ __('Fecha fin') }}</label>
                                                <input type="date" class="form-control" value="" name="projectEndDate" id="projectEndDate">
                                                @error('projectEndDate')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{{ __('Fecha Creacion') }}</label>
                                                <input type="datetime-local" class="form-control" value="{{$purchases_details[0]->created_at}}" id="projectCreatedDate" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{{ __('Fecha modificacion') }}</label>
                                                <input type="datetime-local" class="form-control" value="{{$purchases_details[0]->updated_at}}" id="projectUpdatedDate" disabled>
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
                            <div id="createProjectServiceDiv">
                                <div class="card-header pb-0 px-3">
                                    <h6 class="mb-0">{{ __('Rublos del proyecto') }}</h6>
                                </div>
                                <div class="card-body pt-4 p-3">
                                    <form action="{{route('project-service-new')}}" method="POST" role="form text-left">
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
                                        @if(session('status'))
                                            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                                                <span class="alert-text text-white">
                                                    {{ session('status') }}</span>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>{{ __('Rublos') }}</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="serviceId" id="serviceId" required>
                                                        <option vlaue=""></option>
                                                        @foreach($services as $service)
                                                            <option value="{{ $service->id }}" >{{ $service->service}} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('serviceId')
                                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>{{ __('Costo') }}</label>
                                                    <input type="number" class="form-control" name="amount" id="amount" required>
                                                    @error('amount')
                                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>{{ __('Estado') }}</label>
                                                    <select class="form-control" name="isCompleted" id="isCompleted">
                                                        <option vlaue=""></option>
                                                        <option value="N" selected>Recolectando</option>
                                                        <option value="Y">Completada</option>
                                                    </select>
                                                    @error('isCompleted')
                                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="d-flex justify-content-end mb-3">
                                                    <div class="p-2">    
                                                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Agregar rublo' }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="updateProjectServiceDiv" style="display: none;">
                                <div class="card-header pb-0 px-3">
                                    <h6 class="mb-0">{{ __('Editar rublo') }}</h6>
                                </div>
                                <div class="card-body pt-4 p-3">
                                    <form action="{{route('project-service-update')}}" method="POST" role="form text-left">
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
                                        @if(session('status'))
                                            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                                                <span class="alert-text text-white">
                                                    {{ session('status') }}</span>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="input-group input-group-static mb-4">
                                                    <input value="" type="hidden" name="projectServiceId-update" id="projectServiceId-update">
                                                    <label>{{ __('Rublos') }}</label>
                                                    <select class="form-control" name="service-update" id="service-update" required>
                                                        <option vlaue=""></option>
                                                        @foreach($services as $service)
                                                            <option value="{{ $service->id }}" >{{ $service->service}} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('serviceId')
                                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>{{ __('Costo') }}</label>
                                                    <input type="text" class="form-control" name="amount-update" id="amount-update" required>
                                                    @error('amount')
                                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group input-group-static mb-4">
                                                    <label>{{ __('Estado') }}</label>
                                                    <select class="form-control" name="isCompleted-update" id="isCompleted-update">
                                                        <option vlaue=""></option>
                                                        <option value="N" selected>Recolectando</option>
                                                        <option value="Y">Completada</option>
                                                    </select>
                                                    @error('isCompleted')
                                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="d-flex justify-content-end mb-3">
                                                    <div class="p-2">    
                                                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Modificar rublo' }}</button>
                                                    </div>
                                                    <div class="p-2">
                                                        <a class="btn bg-gradient-dark btn-md mt-4 mb-4" onclick=updateRate("cancel")>{{ 'Cancelar' }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
                                                    Servicio
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Descripcion
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Cantidad
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Donacion completa
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Cantidad donada
                                                </th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Activa
                                                </th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @csrf

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <script>
        function updateRate(status, id){
            if (status === 'update') {
                document.getElementById("updateProjectServiceDiv").style.display = "block";
                document.getElementById("createProjectServiceDiv").style.display = "none";
                
                document.getElementById("projectServiceId-update").value = id;
                
                var amount = document.getElementById("amount-"+id).value;
                document.getElementById("amount-update").value = amount;
                
                var completed = document.getElementById("isCompleted-"+id).value;
                document.getElementById("isCompleted-update").value = completed;

                var serviceId = document.getElementById("serviceId-"+id).value;
                selectElement('service-update', serviceId);
            }
            if (status === 'cancel') {
                document.getElementById("updateProjectServiceDiv").style.display = "none";
                document.getElementById("createProjectServiceDiv").style.display = "block";
            }
        }

        function selectElement(id, valueToSelect) {
            let element = document.getElementById(id);
            element.options.selectedIndex = valueToSelect;
        }
    </script>
    <x-plugins></x-plugins>

</x-layout>
