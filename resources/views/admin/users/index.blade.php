@include ('admin.navbar')

<div class="container" id="allbands">


  <a href="{{url('admin/dashboard')}}" class="btn  btn-primary mt-3 mb-4 form-button">Dashboard</a>

  <div class="row">

    <div class="col-lg-12">
      <table id="table" class="table table-bordered display" width="100%">

        <thead>
          <tr style="color:white">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Last connection</th>
            <th>Edit Role</th>
            <th>Delete User</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($user as $users)
          <tr>
            <td>{{$users->id}}</td>
            <td>{{$users->name}}</td>
            <td>{{$users->email}}</td>
            <td>{{$users->userRole}}</td>
            <td>{{$users->last_singIn}}</td>


            {{--EDIT USER ROLE--}}
            <td>
              <div class="text-center">
                <a class="btn btn-info edit" href="{{url('/admin/users/edit-role/'.$users->id)}}">EDIT</a>
              </div>
            </td>


            {{--DELETE USER --}}
            <td>
              <div class="text-center">
                <button class="btn btn-danger delete" data-id={{'/admin/users/'.$users->id}}>DELETE</button>
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
      title: 'Are you sure you want to delete this user?',
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