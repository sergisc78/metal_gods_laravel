@include('user.navbar')

<div class="container" id="allbands">

  <a href="{{url('user/reviews')}}" title="Reviews" class="btn  btn-outline-light mt-3 mb-4 form-button"><img src="{{url('img/metal-guitar.png')}}" width="40px" height="30px"  alt="dashboard_icon"></a>
  <a href="{{url('user/dashboard')}}" title="Dashboard" class="btn  btn-outline-light mt-3 mb-4 form-button"><img src="{{url('img/home.png')}}" width="40px" height="30px"  alt="dashboard_icon"></a>



  <div class="row">

    <div class="col-lg-12">
      <table id="table" class="table table-bordered display" width="100%">

        <thead>
          <tr style="color:white">
            <th class="text-center">Album Title</th>
            <th class="text-center">Band</th>
            <th class="text-center">Data</th>
            <th class="text-center">View or edit your review</th>
            <th>Delete Review</th>


          </tr>
        </thead>
        <tbody>
          @foreach ($review as $id=> $reviews)
          <tr>

            <td>{{str_replace('_','  ',$reviews->album_title)}}</td>
            <td>{{str_replace('_','  ',$reviews->band_name)}}</td>
            <td>{{$reviews->updated_at}}</td>
            <!-- <td value={{$reviews->user_id}}>{{$reviews->name}}</td>-->



            {{--VIEW / EDIT REVIEW--}}
            <td>
              <div class="text-center">
                <a class="btn btn-outline-light"
                  href="{{url('/user/reviews/your-reviews/view-edit-your-review/'.$reviews->id)}}" title="View / Edit" ><img src="{{url('img/demon_edit.png')}}" width="40px" height="40px" alt="demon_edit_icon"></a>
              </div>
            </td>

            {{--DELETE REVIEW --}}
            <td>
              <div class="text-center">
                <button class="btn btn-outline-light"
                  data-id={{'/user/reviews/your-reviews/'.$reviews->id}} title="Delete" ><img src="{{url('img/devil_delete.png')}}" width="40px" height="40px" alt="devil_delete_icon"></button>
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
     title: 'Are you sure you want to delete your review?',
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