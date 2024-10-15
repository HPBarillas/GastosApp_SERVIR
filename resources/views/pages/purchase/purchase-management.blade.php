<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="purchase-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Administracion de ordenes de compra"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <!-- New purchase Modal -->
        <div class="modal fade" id="new-purchase-modal" tabindex="-1" role="dialog" aria-labelledby="new-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="new-modal-label">Nueva orden de compra</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </div>
                    <div class="modal-body" id="attachment-body-content">
                        <form action="{{ route('new-purchase') }}" method="POST" role="form text-left" id="newPurchase">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="m-0">Orden de compra</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Descripcion</label>
                                                <input type="text" class="form-control" name="donor" id="donor" onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <label class="form-label">Proveedor</label>
                                                <input type="text" class="form-control" name="amount" id="amount" onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group input-group-outline my-3">
                                                <select class="form-control" name="active" id="active" onfocus="focused(this)" onfocusout="defocused(this)">
                                                    <option value="">Estado</option>
                                                    <option value="O">Abierta</option>
                                                    <option value="P">Pagada</option>
                                                    <option value="C">Cerrada</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group input-group-outline my-3">
                                                <select class="form-control" name="stateId" id="stateId" onfocus="focused(this)" onfocusout="defocused(this)">
                                                    <option value="">Projectos</option>
                                                    @foreach($projects as $project)
                                                        <option value="{{ $project->id }}">{{ $project->project}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Fecha de pago</label>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group input-group-outline my-3">
                                                <input type="date" class="form-control" name="description" id="description" onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4" form="newPurchase">{{ 'Crear' }}</button>
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
                        <div class=" me-3 my-3 text-end">
                            <a id="edit-item" name="edit-item" class="btn bg-gradient-dark mb-0" type="button" data-bs-toggle="modal" data-bs-target="#new-purchase-modal">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Nueva orden de compra</a>
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
                                                Proveedor
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Descripcion
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Projecto
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Estado
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Fecha pago
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Fecha de creacion
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @csrf
                                        @foreach($purchases as $purchase)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$purchase->id}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$purchase->proveedor}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$purchase->description}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$purchase->project}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">
                                                                @switch($purchase->status)
                                                                    @case('O')
                                                                        Abierta
                                                                        @break
                                                                    @case('P')
                                                                        Pagada
                                                                        @break
                                                                    @case('C')
                                                                        Cerrada
                                                                        @break
                                                                @endswitch
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$purchase->dueDate}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <p class="mb-0 text-sm">{{$purchase->created_at}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{url('purchase-describe')}}/{{$purchase->id}}" data-original-title="" title="">
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
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
