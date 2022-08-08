<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="container">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title text-center">
                Vista Editar Todo-App
            </h3>
            
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <h1>Editar</h1>
                                @if($errors->any())
                                <div class="alert alert-danger">
                    
                                    <ul class="list-group">
                                        <p class="">Por favor corriga los siguientes errores</p>
                                        @foreach($errors->all() as $error)
                                            <li class="list-group-item text-danger">
                                                {{$error}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                <form action="{{route('todo-apps.update', $todoApp)}}" method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" value="{{$todoApp->name}}" class="form-control" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="description"  cols="40" rows="5"  class="form-control" placeholder="Description">{{$todoApp->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        
                                        <input type="file" name="image" id="image" class="form-control" placeholder="Ingrese la imagen" aria-describedby="helpId" >
                                        <small>imagen actual</small> <br>
                                        @if($todoApp->image)
                                        <img src="{{asset($todoApp->image)}}" width="80px" class="img-fluid img-thumbnail" alt="{{$todoApp->name}}">
                                            @else
                                            <img src="{{asset('storage/no-image.jpg')}}" width="100px">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="ESTADO">ESTADO</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="PENDIENTE" {{$todoApp->status == 'PENDIENTE' ? 'selected' : ''}}>PENDIENTE</option>
                                            <option value="COMPLETADA" {{$todoApp->status == 'COMPLETADA' ? 'selected' : ''}}>COMPLETADA</option>
                    
                                        </select>
                                    
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <a class="btn btn-primary" href="{{route('todo-apps.index')}}">Regresar</a> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
    

    