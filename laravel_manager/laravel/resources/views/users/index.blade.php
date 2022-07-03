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
                                <h3 class="mb-0">Users</h3>
                            </div>
                            @if(auth()->user()->is_admin)
                            <div class="col-4 text-right">
                                <a href="{{route('register')}}" class="btn btn-sm btn-primary">Add User</a>
                            </div>
                            @endif
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
                                    <th scope="col" class="sort" data-sort="name">NAME</th>
                                    <th scope="col" class="sort" data-sort="budget">EMAIL</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="sort" data-sort="status">CREATION DATE</th>
                                    <th class="text-right" scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                               {{$user->name}}
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{$user->email}}
                                        </td>

                                        <td class="budget">
                                            @if($user->is_active)
                                                Actived
                                            @else
                                                Inactive
                                            @endif
                                        </td>

                                        <td class="budget">
                                            {{date('d-m-Y', strtotime($user->created_at))}}
                                        </td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{route('user.info',['id'=> getBase64Encode($user->id)])}}">Edit</a>
                                                    @if(auth()->user()->is_admin)
                                                    <a class="dropdown-item" href="{{route('user.active',['id'=>getBase64Encode($user->id)])}}">
                                                        @if(!$user->is_active)
                                                            Activetion
                                                        @else
                                                            Unactive
                                                        @endif
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Card footer -->
                        @if ($users->hasPages())
                            <div class="card-footer py-4">
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-start mb-0">
                                        <li class="page-item">Total: {{$users->currentPage()}}/{{$users->lastPage()}}</li>
                                    </ul>
                                    <ul class="pagination justify-content-end mb-0">
                                        @if ($users->onFirstPage())
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">
                                                    <i class="fas fa-angle-left"></i>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $users->previousPageUrl() }}" tabindex="-1">
                                                    <i class="fas fa-angle-left"></i>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                        @endif
                                        @for($page = 1; $page <= $affiliates->lastPage();$page++)
                                            @if($users->currentPage() == $page)
                                                <li class="page-item active disabled">
                                                    <a class="page-link" href="#">{{$page}}</a>
                                                </li>
                                            @else
                                                <li class="page-item active">
                                                    <a class="page-link" href="{{$users->url($page)}}">{{$page}}</a>
                                                </li>
                                            @endif

                                        @endfor
                                        @if ($users->hasMorePages())

                                            <li class="page-item">
                                                <a class="page-link" href="{{$users->nextPageUrl()}}">
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
