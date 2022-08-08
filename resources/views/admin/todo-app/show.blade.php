<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container">
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title text-center">
            Detalle Todo-App
        </h3>
        
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="boder-button text-center pb-4">
                                <h3 class="page-title text-center ">
                                    {{$todoApp->name}}
                                </h3><br><br>
                                @if($todoApp->image)
                                <img src="{{asset($todoApp->image)}}" alt="{{$todoApp->name}}" class="img-fluid"><br>
                                @else
                                <h2 class="text-center">Sin imagen</h2>
                                @endif
                               
                            </div>
                            <div class="border-botton py-4">
                                {{-- <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">Sobre producto</button>
                                    <a href="{{route('providers.index')}}" class="btn btn-primary float-right">Regresars</a>
                                    <button type="button" class="list-group-item list-group-item-action">Registrar producto</button>
                                </div> --}}
                            </div>
                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        Status:
                                    </span>
                                    <span class="float-right text-muted">
                                        {{$todoApp->status}}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        fecha de creación:
                                    </span>
                                    <span class="float-right text-muted">
                                        {{-- PRODUCTOS POR CATEGORIA --}}
                                        {{$todoApp->created_at}}
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        fecha de actualización:
                                    </span>
                                    <span class="float-right text-muted">
                                        {{-- DETALLE DEL PROVEEDOR --}}
                                        {{$todoApp->updated_at}}
                                    </span>
                                </p>
                                
                            </div>
                            @if ($todoApp->status == 'COMPLETADA')
                                <button class="btn btn-success btn-block">{{$todoApp->status}}</button>
                                @else
                                <button class="btn btn-warning btn-block">{{$todoApp->status}}</button>
                                
                            @endif
                        </div>
                        <div class="col-lg-8">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="text-center">Informacion</h4>
                                    
                                </div>
                            </div>
                            
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">
                                    <div class="form-group col-md-12">
                                        <strong>
                                            <i class="fab fa-product-hunt mr-1"></i>
                                            descripción:
                                            {{-- 'code/','name/','stock/','image/','sell_price/','status','category_id','provider_id', --}}
                                        </strong>
                                        <p class="text-muted">
                                            {{$todoApp->description}}
                                        </p>
                                        <hr>
                                       
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                       
                    <a class="btn btn-primary float-right" href="{{route('todo-apps.index')}}">Regresar</a> 
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>



                    
