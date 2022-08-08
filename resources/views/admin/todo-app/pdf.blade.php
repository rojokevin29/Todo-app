<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .title {
            text-align: center;
            font: 2rem;
            color: blue
        }
        .tbody {
            text-align: center;
            font: 1rem;
            color: black
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 1;
            border: 1px solid #ddd;
            
        }
        table, th, td {
  border: 1px solid black;
  border-radius: 10px;
}
    </style>
    <title>Document</title>
</head>
<body>
    <div class="title"><h1>Listado</h1></div>
    <table class="table">
        <thead>
            <tr>
                
                <th>Nombre</th>
                
                <th>Estado</th>
                <th>Fecha de creacion</th>
                
            </tr>
        </thead>
        <tbody class="tbody">
            @if ($todoApps->count() == 0)
                <tr>
                    <td colspan="5" id="" class="text-center">No hay registros</td>
                </tr>
                
            @endif
            
        
            @foreach ($todoApps as $todoApp)
                <tr>
                   
                    <td><a href="{{route('todo-apps.show', $todoApp)}}">{{ $todoApp->name }}</a></td>
                    <td>
                        @if ($todoApp->status == 'PENDIENTE')
                            <span class="badge badge-warning">{{ $todoApp->status }}</span>
                        @else
                            <span class="badge badge-success">{{ $todoApp->status }}</span>
                        @endif
                    </td>
                    <td>{{ $todoApp->created_at }}</td>
                    
                </tr>
            @endforeach
            
        </tbody>
    </table>
</body>
</html>