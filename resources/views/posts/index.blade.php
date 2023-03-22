@extends('layouts.main')

@section('scriptheader')
    <style>
        .btn-maara{
            background-color:#01519F;
            color:white;
        }

        input[type="radio"] {
  display: none;
}

.image-collage {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    grid-auto-rows: 1fr;
    gap: 1rem;
}

@media screen and (max-width: 768px) {
    .image-collage {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    }
}

@media screen and (max-width: 576px) {
    .image-collage {
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
    }
}

.image-collage img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

    </style>
@endsection
  
@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row pt-2">
                <div class="col-md-12">
                    <h3 class="text-center">AutoParts Trading</h3>
                </div>
            </div>

            
            <div class="row pb-2 justify-content-center">
                <div class="col-md-6">
                    <form method="get" action="{{ route('posts.index') }}">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-4">
                                <a href="{{url('posts/form')}}" class="btn btn-block btn-warning"><i class="fas fa-camera"></i> Sell</a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-4">
                                <label class="btn btn-block btn-primary">
                                    <input type="radio" value="Find" {{ isset($filter['type']) && $filter['type'] == 'Find' ? 'checked' : '' }} name="type" onchange="this.form.submit()">Ask
                                </label>
                            </div>
                            <div class="col-md-4 col-sm-6 col-4">
                                <label class="btn btn-block btn-danger">
                                    <input type="radio" value="Sell" {{ (isset($filter['type']) && $filter['type'] == 'Sell') ? 'checked' : '' }} name="type" onchange="this.form.submit()">Buy
                                </label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <select name="sort" id="sort" class="form-control" onchange="this.form.submit()">
                                    <option value="">Sort</option>
                                    <option value="created_at,desc" {{ isset($filter['sort']) && $filter['sort'] == 'created_at,desc' && (!isset($filter['type']) || $filter['type'] == 'Sell') ? 'selected' : '' }}>Newest first</option>
                                    <option value="created_at,asc" {{ isset($filter['sort']) && $filter['sort'] == 'created_at,asc' && isset($filter['type']) && $filter['type'] == 'Find' ? 'selected' : '' }}>Oldest first</option>
                                </select>
                            </div>

                            <div class="col-md-6 col-sm-6 col-6">
                                <button type="button" class="btn btn-block btn-default" data-toggle="modal" data-target="#modal-filterstate"><i class="fas fa-filter"></i> Filter</button>
                            </div>
                            <div class="modal fade" id="modal-filterstate">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="modal-title">Filter State</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="">
                                            <div class="modal-body">
                                                <form action="">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>State</label>
                                                                <select name="state" class="form-control state" ></select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>District</label>
                                                                <select name="district" class="form-control district" ></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-block btn-primary btn-maara"><i class="fa fa-filter fa-fw"></i> Filter</button>
                                                </form>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 

            @foreach ( $posts as $keys=>$p)
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="user-block">
                                    @if ( $p->type == 'Sell')
                                        <img class="img-circle img-bordered-sm" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlNhWriwbuY5FCacpmGA56OSXA7fOjAXKQGWYPxYW-wF8HIvuDrM-ByRkmTo9pDl5f9SA&usqp=CAU" alt="user image">
                                    @else
                                        <img class="img-circle img-bordered-sm" src="https://www.system-concepts.com/wp-content/uploads/2018/09/Search-Icon-Blue.jpg" alt="user image">
                                    @endif
                                    <span class="username">{{ $p->name }}</span>
                                    <span class="description">{{date('j F, Y - g:i A', strtotime($p->created_at))}}</span>
                                    <span class="description"><i class="fa fa-map-marker-alt"></i> {{ $p->state }}, {{ $p->district }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{!! nl2br($p->description) !!}</p>

                                        <div class="image-collage">
                                            @foreach ( $postimage as $key=>$pi )
                                                @if ( $pi->postid == $p->id )
                                                <img class="d-block w-100" src="{{url('storage/post/'.$pi->name)}}" data-toggle="modal" data-target="#modal-photo{{ $pi->id }}">

                                                <div class="modal fade" id="modal-photo{{ $pi->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <p class="modal-title">Filter State</p>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img class="d-block w-100" src="{{url('storage/post/'.$pi->name)}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                @endif
                                            @endforeach
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

@endsection

@section('scriptfooter')
<script>
    $(document).ready(function() {
        getState();
    });

    $(document).on("change", "select[name=state]", function() {
        var state = $(this).val();
        getDistrict(state);
    });

    function getState() {
        $.ajax({
            url: "{{url('getState')}}",
            type: "GET",
            success: function(response) {
                var state = '';
                $.each(response, function(index,value) {
                    state += '<option value="'+value.state+'">'+value.state+'</option>'
                });
                $("select[name=state]").html('<option value="">-- Select State --</option>' + state);
            }
        });
    }

    function getDistrict(state) {
        $.ajax({
            url: "{{url('getDistrict')}}",
            type: "GET",
            data: " state=" + state,
            success: function(response) {
                var district = '';
                $.each(response, function(index,value) {
                    district += '<option value="'+value.district+'">'+value.district+'</option>'
                });
                $("select[name=district]").html('<option value="">-- Select District --</option>' + district);
            }
        });
    }
</script>
@endsection