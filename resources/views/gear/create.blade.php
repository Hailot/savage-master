@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create new gear</div>

                    <div class="card-body">
                        <form action="/gear/store" enctype="multipart/form-data" method="post">
                            @csrf
{{--                            <div class="form-group">--}}
{{--                                <input type="file" name="pic" id="">--}}
{{--                                <span class="help-block text-danger">{{$errors->first('pic')}}</span>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                                <span class="help-block text-danger">{{$errors->first('name')}}</span>

                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                                <span class="help-block text-danger">{{$errors->first('description')}}</span>

                            </div>
                            <div class="form-group">
                                <label for="damge">Damage</label>
                                <input type="text" name="damage" id="name" class="form-control">
                                <span class="help-block text-danger">{{$errors->first('damage')}}</span>

                            </div>
                            <div class="form-group">
                                <label for="cost">Cost</label>
                                <input type="text" name="cost" id="cost" class="form-control">
                                <span class="help-block text-danger">{{$errors->first('cost')}}</span>

                            </div>
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input type="text" name="weight" id="weight" class="form-control">
                                <span class="help-block text-danger">{{$errors->first('weight')}}</span>

                            </div>
                            <div class="form-group">
                                <label for="properties">Properties</label>
                                <textarea name="properties" id="properties" class="form-control"></textarea>
                                <span class="help-block text-danger">{{$errors->first('properties')}}</span>

                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" name="type" id="type" class="form-control">
                                <span class="help-block text-danger">{{$errors->first('type')}}</span>

                            </div>
                            <button class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{session('success')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
