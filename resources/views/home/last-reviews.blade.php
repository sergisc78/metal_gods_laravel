@include('home.home-navbar')


<table class="table table-last-reviews table-hover w-100 ms-auto me-auto mt-5">
  <thead>
    <tr>
      
      <th>Album</th>
      <th>Band</th>
      <th>Rate</th>
      <th>Author</th>
      <th>Date</th>
      <th class="text-center" >View</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($review as $reviews)


    <tr class="table-dark">

      <td>{{$reviews->album_title}}</td>
      <td>{{$reviews->band_name}}</td>
      <td>{{$reviews->updated_at}}</td>
      <td value={{$reviews->user_id}}>{{$reviews->name}}</td>
      <!-- <td><img height="300px" src="{{ url('albumImages/'.$reviews->album_image)}}" alt="albumImages"></td>-->
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

{{$review->links()}}





@include('admin.footer')