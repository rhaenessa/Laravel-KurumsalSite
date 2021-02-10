@extends('layouts.admin')
@section('title','Content')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h1>Content</h1>

                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Content Table</div>
                    </div>
                    <div class="card-body">
                        <div class="card-sub">
                            <a href="{{ route('admin_content_add')}}" class="btn btn-default" style="width: 200px;">Add Content</a>
                        </div>
                        <table class="table mt-3">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category</th>
                                <th scope="col">Title</th>
                                <th scope="col">Keywords</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Image Gallery</th>

                                <th scope="col">Type</th>
                                <th scope="col">UserId</th>
                                <th scope="col">Status</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $datalist as $rs)
                                <tr>
                                    <td>{{ $rs->id }}</td>
                                    <td>{{\App\Http\Controllers\Admin\MenuController::getParentsTree($rs->menu,$rs->menu->title)}}</td>
                                    <td>{{ $rs->menu->title}}</td>

                                    <td>{{ $rs->keywords }}</td>
                                    <td>{{ $rs->description }}</td>
                                    <td>

                                        @if( $rs->image )
                                            <img src="{{ Storage::url($rs->image) }}" height="40" alt="">
                                        @endif

                                    </td>
                                    <td><a href="{{ route('admin_image_add', ['content_id' => $rs->id]) }}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100, height=700')"><img src="{{asset('assets/admin/img')}}/gallery-image.png" height="30" width="30" style="text-align: center;" alt=""></a> </td>

                                    <td>{{ $rs->type }}</td>
                                    <td>{{ $rs->user_id }}</td>
                                    <td>{{ $rs->status }}</td>
                                    <td><a href="{{ route('admin_content_edit', ['id' => $rs->id]) }}">Edit</a></td>
                                    <td><a href="{{ route('admin_content_delete', ['id' => $rs->id]) }}" onclick="return confirm('Delete. Are you sure?')">Delete</a></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    </div>

@endsection
