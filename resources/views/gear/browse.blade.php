@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card bg-dark" >
                    <div class="card-header">All Gear</div>
                    <div class="card-body">
                        <gear-table></gear-table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

