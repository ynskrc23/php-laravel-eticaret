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
                        <h1> Admin Dashboard </h1>
                    </div>
                </div>
                <hr />
                <!--BLOCK SECTION -->
                <div class="row">
                    <div class="col-lg-12">
                        <div style="text-align: center;">                
                            <a class="quick-btn" href="#">
                                <i class="icon-check icon-2x"></i>
                                <span> Products</span>
                                <span class="label label-danger">2</span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-envelope icon-2x"></i>
                                <span>Messages</span>
                                <span class="label label-success">456</span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-signal icon-2x"></i>
                                <span>Profit</span>
                                <span class="label label-warning">+25</span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-external-link icon-2x"></i>
                                <span>value</span>
                                <span class="label btn-metis-2">3.14159265</span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-lemon icon-2x"></i>
                                <span>tasks</span>
                                <span class="label btn-metis-4">107</span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-bolt icon-2x"></i>
                                <span>Tickets</span>
                                <span class="label label-default">20</span>
                            </a>   
                        </div>
                    </div>
                </div>
                  <!--END BLOCK SECTION -->
                <hr />
            </div>
        </div>
        <!--END PAGE CONTENT -->
@endsection