<x-admin-master>
    @section('content')
   
        <h1>Create Post</h1>
<div>

        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" ria-describedby=""
                    placeholder="Enter Title">

            </div>
            <div class="form-group">File
                <label for="post_image"> </label>
                <input type="file" name="post_image"  id="post_image" class="form-control-file">

            </div>

            <div class="form-group">File
            <label for=""></label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>

            </div>




            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
        
    @endsection
</x-admin-master>
