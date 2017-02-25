@extends('layouts.main')

@section('page-content-wrapper')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                
    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT WIZARD -->
            <div class="panel panel-default">
                <div class="panel-body">   
                    <div class="wizard">
                        <ul>
                            <li>
                                <a href="#step-1">
                                    <span class="stepNumber">Grade 7</span>
                                    <span class="stepDesc">Grade 7<br/><small>Finalize grade 7 enrollment</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2">
                                    <span class="stepNumber">Grade 8</span>
                                    <span class="stepDesc">Grade 8<br/><small>Finalize grade 8 enrollment</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3">
                                    <span class="stepNumber">Grade 9</span>
                                    <span class="stepDesc">Grade 9<br/><small>Finalize grade 9 enrollment</small></span>                   
                                </a>
                            </li>
                            <li>
                                <a href="#step-4">
                                    <span class="stepNumber">Grade 10</span>
                                    <span class="stepDesc">Grade 10<br/><small>Finalize grade 10 enrollment</small></span>                   
                                </a>
                            </li>
                        </ul>
                        <div id="step-1">   
                            <h4>Summary</h4>
                            <form class="form-horizontal">
                                <div class="panel panel-default">
                                    <div class="panel-body form-group-separated">
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 col-xs-12 control-label">Total No. of Enrolled Students</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control"/>
                                                </div>                                            
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">                                        
                                            <label class="col-md-4 col-xs-12 control-label">Total Section Created</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                    <input type="text" class="form-control"/>
                                                </div>            
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">                                        
                                            <label class="col-md-4 col-xs-12 control-label">Total No. of Skipped Students (Excess)</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                    <input type="text" class="form-control"/>
                                                </div>            
                                                <span class="help-block">Students that needs to be manually enrolled</span>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <button type="button" class="btn btn-info">Enroll</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="step-2">
                            <h4>Summary</h4>
                            <form class="form-horizontal">
                                <div class="panel panel-default">
                                    <div class="panel-body form-group-separated">
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 col-xs-12 control-label">Total No. of Enrolled Students</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control"/>
                                                </div>                                            
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">                                        
                                            <label class="col-md-4 col-xs-12 control-label">Total Section Created</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                    <input type="text" class="form-control"/>
                                                </div>            
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">                                        
                                            <label class="col-md-4 col-xs-12 control-label">Total No. of Skipped Students (Excess)</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                    <input type="text" class="form-control"/>
                                                </div>            
                                                <span class="help-block">Students that needs to be manually enrolled</span>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <button type="button" class="btn btn-info">Enroll</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>                      
                        <div id="step-3">
                            <h4>Summary</h4>
                            <form class="form-horizontal">
                                <div class="panel panel-default">
                                    <div class="panel-body form-group-separated">
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 col-xs-12 control-label">Total No. of Enrolled Students</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control"/>
                                                </div>                                            
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">                                        
                                            <label class="col-md-4 col-xs-12 control-label">Total Section Created</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                    <input type="text" class="form-control"/>
                                                </div>            
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">                                        
                                            <label class="col-md-4 col-xs-12 control-label">Total No. of Skipped Students (Excess)</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                    <input type="text" class="form-control"/>
                                                </div>            
                                                <span class="help-block">Students that needs to be manually enrolled</span>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <button type="button" class="btn btn-info">Enroll</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="step-4">
                            <h4>Summary</h4>
                            <form class="form-horizontal">
                                <div class="panel panel-default">
                                    <div class="panel-body form-group-separated">
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 col-xs-12 control-label">Total No. of Enrolled Students</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                    <input type="text" class="form-control"/>
                                                </div>                                            
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">                                        
                                            <label class="col-md-4 col-xs-12 control-label">Total Section Created</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                    <input type="text" class="form-control"/>
                                                </div>            
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">                                        
                                            <label class="col-md-4 col-xs-12 control-label">Total No. of Skipped Students (Excess)</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                    <input type="text" class="form-control"/>
                                                </div>            
                                                <span class="help-block">Students that needs to be manually enrolled</span>
                                            </div>
                                            <div class="col-md-2 col-xs-12">
                                                <button type="button" class="btn btn-info">Enroll</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>                           

                    </div>
                </div>
            </div>                                       
            <!-- END DEFAULT WIZARD -->

        </div>
    </div>
</div>
<!-- PAGE CONTENT WRAPPER --> 
@stop

@section('this-page-plugins')
<script type="text/javascript" src="/js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>        
<script type="text/javascript" src="/js/plugins/jquery-validation/jquery.validate.js"></script>
@stop