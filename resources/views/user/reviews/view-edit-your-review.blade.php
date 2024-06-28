@include('admin.navbar')


<div class="container c-form mt-5  d-flex justify-content-center">
  <div class="row-content">
    <div class="col-md-5 w-100">
      <div class="box-shadow bg-white p-4" id="addGenreform">
        <h3 class="mb-4 text-center fs-0.5 form-title">View or edit your review </h3>


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
          <a href="{{url('admin/reviews')}}"
            class="btn btn-primary back-cats w-50 mx-auto mt-3 mb-3 form-back">Reviews</a>
        </div>
        <form action="{{url('admin/reviews/view-edit-review/'.$review->id)}}" method="post"
          enctype="multipart/form-data">
          @csrf

          <div class="form-group mt-3 text-center">
            <label for="band" class="form-label form-label-title">Band</label>
            <br>
            <select name="band_name" id="select" style="width: 300px" class="custom-select w-100">
              <option> -- Select Band -- </option>
              @foreach ($band as $bands)
              <option class="form-select" value="{{$bands->id}}" {{$bands->id==$review->band_id
                ?'selected':''}}>{{$bands->band_name}}
              </option>
              @endforeach
            </select>
          </div>
          <div class="form-group mt-3 text-center">
            <label for="band" class="form-label form-label-title">Style</label>
            <br>
            <select name="genre_name" id="select" style="width: 300px" class="custom-select w-100">
              <option> -- Select Style-- </option>
              @foreach ($genre as $genres)
              <option class="form-select" value="{{$genres->id}}" {{$genres->id==$review->genre_id
                ?'selected':''}}>{{$genres->genre_name}}
              </option>
              @endforeach
            </select>
          </div>

          <div class="form-group mt-3 text-center">
            <label for="band" class="form-label form-label-title">Album</label>
            <input class="form-control form-input-name border border-dark" type="text" name="album_title" id="band"
              value="{{$review->album_title}}">
            @error('album_title')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class=" form-group mt-3 text-center">
            <label for="name" class="form-label form-label-title">Release Year</label><br>
            <input type="text" class="form-control form-input-name border border-dark" name="album_year" id="inputs"
              style="color:black" required value="{{$review->album_year}}">
            @error('album_year')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class=" form-group mt-3 text-center">
            <label for="name" class="form-label form-label-title">Internet link</label><br>
            <input type="text" name="album_link" class="form-control form-input-name border border-dark" id="inputs"
              style="color:black" required value="{{$review->album_link}}">
            @error('album_link')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class=" form-group mt-3 text-center">
            <label for="" class="form-label form-label-title">Review</label>
            <textarea class="form-control form-input-name border border-dark" name="album_review" id=""
              rows="6">{{$review->album_review}}</textarea>
            @error('album_review')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label for="name" class="form-label form-label-title">Rating (* out of 10)</label><br>
            <input type="text" name="rating" class="form-control form-input-name border border-dark" id="inputs"
              style="color:black" required value="{{$review->rating}}">
            @error('rating')
            <span class="fs-0.2 text-danger error-message">{{$message}}</span>
            @enderror
          </div>

          <div class="form-group mt-3 text-center">
            <label class="form-label-title" for="name">Cover</label>
            @if (isset($review->album_image))
            <br>
            <img class="album-cover m-auto" src="{{url('albumImages/'.$review->album_image)}}" alt="album_image"
              width="150px" id="album_image_file">
            @endif
            <br>
            <input class="form-input-name" type="file" name="album_image" id="band_image">
          </div>

          <div class="d-grid gap-2 mt-4">
            <button type="submit" name="add" id="add"
              class="btn btn-dark btn-lg border-0 rounded-0 form-button">Edit</button>
          </div>


        </form>
      </div>
    </div>
  </div>
</div>

<br>
<br>

@include('admin.footer')