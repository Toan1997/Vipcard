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
                            @if(isset($affiliate->id))
                                <h3 class="mb-0">{{ __('Edit Affiliate') }}</h3>
                            @else
                                <h3 class="mb-0">{{ __('Create Affiliate') }}</h3>
                            @endif

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('affiliate.save') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(isset($affiliate->id))
                                <input type="hidden" name="id" id="input-name" class="form-control" value="{{ old('id', $affiliate->id ?? '') }}" />
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('affiliate_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Affiliate ID') }}</label>
                                    <input type="text" name="affiliate_id" id="input-name" class="form-control form-control-alternative{{ $errors->has('affiliate_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Affiliate ID') }}" value="{{ old('affiliate_id', $affiliate->affiliate_id ?? '') }}" required autofocus>

                                    @if ($errors->has('affiliate_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('affiliate_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('affiliate_name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Affiliate Name') }}</label>
                                    <input type="text" name="affiliate_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('affiliate_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Affiliate Name') }}" value="{{ old('affiliate_name',$affiliate->affiliate_name ?? '') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('affiliate_icon') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Affiliate Icon') }}</label>
                                    <input type="file" name="affiliate_icon" id="input-name" class="form-control form-control-alternative{{ $errors->has('affiliate_icon') ? ' is-invalid' : '' }}" placeholder="{{ __('Affiliate Icon') }}" value="{{ old('affiliate_icon' ,$affiliate->affiliate_icon ?? '')}}" autofocus>
                                   @if($affiliate->affiliate_icon ?? '')
                                    <span>
                                       <img width="15%" src="/{{ old('affiliate_icon' ,$affiliate->affiliate_icon ?? '')}}">
                                    </span>
                                    @endif
                                        @if ($errors->has('affiliate_icon'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('affiliate_icon') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('affiliate_link') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Affiliate Link') }}</label>
                                    <input type="text" name="affiliate_link" id="input-name" class="form-control form-control-alternative{{ $errors->has('affiliate_link') ? ' is-invalid' : '' }}" placeholder="{{ __('Affiliate Link') }}" value="{{ old('affiliate_link' , $affiliate->affiliate_link ?? '')}}" autofocus>
                                @if ($errors->has('affiliate_link'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('affiliate_link') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
