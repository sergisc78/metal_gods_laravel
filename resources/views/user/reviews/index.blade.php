@include('user.navbar')

<div class="container" id="allbands">

  <a href="{{url('user/reviews/add-review')}}" title="Add review" class="btn  btn-outline-light mt-3 mb-4 form-button"><img src="{{url('img/pentagram.png')}}" width="40px" height="30px" alt="add_icon"></a>
  <a href="{{url('user/reviews/your-reviews')}}" title="Your reviews" class="btn  btn-outline-light mt-3 mb-4 form-button"><img src="{{url('img/heavy-metal.png')}}" width="40px" height="30px" alt="your_reviews_icon"></a>
  <a href="{{url('user/dashboard')}}" title="Dashboard" class="btn  btn-outline-light mt-3 mb-4 form-button"><img src="{{url('img/home.png')}}" width="40px" height="30px"  alt="dashboard_icon"></a>
  <a href="{{url('user/report-an-error')}}" class="btn btn-danger mt-3 mb-4 form-button" title="Contact us if you have seen a mistake in any section"><img src="{{url('img/charlar.png')}}" width="40px" height="30px" alt="charlar_icon"></a>

  <div class="row">

    <div class="col-lg-12">
      <table id="table" class="table table-bordered display" width="100%">

        <thead>
          <tr style="color:white">
            <th class="text-center">Album Title</th>
            <th class="text-center">Band</th>
            <th class="text-center">Data</th>
            <th class="text-center">View Review</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach ($review as $reviews)
          <tr>

            <td>{{str_replace('_','   ',$reviews->album_title)}}</td>
            <td>{{str_replace('_','  ',$reviews->band_name)}}</td>
            <td>{{$reviews->updated_at}}</td>
            

            {{--VIEW REVIEW--}}
            <td>
              <div class="text-center">
                <a class="btn btn-outline-light edit" title="View review"
                  href="{{url('/user/reviews/view_review/'.$reviews->id.'/'.$reviews->band_name.'/'.$reviews->album_title)}}"><img src="{{url('img/demon_edit.png')}}" width="50px" height="20px" alt="demon_edit_icon"></a>
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
            "order":[2,'desc']
          });
});
    </script>




    @include('admin.footer')