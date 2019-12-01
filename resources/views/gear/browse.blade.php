@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">All Gear</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Damage</th>
                                <th>Cost</th>
                                <th>Weight</th>
                                <th>type</th>
                                <th>Properties</th>
                            </tr>
                            @foreach ($gears as $gear)
                                <tr>
                                    <th><img width="100px" src="{{$gear->url}}"></th>
                                    <td>{{$gear->name}}</td>
                                    <td>{{$gear->description}}</td>
                                    <td>{{$gear->damage}}</td>
                                    <td>{{$gear->cost}}</td>
                                    <td>{{$gear->weight}}</td>
                                    <td>{{$gear->type}}</td>
                                    <td>{{$gear->properties}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
