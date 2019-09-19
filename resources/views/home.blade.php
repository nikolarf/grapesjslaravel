@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">Dashboard <a class="float-right" href="{{ url('s/'.$username.'/gjs-'.$next_site_id) }}">New Site</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hello, {{$username}}
                </div>
                <div class="card-body">
                    <div class="container">
                      <div class="row mb-2">
                         <div class="col-sm">
                           User Name
                         </div>
                         <div class="col-sm">
                           Site ID
                         </div>
                         <div class="col-sm">
                            
                         </div>
                      </div>
                      @foreach($contentpages as $contentpage)
                          <div class="row">
                            <div class="col-sm mb-2">
                              {{$username}}
                            </div>
                            <div class="col-sm mb-2">
                              <a class="btn btn-secondary btn-sm" href="{{ url('edit/'.$username.'/'.$contentpage->id) }}">{{$contentpage->id}} EDIT</a>
                            </div>
                            <div class="col-sm mb-2">
                              <a class="btn btn-primary btn-sm" href="{{ url('show/'.$username.'/'.$contentpage->id) }}">show</a>
                            </div>
                            <div class="col-sm mb-2">
                              <a class="btn btn-danger btn-sm" href="{{ url('/deletesite/'.$contentpage->id) }}">delete</a>
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
