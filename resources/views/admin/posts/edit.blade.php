<x-admin-master>
    @section('content')
   
        <h1>Edit Post</h1>
<div>

        <form method="post" action="/admin/posts/{{$post->id}}/update" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" ria-describedby=""
                    placeholder="Enter Title" value="{{$post->title}}">

            </div>
            <div class="form-group">
                <label for="post_image">File</label>
                <div> <img height="200px" src="{{$post->post_image}}" alt="Image"></div>
                <input type="file" name="post_image"  id="post_image" class="form-control-file">

            </div>

            <div class="form-group">
            <label for="">Content</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10"   >{{$post->body}}</textarea>

            </div>




            <button type="submit" class="btn btn-primary">Update</button>


        </form>
        
    @endsection
</x-admin-master>
