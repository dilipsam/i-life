@extends('layouts.app')

@section('content')
    <div class="container top-padded" id="home-menu">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    @if(Auth::user()-> hasRole('OWNER'))
                        <li class="col-md-4"><a href="donors">Donors</a></li>
                    @endif
                    <li class="col-md-4"><a href="recipients">Recipients</a></li>
                    <li class="col-md-4"><a href="children">Children</a></li>
                    
                    <li class="col-md-4"><a href="charts">Growth Charts</a></li>
                    
                    @if(Auth::user()-> hasRole('OWNER'))
                        <li class="col-md-4"><a href="donor-family">Donor Family Map</a></li>
                    @endif
                    
                </ul>

            </div>
        </div>
    </div>
@endsection
