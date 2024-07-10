@include('admin.navbar')


<div class="text-center dashboard-title justify-content-center align-content-center w-100">
    
  
    <p class="mt-5 choose-option">{{Auth::user()->name}}, choose an option</p>
    <div class="buttons mt-5">
      <a href="{{url('admin/users')}}" class="btn btn-lg btn-dark me-2"><img src="{{url('img/metal_heads.jpeg')}}" alt="metal_heads_image" title="Users"></a>
      <a href="{{url('admin/reviews')}}" class="btn btn-lg  btn-dark me-2"><img src="{{url('img/heavy_reviews.jpeg')}}" alt="metal_albums_image" title="Reviews"></a>
      <a href="{{url('admin/bands')}}" class="btn btn-lg  btn-dark"><img src="{{url('img/metal_bands.jpeg')}}" alt="metal_bands_image" title="Bands"></a>
      
      <a href="{{url('admin/genres')}}" class="btn btn-lg  btn-dark me-2 mt-2 mb-4"><img src="{{url('img/metal_genres.jpeg')}}" alt="metal_genres_image" title="Genres"></a>
      <a href="{{url('admin/reports')}}" class="btn btn-lg  btn-dark me-2 mt-2 mb-4"><img src="{{url('img/metal_report.jpeg')}}" alt="metal_reports_image" title="Reports"></a>
    </div>
  
  </div>

  @include('admin.footer')