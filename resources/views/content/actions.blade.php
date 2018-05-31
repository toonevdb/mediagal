@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Content actions</div>

                <div class="card-body">
                    <ul class="content-list">
                        <content-list :items="{{ json_encode($contentList) }}"></content-list>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
