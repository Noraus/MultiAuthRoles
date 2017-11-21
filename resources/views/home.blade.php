@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Session::get('id') }}
                        <br>
                    @if (Auth::user()->pay)
                        Hola {{Auth::user()->name}}, eres usuario de pago
                    @else
                        Hola {{Auth::user()->name}}, eres usuario gratuito
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
