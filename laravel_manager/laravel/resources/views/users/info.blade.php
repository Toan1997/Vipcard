@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __(''),
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="mb-0">{{ __('User Infomation') }}</h3>
                    </div>
                </div>
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-body">
                    <hr class="my-4" />
                    <form method="post" action="{{ route('user.info.save') }}"  enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" id="input-name" class="form-control" value="{{ request()->route('id') }}" />

                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('link_user') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Link User') }}</label>
                                <input type="text" name="link_user" id="input-name" class="form-control form-control-alternative{{ $errors->has('link_user') ? ' is-invalid' : '' }}" value="{{ old('link_user', $userData->link_user ?? '') }}" required autofocus>

                                @if ($errors->has('link_user'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('link_user') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('link_avatar') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Avatar') }}</label>
                                <input type="file" name="link_avatar" id="input-name" class="form-control form-control-alternative{{ $errors->has('link_avatar') ? ' is-invalid' : '' }}"  value="{{ old('link_avatar', $userData->link_avatar ?? '') }}"  autofocus>
                                @if( $userData->link_avatar ?? '')
                                <span>
                                       <img width="15%" src="/{{ old('link_avatar', $userData->link_avatar ?? '') }}">
                                </span>
                                @endif
                               @if ($errors->has('link_avatar'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('link_avatar') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"  value="{{ old('name', $userData->name ?? '') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Phone') }}</label>
                                <input type="text" name="phone" id="input-name" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}"  value="{{ old('phone', $userData->phone ?? '') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('greeting') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Greeting') }}</label>
                                <textarea type="text" name="greeting" id="input-name" class="form-control form-control-alternative{{ $errors->has('greeting') ? ' is-invalid' : '' }}" ]required autofocus>
                                    {{ old('greeting', $userData->greeting ?? '') }}
                                </textarea>
                                @if ($errors->has('greeting'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('greeting') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">Save</button>
                            </div>
                        </div>
                    </form>
                    @include('layouts.dynamic.add')
                </div>
            </div>
        </div>
        @if(isset($userData->link_user))
        <div class="col-xl-4 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-body">
                    <img style="padding: 50px;" src="https://api.qrserver.com/v1/create-qr-code/?data=https://app.vipcard.biz/{{ old('link_user', $userData->link_user ?? '') }}&amp;size=300x300" alt="Image placeholder" class="card-img-top">
                    <div class="card-header bg-white border-0">
                        <div class="row justify-content-center">
                            <h2>Save & Scan me</h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endif
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection
