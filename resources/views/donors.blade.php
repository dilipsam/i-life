@extends('layouts.app')

@section('content')
    <div class="container top-padded">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Donors</h1>
                {!! $grid !!}
            </div>
        </div>
    </div>
@endsection
