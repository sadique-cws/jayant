@extends('admin.adminbase')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Main</label>
                            <select name="parent_id" class="form-control">
                                <option value="null" selected>Main</option>
                                @foreach ($mainCategory as $cat)
                                    <option value="{{$cat->id}}">{{$cat->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                            @error('title')
                                <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">description</label>
                            <textarea name="description" class="form-control">{{old('description')}}</textarea>
                            @error('description')
                                <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success w-100">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>parent_id</th>
                        <th>action</th>
                    </tr>
                    @foreach ($categories as $cat)
                        <tr>
                            <th>{{$cat->id}}</th>
                            <th>{{$cat->title}}</th>
                            <th>@isset($cat->parents)
                                {{$cat->parents->title}}
                            @endisset</th>
                            <th>
                                <form action="{{route('category.destroy',['category'=>$cat->id])}}" method="POST" class="d-inline">
                                @csrf @method('delete')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                                
                                <a href="" class="btn btn-info">View</a>

                            </th>
                        </tr>
                    @endforeach
                </table>
        </div>  
    </div>
@endsection