@include ('admin.navbar')

<div class="container" id="allbands">

  <a href="{{url('admin/dashboard')}}" title="Dashboard" class="btn  btn-outline-light mt-3 mb-4 form-button"><img src="{{url('img/home.png')}}" width="40px" height="30px"  alt="dashboard_icon"></a>

  <div class="row">

    <div class="col-lg-12">
      <table id="table" class="table table-bordered display" width="100%">

        <thead>
          <tr style="color:white">
            
            <th class="text-center">Section</th>
            <th class="text-center">Email</th>
            <th class="text-center">Subject</th>
            <th class="text-center">Message</th>
            <th class="text-center">Data</th>
            <th class="text-center">Delete</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($report as $reports)
          <tr>
            <td>{{$reports->section_name}}</td>
            <td>{{$reports->email}}</td>
            <td>{{$reports->subject}}</td>
            <td>{{$reports->message}}</td>
            <td>{{$reports->updated_at}}</td>

            {{--DELETE REPORT --}}
            <td>
              <div class="text-center">
                <button class="btn btn-outline-light delete form-button-index" title="Delete report" data-id={{'/admin/bands/'.$reports->id}}><img src="{{url('img/devil_delete.png')}}" height="40px" width="50px" alt="devil_delete_icon"></button>
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
            "order":[4,'asc']
          });
});
    </script>

    <!-- SWEET ALERT SCRIPT -->

    <script>
      $('.delete').on('click', function (e) {
      e.preventDefault();
      const id = $(this).attr('data-id');
     swal({
      title: 'Are you sure you want to delete this report?',
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