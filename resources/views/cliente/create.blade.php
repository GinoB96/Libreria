@extends('welcome')
@section('content')


<div class="titulo">
    <i class='fas fa-user-plus' style="font-size:48px;color:#28a745"></i>
    <h1> Nuevo cliente </h1>
</div>

    <div class=" container ">

        <form action="{{url('cliente/create/alta')}}">
            <div class="row">
                <div class="col-25">
                    <label for="id"> Apellido y Nombre o Razón Social </label>
                </div>
                <div class="col-75">
                    <input type="text" id="nombre_apellido" name="nombre_apellido" placeholder="Ingrese apellido y nombre o razón social del cliente..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="domicilio"> Domicilio </label>
                </div>
                <div class="col-75">
                    <input type="text" id="domicilio" name="domicilio" placeholder="Ingrese domicilio del cliente..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="id"> DNI o CUIT </label>
                </div>
                <div class="col-75">
                  
                  <input type="number" id="dni_cuit" name="dni_cuit" min=0 max=99999999999 placeholder="Ingrese DNI o CUIT del cliente.." style="width: 100%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;resize: vertical;">
                </div>
            </div>
           

            <div class="row">
			    <div class="col-25">
			            <label for="tel">Teléfono</label>
			    </div>
			    <div class="col-75">
			            <input type="number" id="telefono"  value="" name="telefono" placeholder="Ingrese teléfono del cliente.." min=0 style="width: 100%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;resize: vertical;">
			    </div>
			</div>

            <div class="row">
                <div class="col-25">
                    <label for="email"> Email </label>
                </div>
                <div class="col-75">
                    <input type="email"  id="email" value="" name="email" placeholder="Ingrese email del cliente.." style="width: 100%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;resize: vertical;">
                </div>
            </div>
            <br> 
            <div class="row">
                <div class="col-25">
                    <label for="tipoCliente"> Tipo cliente </label>
                </div>
                <div class="col-75">
                <select name="id_tipo_cliente" id="id_tipo_cliente">
                    @foreach ($Tipo_cliente as $item)
                        <option value="{{$item->id_tipo_cliente}}">{{$item->descripcion_cliente}} </option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="tipoFacultad"> Facultad </label>
                </div>
                <div class="col-75">
                <select name="id_tipo_facultad" id="id_tipo_facultad">
                    @foreach ($Tipo_facultad as $item)
                        <option value="{{$item->id_tipo_facultad}}">{{$item->descripcion_facultad}} </option>
                    @endforeach
                </select>
                </div>
            </div>

            <div align="right" style="margin-top: 10px;">
                <button type="submit" class="btn btn-success"  onclick="guardar()" id="btnAgregar" >Agregar</button>
            </div>

    </div>
    </form>

<script>

    window.addEventListener("load",validateForm(),verificarCliente());

    function validateForm(){
        var a = document.getElementById("nombre_apellido").value;
        var b = document.getElementById("domicilio").value;
        var c = document.getElementById("dni_cuit").value;
        var d = document.getElementById("telefono").value;
        var e = document.getElementById("email").value;
        if (a == null || a == "" || b == null || b == "" || c == null || c == "" || d == null || d == "" || e == null || e == "") {
            document.getElementById("btnAgregar").disabled = true;
        }else{
            document.getElementById("btnAgregar").disabled = false;
        }
        var refrescar= setTimeout(function(){validateForm()},100);
    }

    function verificarCliente(){
        if($('#id_tipo_cliente').val()!="1"){
            $('#id_tipo_facultad').removeAttr('readonly');
        }else{
            document.getElementById('id_tipo_facultad').value = "7";
            $('#id_tipo_facultad').attr('readonly',true);
        }
        var refrescar= setTimeout(function(){verificarCliente()},100);
    }
        
</script>
    
@endsection
