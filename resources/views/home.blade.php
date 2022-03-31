@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Paste URL') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/exit" method="post">
                        {{ csrf_field() }}
                        <input type="url" name="url" placeholder="Enter your link here....." class="col-8">
                        <span><button class="btnt btn-outline-primary">Shorten URL</button></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
