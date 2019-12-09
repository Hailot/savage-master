@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Files</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>name</th>
                                <th>created</th>
                                <th>Link</th>
                            </tr>
                            @foreach ($files as $file)
                                <tr>
                                    <td>{{$file->file_name}}</td>
                                    <td>{{$file->uploaded_time}}</td>
                                    <td><a href="{{ url('/jsonfile/download/'.$file->file_name) }}" target="_blank">Link</a> </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
