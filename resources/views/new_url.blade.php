@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{ __('Here is your new link!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="text-danger"><span>ALERT!!</span> Link will Expire after One Minute from time created</h4>
                    <h5>{{ $shortUrl->short_url }}</h5>
                    <a href="{{ url($shortUrl->short_url) }}" target="_blank">Exit</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
