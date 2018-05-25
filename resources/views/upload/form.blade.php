@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Content Uploader</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <content-uploader 
                        :url="'{{ route('upload.handle') }}'" 
                        :csrf-token="'{{ csrf_token() }}'"
                        :redirect="'{{ route('content.actions') }}'"
                    ></content-uploader>


                    {{ csrf_field() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection