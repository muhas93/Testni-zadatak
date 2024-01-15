@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
    

@section('content')

    <div>
        <livewire:stavka-show>
    </div>

@endsection

@section('script')
<script>
    window.addEventListener('close-modal', event => {

        $('#stavkaModal').modal('hide');
        $('#updateStavkaModal').modal('hide');
        $('#deleteStavkaModal').modal('hide');
    })
</script>
@endsection
        </div>
    </div>
</div>

@endsection
