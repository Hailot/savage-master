@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card bg-dark" >
                    <div class="card-header">All Creatures</div>
                    <div class="card-body">
                        <creature-table></creature-table>
                    </div>
                </div>
            </div>

@endsection

