@include('admin.navbar')

<div class="container" id="allbands">

  <a href="{{url('admin/reviews/add-review/')}}" title="Add review" class="btn  btn-oultine-light mt-3 mb-4 form-button"><img src="{{url('img/pentagram.png')}}" width="40px" height="30px" alt="add_icon"></a>
  <a href="{{url('admin/dashboard')}}" title="Dashboard" class="btn  btn-outline-light mt-3 mb-4 form-button"><img src="{{url('img/home.png')}}" width="40px" height="30px"  alt="dashboard_icon"></a>

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
            <th>Delete Review</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($review as $reviews)
          <tr>

            <td>{{str_replace('_','  ',$reviews->album_title)}}</td>
            <td>{{str_replace('_','  ',$reviews->band_name)}}</td>
            <td>{{$reviews->updated_at}}</td>
            <td value={{$reviews->user_id}}>{{$reviews->name}}</td>
           <!-- <td><img height="300px" src="{{ url('albumImages/'.$reviews->album_image)}}" alt="albumImages"></td>-->
            <td>{{$reviews->rating}}</td>


            {{--EDIT REVIEW--}}
            <td>
              <div class="text-center">
                <a class="btn btn-outline-light edit" href="{{url('/admin/reviews/view-edit-review/'.$reviews->id)}}" title="View / Edit Review"><img src="{{url('img/demon_edit.png')}}" width="50px" height="40px" alt="demon_edit_icon"></a>
              </div>
            </td>


            {{--DELETE REVIEW --}}
            <td>
              <div class="text-center">
                <button class="btn btn-outline-light  delete" data-id={{'/admin/reviews/'.$reviews->id}} title="Delete review"><img src="{{url('img/devil_delete.png')}}" width="50px" height="40px" alt="devil_delete_icon"></button>
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
          $('#table').DataTable({
            "order": [[2, 'desc']]
          });
});
    </script>

    <!-- SWEET ALERT SCRIPT -->

    <script>
      $('.delete').on('click', function (e) {
      e.preventDefault();
      const id = $(this).attr('data-id');
     swal({
      title: 'Are you sure you want to delete this review?',
      text: "If you are, delete it!",
      icon: 'warning',
      buttons: true,
      dangerMode: true,
      }).then(function(value) {
      if (value) {
       window.location.href = id;
       }
      })
  });

    </script>


    @include('admin.footer')