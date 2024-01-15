<div>
    @include('livewire.stavkamodal')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Upravljanje inventurom
                            <input type="search" wire:model.live.debounce.150ms="search" class="form-control float-end mx-2" placeholder="Search..." style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#stavkaModal">
                               Dodaj novu stavku
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Naziv</th>
                                    <th>kategorija</th>
                                    <th>Količina</th>
                                    <th>Cijena</th>
                                    <th>Datum dodavanja</th>
                                    <th>Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stavke as $stavka)
                                    <tr>
                                        <td>{{ $stavka->id }}</td>
                                        <td>{{ $stavka->name }}</td>
                                        <td>{{ $stavka->category }}</td>
                                        <td>{{ $stavka->quantity }}</td>
                                        <td>{{ $stavka->price }}</td>
                                        <td>{{ $stavka->added_date }}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#updateStavkaModal" wire:click="editStavka({{ $stavka->id }})" class="btn btn-primary">
                                                Uredi
                                            </button>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteStavkaModal" wire:click="deleteStavka({{ $stavka->id }})" class="btn btn-danger">
                                                Izbriši
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $stavke->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
