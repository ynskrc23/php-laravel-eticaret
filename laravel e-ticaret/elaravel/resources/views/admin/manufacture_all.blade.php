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
                        <h1> Manufacture Dashboard </h1>
                    </div>
                </div>
                <hr />
                <!--BLOCK SECTION -->
                <div class="row">
                    <div class="col-lg-12">                                  
                        <a class="btn btn-success" href="/manufacture-add">Add</a>
                    </div>
                </div>
                  <!--END BLOCK SECTION -->
                <hr />

                 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Manufacture ID</th>
                                            <th>Manufacture Name</th>
                                            <th>Manufacture Description</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    @foreach($all_manufacture as $m)
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td> {{$m->manufacture_id}} </td>
                                            <td> {{$m->manufacture_name}} </td>
                                            <td> {{$m->manufacture_description}} </td>

                                            <td class="center">
                                                @if($m->publication_status==1)
                                                <button class="btn btn-success btn-sm"> Active</button> 
                                                @else                                       
                                                <button class="btn btn-danger btn-sm"> Unactive</button> @endif
                                            </td> 

                                            <td class="center">                                        
                                                <a href="{{URL::to('/edit-manufacture/'.$m->manufacture_id)}}" class="btn btn-info btn-sm"> Update  </a>

                                                <a href="{{URL::to('/delete-manufacture/'.$m->manufacture_id)}}" class="btn btn-danger btn-sm"> Delete  </a>
                                            </td> 
                                        </tr>                                    
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </div>
        <!--END PAGE CONTENT --> 
   
@endsection