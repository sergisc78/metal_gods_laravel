@include('user.navbar')

<div class="container" id="allbands">

  <a href="{{url('user/reviews/add-review')}}" class="btn  btn-primary mt-3 mb-4 form-button">Add review</a>
  <a href="{{url('user/reviews/your-reviews')}}" class="btn  btn-primary mt-3 mb-4 form-button">Your reviews</a>
  <a href="{{url('user/dashboard')}}" class="btn  btn-primary mt-3 mb-4 form-button">Dashboard</a>
  
  
  <div class="row">

    <div class="col-lg-12">
      <table id="table" class="table table-bordered display" width="100%">

        <thead>
          <tr style="color:white">
            <th>Album Title</th>
            <th>Band</th>
            <th>Data</th>
            <th>Author</th> 
            <th>Rating</th>
            <th>View or Edit Review</th>
            

          </tr>
        </thead>
        <tbody>
          @foreach ($review as $reviews)
          <tr>

            <td>{{$reviews->album_title}}</td>
            <td>{{$reviews->band_name}}</td>
            <td>{{$reviews->updated_at}}</td>
            <td value={{$reviews->user_id}}>{{$reviews->name}}</td>
           <!-- <td><img height="300px" src="{{ url('albumImages/'.$reviews->album_image)}}" alt="albumImages"></td>-->
            <td>{{$reviews->rating}}</td>


            {{--EDIT REVIEW--}}
            <td>
              <div class="text-center">
                <a class="btn btn-info edit" href="{{url('/user/reviews/view-edit-review/'.$reviews->id)}}">VIEW</a>
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

    <!-- BOOTSTRAP JS-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>


    <!-- DATATABLES SCRIPT-->
    <script>
      $(document).ready(function () {
          $('#table').DataTable();
});
    </script>

   


    @include('admin.footer')