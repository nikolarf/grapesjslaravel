@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                <div class="card-body">
                    <div class="container">
                      <div class="row">
                         <div class="col-sm">
                           User ID
                         </div>
                         <div class="col-sm">
                           Site ID
                         </div>
                      </div>
                      @foreach($contentpages as $contentpage)
                          <div class="row">
                            <div class="col-sm">
                              {{$username}}
                            </div>
                            <div class="col-sm">
                              <a href="{{ url('s/'.$username.'/'.$contentpage->id) }}">{{$contentpage->id}}</a>
                            </div>
                          </div>
                      @endforeach
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
