@extends('layouts.dashboardmaster')

@section('title')
Blog edit

@endsection


@section('content')<x-breadcum slogan="Blog Edit {{$blog->title}}"></x-breadcum>


<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Edit Blog</h4>

                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Blog Title</label>
                        <div class="col-sm-9">
                            <select class="form-control" data-toggle="select2" name="category_id">
                                <option>Select</option>
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    @forelse ($categories as $cat)
                                    <option {{ $blog->category_id == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->title }}</option>
                                    @empty

                                    @endforelse
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Blog Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Title" name="title"{{$blog->title}}>
                            @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Slug</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="slug" name="slug"{{$blog->slug}}>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Short Description</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="shortDescription" placeholder="Short  Description" name="short_description">{{$blog->short_description}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Blog  Description</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="blogDescription" placeholder="Description" name="description">{{$blog->description}}</textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputPassword5" class="col-sm-3 col-form-label">Blog Image</label>
                        <div class="col-sm-9">
                            <img id="cat_img" src="{{ asset('uploads/blog') }}/{{ $blog->thumbnail }}" alt="" style="height:300px;width:100%;object-fit:contain;margin:10px;0px;">
                            <input onchange="document.querySelector('cat_img').src=window.URL.createObjectURL(this.files[0])." type="file" class="form-control" id="inputPassword5" placeholder="" name="thumbnail">
                        </div>
                    </div>

                    <div class="justify-content-end row">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>







</div>


@endsection
@section('script')


<script>

    tinymce.init({
      selector: '#shortDescription',
      plugins: [
        // Core editing features
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        // Your account includes a free trial of TinyMCE premium features
        // Try the most popular premium features until Oct 22, 2024:
        'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      ],
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    });
  </script>
<script>

    tinymce.init({
      selector: '#blogDescription',
      plugins: [
        // Core editing features
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        // Your account includes a free trial of TinyMCE premium features
        // Try the most popular premium features until Oct 22, 2024:
        'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      ],
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    });
  </script>

@endsection
