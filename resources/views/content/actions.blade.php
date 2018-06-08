@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Content actions</div>

                <div class="card-body">
                    <content-actions :items="{{ json_encode($contentList) }}"></content-actions>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
