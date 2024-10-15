<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="donations-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Administracion de donaciones"></x-navbars.navs.auth>
        <!-- End Navbar -->
        
        <!-- New donation Modal -->
        <div class="modal fade" id="new-donation-modal" tabindex="-1" role="dialog" aria-labelledby="new-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="new-modal-label">Nueva donacion</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </div>
                    <div class="modal-body" id="attachment-body-content">
                        <form action="{{ route('new-donation') }}" method="POST" role="form text-left" id="newDonation">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="m-0">Donacion</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Donante</label>
                                                <input type="text" class="form-control" name="donor" id="donor" onfocus="focused(this)" onfocusout="defocused(this)">
                                                @error('donor')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Valor</label>
                                                <input type="number" class="form-control" name="amount" id="amount" onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
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
                                                <select class="form-control" name="donationType" id="donationType" onfocus="focused(this)" onfocusout="defocused(this)">
                                                    <option value="">Tipo Donacion</option>
                                                    <option value="Y">Organizacion</option>
                                                    <option value="N">Personal</option>
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
                                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4" form="newDonation">{{ 'Crear' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /New donation Modal -->

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
                            <a id="edit-item" name="edit-item" class="btn bg-gradient-dark mb-0" type="button" data-bs-toggle="modal" data-bs-target="#new-donation-modal">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Nueva donacion</a>
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
                                                Donante
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Descripcion
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tipo donacion
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Monto
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Estado
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Fecha recepcion
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @csrf
                                        @foreach($donations as $donation)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$donation->id}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$donation->donor}}</p>
                                                            <input type="hidden" value="{{$donation->donor}}" id="donor-{{$donation->id}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$donation->description}}</p>
                                                            <input type="hidden" value="{{$donation->description}}" id="description-{{$donation->id}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$donation->isOrganization === 'Y' ? "Organizacion" : "Personal"}}</p>
                                                            <input type="hidden" value="{{$donation->isOrganization}}" id="donationType-{{$donation->id}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$donation->donationAmount}}</p>
                                                            <input type="hidden" value="{{$donation->donationAmount}}" id="amount-{{$donation->id}}">
                                                        </div>
                                                    </div>
                                                </td>                                                
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$donation->active === 'Y' ? "Activa" : "Inactiva"}}</p>
                                                            <input type="hidden" value="{{$donation->active}}" id="active-{{$donation->id}}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$donation->created_at}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a onclick=updateRate("update",{{$donation->id}}) rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <a onclick=updateRate("donate",{{$donation->id}}) rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                                                        <i class="material-icons">payments</i>
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
            <div id="updateDonationDiv" style="display: none;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">{{ __('Edicion de donacion') }}</h6>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <form action="{{route('describe-donation-update')}}" method="POST" role="form text-left">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="input-group input-group-static mb-4">
                                                <input value="" type="hidden" name="donationId" id="donationId">
                                                <label>{{ __('Donador') }}</label>
                                                <input type="text" class="form-control" value="" name="donor-update" id="donor-update" required>
                                                @error('service-update')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Cantidad') }}</label>
                                                <input type="number" class="form-control" value="" name="amount-update" id="amount-update" required>
                                                @error('amount-update')
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
                                        <div class="col-md-3">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Tipo donacion') }}</label>
                                                <select class="form-control" name="donationType-update" id="donationType-update">
                                                    <option vlaue=""></option>
                                                    <option value="Y" selected>Organizacion</option>
                                                    <option value="N">Personal</option>
                                                </select>
                                                @error('donationType-update')
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
            <div id="makeDonationDiv" style="display: none;">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">{{ __('Ejecutar donacion') }}</h6>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <form action="{{route('describe-donation-make')}}" method="POST" role="form text-left">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="input-group input-group-static mb-4">
                                                <input value="" type="hidden" name="donationId-make" id="donationId-make">
                                                <label>{{ __('Donador') }}</label>
                                                <input type="text" class="form-control" value="" name="donor-make" id="donor-make" required disabled>
                                                @error('service-make')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group input-group-static mb-4">
                                                <input value="" type="hidden" name="amount-make" id="amount-make">
                                                <label>{{ __('Cantidad Donada') }}</label>
                                                <input type="number" class="form-control"  name="amountDonated-make" id="amountDonated-make" required disabled>
                                                @error('amount-make')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Proyectos / Servicio') }}</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="projectService-make" id="projectService-make" required>
                                                    <option vlaue=""></option>
                                                    @foreach($projectsServices as $projectService)
                                                        <option value="{{ $projectService->id }}">{{ $projectService->project}} / {{$projectService->service}} - {{$projectService->totalService}}</option>
                                                    @endforeach
                                                </select>
                                                @error('projectOrganization')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group input-group-static mb-4">
                                                <label>{{ __('Cantidad a donar') }}</label>
                                                <input type="number" class="form-control" value="" name="amountToDonate-make" id="amountToDonate-make" min="1" required>
                                                @error('amount-make')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="d-flex justify-content-end mb-3">
                                                <div class="p-2">
                                                    <a class="btn bg-gradient-dark btn-md mt-4 mb-4" onclick=updateRate("cancel")>{{ 'Cancelar' }}</a>
                                                </div>
                                                <div class="p-2">    
                                                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Donar' }}</button>
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
                document.getElementById("updateDonationDiv").style.display = "block";
                document.getElementById("makeDonationDiv").style.display = "none";

                document.getElementById("donationId").value = id;

                var donor = document.getElementById("donor-"+id).value;
                document.getElementById("donor-update").value = donor;
                
                var amount = document.getElementById("amount-"+id).value;
                document.getElementById("amount-update").value = amount;
                
                var donationType = document.getElementById("donationType-"+id).value;
                document.getElementById("donationType-update").value = donationType;
                
                var decription = document.getElementById("description-"+id).value;
                document.getElementById("description-update").value = decription;
                
                var active = document.getElementById("active-"+id).value;
                document.getElementById("active-update").value = active;
            }
            if (status === 'donate') {
                document.getElementById("makeDonationDiv").style.display = "block";
                document.getElementById("updateDonationDiv").style.display = "none";

                document.getElementById("donationId-make").value = id;

                var donor = document.getElementById("donor-"+id).value;
                document.getElementById("donor-make").value = donor;
                
                var amount = document.getElementById("amount-"+id).value;
                document.getElementById("amount-make").value = amount;
                document.getElementById("amountDonated-make").value = amount;

                // document.getElementById("amountToDonate-make").addEventListener("change", function() {
                //     let v = parseInt(this.value);
                //     if (v < 1) this.value = 1;
                //     if (v > 50) this.value = amount;
                // });

            }
            if (status === 'cancel') {
                document.getElementById("updateDonationDiv").style.display = "none";
                document.getElementById("makeDonationDiv").style.display = "none";
            }
        }        
    </script>

    <x-plugins></x-plugins>

</x-layout>
