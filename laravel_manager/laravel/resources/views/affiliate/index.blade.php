@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __(''),
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Affiliate</h3>
                            </div>

                            <div class="col-4 text-right">
                                <a href="{{route('affiliate.create')}}" class="btn btn-sm btn-primary">Add Affiliate</a>
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
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Icon</th>
                                <th scope="col" class="sort" data-sort="budget">Affiliate ID</th>
                                <th scope="col" class="sort" data-sort="status">Affiliate Name</th>
                                <th scope="col" class="sort" data-sort="completion">Affiliate Link</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($affiliates as $affiliate)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <a href="#" class="avatar rounded-circle mr-3">
                                            <img alt="Image placeholder" src="{{ $affiliate->affiliate_icon}}">
                                        </a>
                                    </div>
                                </th>
                                <td class="budget">
                                  {{$affiliate->affiliate_id}}
                                </td>
                                <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">{{$affiliate->affiliate_name}}</span>
                      </span>
                                </td>
                                <td>
                                    {{$affiliate->affiliate_link}}
                                </td>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{route('affiliate.edit',['id'=>$affiliate->id])}}">Edit</a>
                                            <a onclick="return confirm('Are you sure?')" class="dropdown-item show_confirm" href="{{route('affiliate.delete',['id'=>$affiliate->id])}}">Delete</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                        @if ($affiliates->hasPages())
                        <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-start mb-0">
                                <li class="page-item">Total: {{$affiliates->currentPage()}}/{{$affiliates->lastPage()}}</li>
                            </ul>
                            <ul class="pagination justify-content-end mb-0">
                                @if ($affiliates->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $affiliates->previousPageUrl() }}" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                @endif
                                    @for($page = 1; $page <= $affiliates->lastPage();$page++)
                                        @if($affiliates->currentPage() == $page)
                                            <li class="page-item active disabled">
                                                <a class="page-link" href="#">{{$page}}</a>
                                            </li>
                                        @else
                                            <li class="page-item active">
                                                <a class="page-link" href="{{$affiliates->url($page)}}">{{$page}}</a>
                                            </li>
                                        @endif

                                    @endfor
                                    @if ($affiliates->hasMorePages())

                                <li class="page-item">
                                    <a class="page-link" href="{{$affiliates->nextPageUrl()}}">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                                    @else
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#">
                                                <i class="fas fa-angle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    @endif
                            </ul>
                        </nav>
                    </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
@endsection
