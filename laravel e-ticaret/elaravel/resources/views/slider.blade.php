<section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                            <li data-target="#slider-carousel" data-slide-to="3"></li>
                            <li data-target="#slider-carousel" data-slide-to="4"></li>
                        
                        </ol>
                        
                        <div class="carousel-inner">
                        
                            <?php 
                            $all_slider=DB::table('tbl_slider')
                            ->where('publication_status',1)
                            ->get();
                                $i=1;
                                foreach($all_slider as $sl){

                                if($i==1){
                                ?>
                                <div class="item active">
                                <?php } 

                                else{?> 
                                <div  class="item">
                                <?php } ?>

                                <div class="col-sm-12">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($sl->slider_image)}}" 
                                    style="width: 95%; height: 420px;"   alt="" />
                                </div>

                                </div>
                                <?php $i++; } ?>
                                </div>
                            </div>

        <a href="#slider-carousel"  class="left control-carousel hidden-xs" data-slide="prev">
         <i style="margin-left: 45px;" class="fa fa-angle-left"></i>
         </a>
        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
        <i style="margin-right: 15px;" class="fa fa-angle-right"></i>
        </a>
        </div>                   
        </div>
        </div>
      
    </section><!--/slider-->