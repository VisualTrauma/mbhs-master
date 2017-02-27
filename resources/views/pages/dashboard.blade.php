<?php  use Carbon\Carbon; ?>
@extends('layouts/main')



@section('breadcrumb')
<ul class="breadcrumb">
    <li class="active">Dashboard</li>
</ul>
@stop

@section('nav-dashboard') active @stop

@section('page-content-wrapper')
<div class="page-content-wrap">
<!-- START WIDGETS -->                    
<div class="row">
    @foreach($unenrolled as $count)
   <div class="col-md-3">                        
        <a href="#" class="tile 
        @foreach($color as $tilecolor)
            @if($loop->parent->index == $loop->index) 
                {{ $tilecolor }}
            @else 
                <?php continue; ?>
                @endif 
        @endforeach tile-valign">
            {{ count($count) }}
            <div class="informer informer-default"> 
            @foreach($count as $grade_level)
                 Grade {{ $grade_level->grade_level }} - Not yet enrolled
                 <?php break; ?>
            @endforeach 
            
             </div>
             <div class="informer informer-default dir-br"><span class="fa fa-check"> Updated 
            @foreach($latest as $dates)
                @foreach($dates as $date)
                    @if($grade_level->grade_level == $date->grade_level)  {{ $date->created_at->diffForHumans() }}  @endif
                    
                 <?php break; ?>
                @endforeach
                 <?php continue; ?>
            @endforeach
            </span></div>
        </a>                         
    </div>
@endforeach
<div class="col-md-3">
        <!-- START WIDGET SLIDER -->
        <div class="widget widget-default widget-carousel">
            <div class="owl-carousel" id="owl-example">
                <div>                                    
                    <div class="widget-title">Total Students</div>                                                                        
                    <div class="widget-subtitle">in the system</div>
                    <div class="widget-int">{{ $students->count() }}</div>
                </div>
                <div>                                    
                    <div class="widget-title">Male</div>
                    <div class="widget-subtitle">Students</div>
                    <div class="widget-int">{{ $male->count() }}</div>
                </div>
                <div>                                    
                    <div class="widget-title">Female</div>
                    <div class="widget-subtitle">Students</div>
                    <div class="widget-int">{{ $female->count() }}</div>
                </div>
            </div>                            
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>                             
        </div>         
        <!-- END WIDGET SLIDER -->
        
    </div>
    <div class="col-md-3">
        
        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-warning widget-padding-sm">
                <div class="widget-title">School has</div>
                <div class="widget-int num-count">{{ number_format($average, 2, '.', '') }}</div>
                <div class="widget-subtitle">Overall Grade Average</div>
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>                            
        <!-- END WIDGET MESSAGES -->
        
    </div>
    <div class="col-md-3">
        
        <!-- START WIDGET REGISTRED -->
        <div class="widget widget-default widget-item-icon">
            <div class="widget-item-left">
                <span class="fa fa-user"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count">{{ $teachers }}</div>
                <div class="widget-title">Registered teachers</div>
                <div class="widget-subtitle">On your system</div>
            </div>
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>                            
        </div>                            
        <!-- END WIDGET REGISTRED -->
        
    </div>
    <div class="col-md-3">
        
        <!-- START WIDGET CLOCK -->
        <div class="widget widget-danger widget-padding-sm">
            <div class="widget-big-int plugin-clock">00:00</div>                            
            <div class="widget-subtitle plugin-date">Loading...</div>
            <div class="widget-controls">                                
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>                                                       
        </div>                        
        <!-- END WIDGET CLOCK -->
</div>
<!-- END WIDGETS -->         
</div>    <!-- /row -->
</div> <!-- /page-content-wrapper -->
@stop

@section('scripts')
<script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>
<script type="text/javascript">
    $('.xn-search').hide();
</script>
@stop

