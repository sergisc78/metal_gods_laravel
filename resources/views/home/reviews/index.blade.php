@include('home.home-navbar')




<!--
<table class="table table-last-reviews table-hover w-100 ms-auto me-auto mt-5">
  <thead>
    <tr>

      <th>Album</th>
      <th>Band</th>
      <th>Rate</th>
      <th>Author</th>
      <th>Date</th>
      <th class="text-center">View</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($review as $reviews)


    <tr class="table-dark">

      <td>{{$reviews->album_title}}</td>
      <td>{{$reviews->band_name}}</td>
      <td>{{$reviews->updated_at}}</td>
      <td value={{$reviews->user_id}}>{{$reviews->name}}</td>
       <td><img height="300px" src="{{ url('albumImages/'.$reviews->album_image)}}" alt="albumImages"></td>
      <td>{{$reviews->rating}}</td>
      <td>
        <div class="text-center">
          <a class="btn btn-info edit" href="{{url('/admin/reviews/view-edit-review/'.$reviews->id)}}">VIEW</a>
        </div>
      </td>





    </tr>
    @endforeach



  </tbody>
</table>

<div class="me-3">
  
</div>-->


<div class="container mt-5" id="allbands">

<a href="{{url('/login')}}" class=" btn btn-outline-primary mt-3 mb-4 form-button">Write a review</a>
<a href="{{url('/report-an-error')}}" class="btn  btn-outline-danger mt-3 mb-4 form-button" title="Contact us if you have seen a mistake in any section">Report an error</a>
  
<div class="row">

    <div class="col-lg-12">
      <table id="table" class="table table-bordered display" width="100%">

        <thead>
          <tr style="color:white">
            <th>Album</th>
            <th>Band</th>
            <th>Rate</th>
            <th>Author</th>
            <th>Date</th>
            <th class="text-center">Review</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($review as $reviews)
          <tr>
            <td>{{$reviews->album_title}}</td>
            <td>{{$reviews->band_name}}</td>
            <td>{{$reviews->rating}}</td>
            <td value={{$reviews->user_id}}>{{$reviews->name}}</td>
            <td>{{$reviews->updated_at}}</td>
            

            {{--READ REVIEW--}}

            <td>
              <div class="text-center">
                <a class="btn btn-info edit form-button-index" href="{{url('/reviews/review/'.$reviews->id.'/'.str_replace(" ", "-", $reviews->band_name).'/'.  str_replace(" ", "-", $reviews->album_title))}}"">READ</a>
              </div>
            </td>

            


          </tr>
          @endforeach

        </tbody>
      </table>

    </div>

    <br>
    <br>
    <br>

    <!-- DATATABLES SCRIPT-->
    <script>
      $(document).ready(function () {
          $('#table').DataTable({
            "order": [[4, 'desc']],
          });
});
    </script>






    @include('home.footer')