@extends('admin_layout')
@section('admin_content')

<!-- MENU SECTION -->
<div id="left" >
    <div class="media user-media well-small">
        <a class="user-link" href="#">
            <img class="media-object img-thumbnail user-img" alt="User Picture" 
            src="{{URL::to('backend/assets/img/user.gif')}}" />
        </a>
        <br />
        <div class="media-body">
            <h6 style="font-size:16px; font-weight:bold; color:black;">{{Session::get('admin_name')}}</h6>
          
            <ul class="list-unstyled user-info">             
                <li>
                     <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Çevirimiçi
                   
                </li>
               
            </ul>
        </div>
        <br />
    </div>

    <ul id="menu" class="collapse">

        <li class="panel active">
            <a href="{{URL::to('/dashboard')}}" >
                <i class="icon-table"></i> Dashboard
            </a>                   
        </li>

        <li class="panel ">
            <a href="{{URL::to('/category-all')}}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                <i class="icon-tasks"> </i> Category     
            </a>         
        </li>

        <li class="panel ">
            <a href="{{URL::to('/manufacture-all')}}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                <i class="icon-pencil"></i> Manufacture
            </a>          
        </li>

        <li class="panel ">
            <a href="{{URL::to('/product-all')}}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                <i class="icon-pencil"></i> Product
            </a> 
        </li>

        <li class="panel ">
            <a href="{{URL::to('/slider-all')}}" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                <i class="icon-pencil"></i> Slider
            </a> 
        </li>

    </ul>
</div>
<!--END MENU SECTION -->
	<!--PAGE CONTENT -->
	<div id="content">  
	    <div class="inner" style="min-height: 700px;">
	        <div class="row">
	            <div class="col-lg-12 text-center">
	                <h1> Category Edit </h1>
	            </div>
	        </div>
	        <hr />
	        <!--BLOCK SECTION -->
	        <div class="row">
	            <div class="col-lg-12">    	                              
                    <form action="/update-slider/{{$slider_edit->slider_id}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="slider_id" value="{{$slider_edit->slider_id}}">

                        <div class="form-group">
                                <div class="input-group mb-3">
                                    <label>Slider İmage</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="slider_image" value="{{$slider_edit->slider_image}}">
                                    </div>                        
                                </div>
                        </div>

                        <div class="form-group">
                                    <label>Publication Status</label>
                                    <input type="checkbox" name="publication_status" value="1" 
                                    class="form-control-file" required="">
                        </div>

					  	<button class="btn text-muted text-center btn-success" type="submit">Edit</button>
					</form>
                    </div>     				
	            </div>
	        </div>
	          <!--END BLOCK SECTION -->      
	    </div>
	</div>
	<!--END PAGE CONTENT -->
 
@endsection