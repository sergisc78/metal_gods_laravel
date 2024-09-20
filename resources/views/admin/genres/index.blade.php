@include ('admin.navbar')

<div class="container" id="allbands">

  <a href="{{url('admin/genres/add-genre')}}" title="Add genre" class="btn  btn-outline-light mt-3 mb-4 form-link"><img src="{{url('img/pentagram.png')}}" width="40px" height="30px" alt="add_icon"></a>
  <a href="{{url('admin/dashboard')}}" title="Dashboard" class="btn  btn-outline-light mt-3 mb-4 form-button"><img src="{{url('img/home.png')}}" width="40px" height="30px"  alt="dashboard_icon"></a>
  <div class="row">

    <div class="col-lg-12">
      <table id="table" class="table table-bordered display" width="100%">

        <thead>
          <tr style="color:white">
            <th>ID</th>
            <th>Genre</th>
            <th>Edit Genre</th>
            <th>Delete Genre</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($genre as $genres)
          <tr>
            <td>{{$genres->id}}</td>
            <td>{{$genres->genre_name}}</td>


            {{--EDIT GENRE--}}
            <td>
              <div class="text-center">
                <a class="btn btn-outline-light edit form-button-index" title="Edit genre" href="{{url('/admin/genres/edit-genre/'.$genres->id)}}"><img src="{{url('img/demon_edit.png')}}" height="50px" width="50px" alt="demon_edit_icon"></a>
              </div>
            </td>


            {{--DELETE GENRE --}}
            <td>
              <div class="text-center">
                <button class="btn btn-outline-light delete form-button-index" title="Delete genre" data-id={{'/admin/genres/'.$genres->id}}><img src="{{url('img/devil_delete.png')}}" width="50px" height="40px" alt="devil_delete_icon"></button>
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

    <!-- SWEET ALERT SCRIPT -->

    <script>
      $('.delete').on('click', function (e) {
  e.preventDefault();
  const id = $(this).attr('data-id');
  swal({
      title: 'Are you sure you want to delete this genre?',
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