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

@include('home.buttons_1')
  
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
            <td>{{str_replace('_','  ',$reviews->album_title)}}</td>
            <td>{{str_replace('_','  ',$reviews->band_name)}}</td>
            <td>{{$reviews->rating}}</td>
            <td value={{$reviews->user_id}}>{{$reviews->name}}</td>
            <td>{{$reviews->updated_at}}</td>
            

            {{--READ REVIEW--}}

            <td>
              <div class="text-center">
                <a class="btn btn-ligth edit form-button-index" title="Read review" href="{{url('/reviews/review/'.$reviews->id.'/'.str_replace(" ", "-", $reviews->band_name).'/'.  str_replace(" ", "-", $reviews->album_title))}}""><img src="{{url('img/pentagram.png')}}" height="40px" alt="read_review"></a>
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