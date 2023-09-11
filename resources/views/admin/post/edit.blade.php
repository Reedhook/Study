@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Updating</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.post.update',$post->id)}}" method="POST" class="w-25">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" name='title' class="form-control"
                                       placeholder="Name of Post" value="{{$post->title}}">
                                @error('title')
                                <div class="text-danger">Нужно ввести значение в поле</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content" >{{$post->content}} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile" >Загрузить изображение</label>
                                <div class="w25">
                                    <img src="{{asset('storage/'.$post->image)}}" alt="image">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Выбрать файл</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label> Выбор категории</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                            {{$category->id==$post->category_id?'selected':''}}>{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Выбор тэга</label>
                                <select class="select2 select2-hidden-accessible" name="tag_ids[]" multiple=""
                                        data-placeholder="Выберите тэги" style="width: 100%;" data-select2-id="7"
                                        tabindex="-1" aria-hidden="true">
                                    @foreach($tags as $tag)
                                        <option {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluk('id')->toArray())?'selected' : '' }}value="{{$tag->id}}" >{{$tag->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
