@extends('backend\layout\app')
@section('content')

<div class="container">
    <div class="col-12">
        <form action="{{ route('category.update',$cat->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h3 class="card-title">Category Form</h3>
                <div class="row row-cards">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Type Name</label>
                            <input type="text" value="{{ $cat->type_name }}" name="type_name" class="form-control" placeholder="Type Name">
                            @if ($errors->has('type_name'))
                                <p class="text-danger">{{ $errors->first('type_name') }}</p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Choose File</label>
                            <input type="file" name="image" class="form-control" >
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update Category</button>
            </div>
        </form>
    </div>
</div>


@endsection
