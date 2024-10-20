
@extends('layouts.dashboardmaster')

@section('content')
<div class="row">
  <div class="col-xl-6">
    @if (session ('name_update'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        {{session ('name_update');}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card-body">
        <h5 class="header-title">Username</h5>


        <form action="{{route('profile.name.update')}}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingnameInput" placeholder="Enter Name" >
                <label for="floatingnameInput">Name</label>
                @error('name')
                <p class="text-danger">{{$message}}</p>

                @enderror
            </div>

        </div>
        <div>
            <button type="submit" class="btn btn-primary w-md">Submit</button>
        </div>
    </form>
</div>
<div class="col-xl-6">

    <div class="card-body">
        <h5 class="header-title">Password Update</h5>


        <form action="{{route('profile.password.update')}}" method="post">
            @csrf
            @if (session ('password_update'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{session ('password_update');}}
                @endif
                <div class="form-floating mb-3">
                    <input type="password" name="c_pass" class="form-control" id="floatingnameInput" placeholder="Enter Password" >
                    <label for="floatingnameInput">Current Password</label>
                    @error('c_pass')
                    <p class="text-danger">{{$message}}</p>

                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingnameInput" placeholder="Enter Password" >
                    <label for="floatingnameInput">New Password</label>
                    @error('password')
                    <p class="text-danger">{{$message}}</p>

                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password_conformation" class="form-control" id="floatingnameInput" placeholder="Enter Password" >
                    <label for="floatingnameInput">Confirm Password</label>
                    @error('password_conformation')
                    <p class="text-danger">{{$message}}</p>

                    @enderror
                </div>

            </div>
            <div>
                <button type="submit" class="btn btn-primary w-md">Submit</button>
            </div>
        </form>
    </div>
  </div>

  <div class="col-xl-6">
      @if (session ('image_update'))

      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="mdi mdi-check-all me-2"></i>
          {{session ('image_update');}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card-body">
            <h5 class="header-title">image upload</h5>


            <form action="{{route('profile.image.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="file" name="image" class="form-control" id="floatingnameInput" placeholder="Upload" >
                    <label for="floatingnameInput">Name</label>
                @error('email')
                <p class="text-danger">{{$message}}</p>

                @enderror
            </div>

        </div>
        <div>
            <button type="submit" class="btn btn-primary w-md">Submit</button>
        </div>
    </form>
</div>
</div>

<script>

const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Signed in successfully"
});
</script>

@endsection
