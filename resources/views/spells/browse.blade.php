@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">All Spells</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Level</th>
                                    <th>Name</th>
                                    <th>School</th>
                                    <th>Classes</th>
                                    <th>Source</th>

                                </tr>
                                @foreach ($spells as $spell)
                                    <tr>
                                        <td>{{ ($spell->level == 0) ? 'Cantrip': $spell->level}}</td>
                                        <td>{{$spell->name}}</td>
                                        <td>{{$spell->school->name}}</td>
                                        <td>{{$spell->classes}}</td>
                                        <td>{{$spell->source}}</td>

                                    </tr>
                                @endforeach
                            </table>
                            <div class="table-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

