<x-admin-master>

    @section('content')

    @if(Session::has('post-deleted-message'))
    <div class="alert alert-danger">{{Session::get('post-deleted-message')}}</div>
   
    @elseif(Session::has('post-created-message'))
    <div class="alert alert-success">{{Session::get('post-created-message')}}</div>

    @elseif(Session::has('post-updated-message'))
    <div class="alert alert-success">{{Session::get('post-updated-message')}}</div>

    @endif()

    {{-- <script>

 

    const flash = document.getElementById(id);

    setTimeout(function(){ flash }, 2000);
    </script> --}}

    <h1>All Posts</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Owner</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Body</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Delete</th>
                                <th>Edit</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Owner</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Body</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Delete</th>
                                <th>Edit</th>

                            </tr>
                        </tfoot>
                        <tbody>

                          @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->title}}</td>
                                <td><img height="40px" src="{{asset($post->post_image)}}" alt=""></td>
                                <td>{{$post->body}}</td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                                <td>

                                    {{-- @if(auth()->user()->id ===$post->user_id) --}}

                                    @can('view', $post)
                                  <form action="{{route('post.destroy', $post->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                  </form>

                                  
                                </td>
                                <td>
                                  <form action="/admin/posts/{{$post->id}}/edit" method="GET" enctype="multipart/form-data">
                                  
                                    <button class="btn btn-primary">Edit</button>
                                  </form>
                                  

                                  @endcan
                                  {{-- @endif --}}
                                  
                                </td>

                           
                               
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

      
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    
        @endsection

</x-admin-master>
