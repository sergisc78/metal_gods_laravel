@include('user.navbar')


<div class="container c-form mt-5  d-flex justify-content-center">
  <div class="row-content">
    <div class="col-md-5 w-100">
      <div class="box-shadow bg-white p-4 div-form" id="addGenreform">
        <h3 class="mb-4 text-center fs-0.5 form-title">Add review </h3>


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
          <a href="{{url('user/reviews')}}"
            class="btn btn-primary back-cats w-50 mx-auto mt-3 mb-3 form-back">Reviews</a>
        </div>
        <form action="{{url('user/addReview')}}" method="post" enctype="multipart/form-data">
          @csrf

          <div class="form-group mt-3 text-center">
            <label for="band_name" class="form-label form-label-title">Band</label>
            <br>
            <select name="band_name" id="select" style="width: 300px" class="custom-select w-100 form-select" required>
              <option class="form-select"> -- Select Band -- </option>
              @foreach ($band as $bands)
              <option class="form-select" value="{{$bands->id}}">{{$bands->band_name}}</option>
              @endforeach
            </select>
            @error('band_name')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="genre_name" class="form-label form-label-title">Style</label>
            <br>
            <select name="genre_name" id="select" style="width: 300px" class="custom-select w-100 form-select">
              <option class="form-select"> -- Select Style-- </option>
              @foreach ($genre as $genres)
              <option class="form-select" class="form-select" value="{{$genres->id}}">{{$genres->genre_name}}</option>
              @endforeach
            </select>
            @error('genre_name')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="name" class="form-label form-label-title">User</label>
            <select name="name" id="select" style="width: 300px" class="custom-select w-100 form-select">
              <option class="form-select"> -- Select User-- </option>
              <!--<input class="form-control" type="text" name="user_id" id="band" value="{{ Auth::user()->id }}">-->
              <option class="form-select" value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
            </select>
            @error('name')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="band" class="form-label form-label-title">Album</label>
            <input class="form-control form-input-name border border-dark" type="text" name="album_title" id="band">
            @error('album_title')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="name" class="form-label form-label-title">Release Year</label><br>
            <input type="text" class="form-control form-input-name border border-dark" name="album_year" id="inputs"
              style="color:black">
            @error('album_year')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="name" class="form-label form-label-title">Internet link</label><br>
            <input type="text" name="album_link" class="form-control form-input-name border border-dark" id="inputs"
              style="color:black">
            @error('album_link')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="" class="form-label form-label-title">Review</label>
            <textarea class="form-control form-input-name border border-dark" name="album_review" id=""
              rows="6"></textarea>
            @error('album_review')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="name" class="form-label form-label-title">Rating (* out of 10)</label><br>
            <input type="text" name="rating" class="form-control form-input-name border border-dark" id="inputs"
              style="color:black">
            @error('rating')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="name form-label-title">Cover</label>
            <br>
            <input type="file" name="album_image" id="band_image" class="form-input-name">
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