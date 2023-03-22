@extends('layouts.main')

@section('scriptheader')
    <style>
        .btn-maara{
            background-color:#01519F;
            color:white;
        }
    </style>
@endsection
  
@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row pt-2 justify-content-md-center">
                <div class="col-md-6 ">
                    <form method="POST" action="{{url('posts/store')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Create Post</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Enter your name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Phone No.</label>
                                            <input type="text" class="form-control" placeholder="Enter phone number" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Post Type</label>
                                            <select class="form-control" name="type">
                                                <option value="">-- Select Type --</option>
                                                <option value="Find">Find Item</option>
                                                <option value="Sell">Sell Item</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" placeholder="Buy or Sell?" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>State</label>
                                            <select name="state" class="form-control" ></select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>District</label>
                                            <select name="district" class="form-control" ></select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Upload Photos</label>
                                            <div class="input-group control-group increment" >
                                                <input type="file" class="form-control" name="imagefile[]" accept="image/*" multiple>
                                                <span class="input-group-append">
                                                    <button class="btn btn-success btn-flat" type="button"><i class="nav-icon fas fa-plus"></i></button>
                                                </span>
                                            </div>
                                            <div class="clone hide">
                                                <div class="control-group input-group" style="margin-top:10px">
                                                    <input type="file" class="form-control" name="imagefile[]" accept="image/*" multiple>
                                                    <span class="input-group-append">
                                                        <button class="btn btn-danger btn-flat" type="button"><i class="nav-icon fas fa-trash"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer justify-content-between">
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

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
<script>
    $(document).ready(function() {
            $(".btn-success").click(function(){ 
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click",".btn-danger",function(){ 
                $(this).parents(".control-group").remove();
            });
        });
</script>
@endsection