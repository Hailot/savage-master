@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card bg-dark" >
                    <div class="card-header">All Spells</div>
                    <div class="card-body">
                        <spells-table></spells-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

