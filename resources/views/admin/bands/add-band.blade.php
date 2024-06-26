@include('admin.navbar')


<div class="container c-form mt-5  d-flex justify-content-center">
  <div class="row-content">
    <div class="col-md-5 w-100">
      <div class="box-shadow bg-white p-4 div-form" id="addGenreform">
        <h3 class="mb-4 text-center fs-0.5 form-title ">Add Band</h3>


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
        <hr class="mt-4 border border-dark " style="color: black">
        <div class="text-center">
          <a href="{{url('admin/bands')}}" class="btn btn-primary back-cats w-50 mx-auto mt-3 mb-3 form-back">Bands</a>
        </div>
        
        <form action="{{url('admin/addBand')}}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-group mt-3 text-center">
            <label for="band" class="form-label form-label-title">Band</label>
            <input class="form-control form-input-name border border-dark" type="text" name="band_name" id="band"
              placeholder="Write a band">
            @error('band_name')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="band" class="form-label form-label-title">Country</label>
            <input class="form-control form-input-name border border-dark" type="text" name="band_country" id="band"
              placeholder="Write a band">
            @error('band_country')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="band" class="form-label form-label-title">Year of creation</label>
            <input class="form-control form-input-name border border-dark" type="text" name="band_year_creation"
              id="band" placeholder="Write a year">
            @error('band_year_creation')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="band" class="form-label form-label-title">Band Image</label>
            <input class="form-control form-input-name" type="file" name="band_image" id="band">
          </div>

          <div class="d-grid gap-2 mt-4">
            <button type="submit" name="add" id="add"
              class="btn btn-dark btn-lg border-0 rounded-0 form-button">Add</button>
          </div>


        </form>
      </div>
    </div>
  </div>
</div>

<br>
<br>

@include('admin.footer')