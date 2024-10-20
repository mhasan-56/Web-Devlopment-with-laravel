@extends('layouts.dashboardmaster')

<x-breadcum slogan="Blog Show Page"></x-breadcum>
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-bordered border-primary mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>

                                    <th> Image</th>
                                    <th> Title </th>
                                    <th> Category Title </th>
                                    <th> Slug</th>
                                    <th>Action</th>
                                    <th> Status</th>
                                    <th> Feature</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($blogs as $blog)
                                 <tr>
                                     <th scope="row">
                                        {{  $blogs->firstItem() + $loop->index }}
                                     </th>
                                     <td>
                                        <img src="{{asset('uploads/blog')}}/{{$blog->image}}"style="width: 80px; height:80px;"</td>
                                     <td>
                                        {{$blog->title}}
                                    </td>
                                     <td>
                                        {{$blog->onecategory->title }}
                                    </td>
                                     <td>
                                        {{$blog->slug}}
                                    </td>
                                     <td><div class="d-flex justify-content-around">
                                         <a href="{{ route('blog.edit',$blog->id) }}" type="button" class="btn btn-outline-info waves-effect waves-light">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('blog.destroy',$blog->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger waves-effect waves-light">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div >
                                    </td>
                                            <td>
                                                <form action="{{ route('category.status',$blog->id) }}" method="POST" id="avengers,{{ $blog->id }}">
                                                    @csrf
                                               <div class="form-check form-switch">
                                                <input onchange="document.querySelector('#avengers{{ $blog->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $blog->status == 'active' ? 'checked' : '' }} >
                                                   <label class="form-check-label" for="flexSwitchCheckChecked">{{$blog->status}}</label>
                                                 </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{ route('blog.feature',$blog->id) }}" method="POST" id="avenger,{{ $blog->id }}">
                                                    @csrf
                                               <div class="form-check form-switch">
                                                <input onchange="document.querySelector('#avenger{{ $blog->id }}').submit()" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{ $blog->feature == 'active' ? 'checked' : '' }} >
                                                   <label class="form-check-label" for="flexSwitchCheckChecked">{{$blog->feature}}</label>
                                                 </div>
                                                </form>
                                            </td>

                                 </tr>
                               @endforeach

                            </tbody>

                            {{$blogs->links()}}
                        </table>
                    </div> <!-- end .table-responsive-->
                </div>
            </div>
        </div>
    </div>












@endsection
@section('script')
<script>
    @if (session('success'))

Toastify({
  text: "{{ session('success') }}",
  duration: 5000,
  destination: "https://github.com/apvarun/toastify-js",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "right", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  },
  onClick: function(){} // Callback after click
}).showToast();

</script>
@endif
@endsection
