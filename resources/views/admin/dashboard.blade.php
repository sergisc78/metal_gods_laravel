@include('admin.navbar')


<div class="text-center dashboard-title justify-content-center align-content-center w-100">
    
  
    <p class="mt-5 choose-option">{{Auth::user()->name}}, choose an option</p>
   <div class="mt-4">
      <a href="{{url('admin/users')}}" class="btn btn-lg btn-dark me-2"><img src="{{url('img/users.png')}}" alt="users_icon" width="100px" height="50px" title="Users"></a>
      <a href="{{url('admin/reviews')}}" class="btn btn-lg  btn-dark me-2"><img src="{{url('img/document.png')}}" alt="review_icon" width="100px" height="50px" title="Reviews"></a>
      <a href="{{url('admin/bands')}}" class="btn btn-lg btn-dark"><img src="{{url('img/band.png')}}" alt="bands_icon" width="100px" height="50px" title="Bands"></a>
     
    </div>
    <div class="mt-4">
      <a href="{{url('admin/genres')}}" class="btn btn-lg  btn-dark me-2 mt-2 mb-4"><img src="{{url('img/devil.png')}}" width="100px" height="30px" alt="devil_icon" title="Genres"></a>
      <a href="{{url('admin/reports')}}" class="btn btn-lg  btn-dark me-2 mt-2 mb-4"><img src="{{url('img/demon.png')}}" width="100px"  height="50px" alt="demon_icon" title="Reports"></a>
    </div>
  
  </div>

  

  @include('admin.footer')