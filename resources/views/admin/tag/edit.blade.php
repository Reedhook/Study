@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('admin.tag.update',$tag->id)}}" method="POST" class="w-25">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <input type="text" name='title' class="form-control" placeholder="Введите тэг" value="{{$tag->title}}">
                                    @error('title')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <input type="submit"  class="btn btn-primary" value="Редактировать">
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </section>
        <!-- /.content -->
    </div>
@endsection
