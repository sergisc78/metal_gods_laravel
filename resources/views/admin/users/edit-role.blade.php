@include('admin.navbar')


<div class="container c-form mt-5  d-flex justify-content-center">
  <div class="row-content">
    <div class="col-md-5 w-100">
      <div class="box-shadow bg-white p-4" id="addGenreform">
        <h3 class="mb-4 text-center fs-0.5 form-title">Edit User Role </h3>


        <!--MESSAGE OF SUCCESS-->
        @if (session()->has('message'))
        <div class="alert alert-dismissible alert-success text-center" style="style="
          margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;font-size:18px;font-family: Montserrat,
          sans-serif;">
          {{session()->get('message')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" style="float:end">

          </button>
        </div>

        @endif
        <hr class="mt-4" style="background-color: whitesmoke">
        <div class="text-center">
          <a href="{{url('admin/users')}}" class="btn btn-primary back-cats w-50 mx-auto mt-3 mb-3 form-back">Users</a>
        </div>
        <form action="{{url('admin/users/edit-role/'.$user->id)}}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-group mt-3">
            <label for="genre" class="form-label form-label-title">Username</label>
            <input class="form-control form-input-name border border-dark" name="name" id="name" disabled value="{{$user->name}}">
          </div>
          
          <div class="form-group mt-3">
            <label for="genre" class="form-label form-label-title">Role</label>
            <input class="form-control form-input-name border border-dark" name="userRole" id="userRole" value="{{$user->userRole}}">
            @error('userRole')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="d-grid gap-2 mt-4">
            <button type="submit" name="add" id="add" class="btn btn-dark btn-lg border-0 rounded-0 form-button">Edit</button>
          </div>


        </form>
      </div>
    </div>
  </div>
</div>

<br>
<br>



@include('admin.footer')