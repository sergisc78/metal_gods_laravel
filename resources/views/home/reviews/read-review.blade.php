@include('home.home-navbar')


<div class="container review-card" id="allbands">

  <a href="{{url('/report-an-error')}}" class="btn  btn-outline-danger mt-3 mb-4 form-button" title="Contact us if you have seen a mistake in any section">Report an error</a>
  <a href="{{url('/reviews')}}" class="btn btn-outline-primary mt-3 mb-4 float-end form-button">Back</a>





  <div class="card m-auto" style="width: 100%">
    @foreach ($review as $id=>$reviews)
    <h3 class="band_name_band_title text-center mb-3 mt-4">{{$reviews->band_name}} - {{$reviews->album_title}}
      ({{$reviews->album_year}}) </h3>

    <img src="{{ url('albumImages/'.$reviews->album_image)}}" alt="album_image" width="30%"
      class=" album-cover m-auto mb-2">

    <p class="review-creation text-center mb-2">Style : {{$reviews->genre_name}}</p>

    <p class="review-creation text-center mb-2">Review data: {{$reviews->updated_at}}</p>

    <p class="review-creation text-center mb-2">Review by: {{$reviews->name}}</p>

    <p class="review-creation text-center mb-2">Rating: {{$reviews->rating}} out of 10</p>

    <div class="card-body">

      <p class="review mb-4" style="text-align: justify ">{{$reviews->album_review}}</p>

      <p class="review-link text-center"><a class="youtube-link" href="{{$reviews->album_link}}" target="_blank">Dou you
          want to
          listen this album? </a></p>
    </div>
    @endforeach
    <br>
    <br>
  </div>






  @include('home.footer')