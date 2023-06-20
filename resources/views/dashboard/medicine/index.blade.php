@extends('layouts.startmin')
@section('content')
<div class="row">
    <div class="col-lg-12" id="createData">
        <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" >
                    <form method="POST" id="createForm" enctype="multipart/form-data">
                        <div class="modal-header">
                            <button type="button" class="close"
                            data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" style="text-align: center; background-color: silver; border-radius: 15px 50px 30px; padding: 15px;">Create New Medicine</h4>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-danger" style="display: none">
                                <ul>
                                </ul>
                            </div>
                            @csrf
                            <div class="form-group">
                                <label for="name">Generic Name</label>
                                <input id="generic_name" name="generic_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="form">Form</label>
                                <input id="form" name="form" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="restriction_formula">Restriction Formula</label>
                                <input id="restriction_formula" name="restriction_formula" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" id="price" name="price" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" name="description" rows="5" style="resize: none"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select id="category" name="category" class="form-control">
                                    @foreach($category as $c)
                                        <option value="{{ $c -> id }}">{{ $c -> name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Faskes</label>
                                <div class="checkbox-list">
                                    <label for="faskes1" class="checkbox-inline">
                                    <input type="checkbox" id="faskes1" name="faskes1" value="1"> Faskes 1 </label>
                                    <label for="faskes2" class="checkbox-inline">
                                    <input type="checkbox" id="faskes2" name="faskes2" value="1"> Faskes 2 </label>
                                    <label for="faskes3" class="checkbox-inline">
                                    <input type="checkbox" id="faskes3" name="faskes3" value="1"> Faskes 3 </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="saveDataCreateTD()">Submit</button>
                                <button type="button" class="btn btn-default" onclick="clearInput()" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="modalContent">
                    <div style="text-align:center">
                    </div>
                </div>
            </div>
        </div>
        <h1 class="page-header">Medicine Catalog
            <a href="#modalCreate" data-toggle="modal" class="btn btn-success" style="float: right;">Create New Medicine</a>
        </h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="alert alert-success" id="pesan" style="display: none"></div>
        <div class="alert alert-danger" id="error" style="display: none"></div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                List of Medicines
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Generic Name</th>
                                <th>Form</th>
                                <th>Restriction Formula</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Faskes 1</th>
                                <th>Faskes 2</th>
                                <th>Faskes 3</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach($data as $d)
                                <tr class="odd gradeX" id="tr_{{ $d->id }}">
                                    <td>{{ $d -> id  }}</td>
                                    <td id="td_name_{{ $d -> id }}">{{ $d -> generic_name }}</td>
                                    <td id="td_form_{{ $d -> id }}">{{ $d -> form }}</td>
                                    <td id="td_restriction_formula_{{ $d -> id }}">{{ $d -> restriction_formula }}</td>
                                    <td id="td_price_{{ $d -> id }}">{{ $d -> price }}</td>
                                    <td id="td_image_{{ $d -> id }}" style="text-align: center;">

                                        @if($d->image)
                                            <img src="{{ asset('img/medicine-images/'.$d->image) }}" alt="{{ $d->generic_name }}" style="height: 70px">
                                        @else
                                            <b>(No image)</b>
                                        @endif
                                        {{-- Modal change image medicine --}}
                                        <div class="modal fade" id="modalChange_{{ $d->id }}" tabindex="-1" role="basic" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="POST" id="changeImageForm" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Change Image</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="alert alert-danger" style="display: none">
                                                            <ul>
                                                            </ul>
                                                        </div>
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Image</label>
                                                            <input type="file" class="form-control" id="image" name="image">
                                                            <input type="hidden" name="id" id="id" value="{{ $d->id }}">
                                                            <input type="hidden" name="oldImage" value="{{ $d->image }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" onclick="changeImage({{ $d->id }})">Change</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clearError('modalChange_{{ $d->id }}')">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                            </div>
                                            <br>
                                            <span>
                                                <a href="#modalChange_{{ $d->id }}" data-toggle="modal" class="btn btn-xs btn-default">Change</a>
                                            </span>
                                    </td>
                                    <td id="td_faskes1_{{ $d ->id }}">
                                        @if ($d -> faskes1 == 1)
                                            <div style="text-align: center;" >
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td id="td_faskes2_{{ $d ->id }}">
                                        @if ($d -> faskes2 == 1)
                                            <div style="text-align: center;">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td id="td_faskes3_{{ $d ->id }}">
                                        @if ($d -> faskes3 == 1)
                                            <div style="text-align: center;" >
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td id="td_category_{{ $d->id }}">{{ $catWithThrased[$d->category_id-1]->name }}</td>
                                    <td style="text-align: center">
                                        <a href="#modalEdit" data-toggle="modal" class="btn btn-xs btn-warning" onclick="getEditForm({{ $d->id }})"><i class="fa fa-pencil"></i></a>
                                    </td>
                                    <td style="text-align: center">
                                        <a class="btn btn-xs btn-danger" onclick="if(confirm('Are you sure you want to delete this record?')) deleteData({{ $d->id }})"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="modal fade" id="seeimage_{{ $d -> id }}" tabindex="-1" role="basic" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                        data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title" style="text-align: center; background-color: silver; border-radius: 15px 50px 30px; padding: 15px;">{{ $d -> generic_name }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div style="padding: 15px; text-align: center;">
                                                                <div id="diveye_{{ $d->id }}">
                                                                    @if($d->image)
                                                                        <img id="imgeye_{{ $d->id }}" src="{{ asset('img/medicine-images/'.$d ->image) }}" height='200px'>
                                                                    @else
                                                                        <b>(No image)</b>
                                                                    @endif
                                                                </div>
                                                                <p id="desceye_{{ $d->id }}">{{ $d ->description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-xs" data-toggle="modal" href="#seeimage_{{ $d -> id }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    function clearInput(){
        $('#generic_name').val('');
        $('#form').val('');
        $('#restriction_formula').val('');
        $('#price').val('');
        $('#image').val('');
        $('#description').val('');
        $('#category').prop('selectedIndex', 0);
        $('#faskes1').attr('checked', false);
        $('#faskes2').attr('checked', false);
        $('#faskes3').attr('checked', false);
        clearError("modalCreate");
    }

    function clearError(el){
        $("#"+el+" .alert ul").html("");
        $("#"+el+" .alert").hide();
    }

    function saveDataCreateTD() {
        var formEl = document.forms.createForm;
        var formData = new FormData(formEl);
        $.ajax({
            type:'POST',
            url:'{{ route("medicines.store") }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                if (data.status==200){
                    var newData = `<tr id="tr_`+data.id+`" class="odd gradeX">
                                    <td>`+data.id+`</td>
                                    <td id="td_name_`+data.id+`">`+formData.get('generic_name')+`</td>
                                    <td id="td_form_`+data.id+`">`+formData.get('form')+`</td>
                                    <td id="td_restriction_formula_`+data.id+`">`+formData.get('restriction_formula')+`</td>
                                    <td id="td_price_`+data.id+`">`+formData.get('price')+`</td>
                                    <td id="td_image_`+data.id+`" style="text-align: center;">`;
                                    if (data.image) {
                                        newData += `<img src="{{ asset('img/medicine-images/`+data.image+`') }}" alt="`+formData.get('name')+`" style="height: 70px">`;
                                    } else {
                                        newData += '<b>(No image)</b>';
                                    }
                                    newData += `
                                        <div class="modal fade" id="modalChange_`+data.id+`" tabindex="-1" role="basic" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form method="POST" id="changeImageForm" enctype="multipart/form-data">
                                                        <div class="modal-header">
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Change Image</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-danger" style="display: none">
                                                                <ul>
                                                                </ul>
                                                            </div>
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Image</label>
                                                                <input type="file" class="form-control" id="image" name="image">
                                                                <input type="hidden" name="id" id="id" value="`+data.id+`">
                                                                <input type="hidden" name="oldImage" value="`+data.image+`">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" onclick="changeImage(`+data.id+`)">Change</button>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clearError('modalChange_`+data.id+`')">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <span>
                                            <a href="#modalChange_`+data.id+`" data-toggle="modal" class="btn btn-xs btn-default">Change</a>
                                        </span>
                                    </td>
                                    <td id="td_faskes1_`+data.id+`">`;
                    if (formData.get('faskes1') == 1) {
                        newData += `<div style="text-align: center;">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>`;
                    }
                    newData += `</td>
                                <td id="td_faskes2_`+data.id+`">`;
                    if (formData.get('faskes2') == 1) {
                        newData += `<div style="text-align: center;">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>`;
                    }
                    newData += `</td>
                                <td id="td_faskes3_`+data.id+`">`;
                    if (formData.get('faskes3') == 1) {
                        newData += `<div style="text-align: center;">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </div>`;
                    }
                    newData += `</td>`;
                    newData += `    <td id="td_category_`+data.id+`">`+data.category+`</td>
                                    <td style="text-align: center;">
                                        <a href="#modalEdit" data-toggle="modal" class="btn btn-xs btn-warning" onclick="getEditForm(`+data.id+`)"><i class="fa fa-pencil"></i></a>
                                    </td>
                                    <td style="text-align: center;">
                                        <a class="btn btn-xs btn-danger" onclick="if(confirm('Are you sure to delete this record?')) deleteData(`+data.id+`)"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                    <td style="text-align: center;">
                                        <div class="modal fade" id="seeimage_`+data.id+`" tabindex="-1" role="basic" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                        data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title" style="text-align: center; background-color: silver; border-radius: 15px 50px 30px; padding: 15px;">`+formData.get('generic_name')+`</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div style="padding: 15px" style="padding: 15px; text-align: center;">
                                                                <div id="diveye_`+data.id+`">`;
                                                                if (data.image) {
                                                                    newData += `<img id="imgeye_`+data.id+`" class="rounded" src="{{ asset('img/medicine-images/`+data.image+`') }}" height='200px'>`;
                                                                } else {
                                                                    newData += `<b>(No image)</b>`;
                                                                }
                                                                newData += `</div>`
                                                                newData += `<p id="desceye_`+data.id+`">`+formData.get('description')+`</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-xs" data-toggle="modal" href="#seeimage_`+data.id+`">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>`;


                    $('#table-body').append(newData);
                }
                clearInput();
                $('#pesan').show();
                $('#pesan').html(data.msg);
                setTimeout(function() {
                    $("#pesan").hide();
                }, 5000);

                $('body').removeClass('modal-open');
                $('#modalCreate').modal('hide');
            },
            error: function(xhr){
                if (xhr.status == 422){
                    data = JSON.parse(xhr.responseText);
                    clearError("modalCreate");
                    for (var k in data.errors){
                        $("#modalCreate .alert ul").append(`<li>`+data.errors[k][0]+`</li>`);
                    }
                    $("#modalCreate .alert").show();
                    const element = document.getElementById("modalCreate").getElementsByClassName("alert")[0];
                    element.scrollIntoView();
                }else{
                    data = JSON.parse(xhr.responseText);
                    $('#error').show();
                    $('#error').html(data.msg);
                    setTimeout(function() {
                        $("#error").hide();
                    }, 5000);
                    $('body').removeClass('modal-open');
                }
            }
        });
    }

    function getEditForm(id) {
        $.ajax({
            type:'POST',
            url:'{{route("medicines.getEditForm")}}',
            data:'_token= <?php echo csrf_token() ?> &id='+id,
            success:function(data) {
                $("#modalContent").html(data.msg);
            }
        });
      }

    function saveDataUpdateTD(id) {
        var eName = $('#medName').val();
        var eForm = $('#medForm').val();
        var eRestrictionFormula = $('#medRestrictionFormula').val();
        var ePrice = $('#medPrice').val();
        var eDescription = $('#medDescription').val();
        var eCategory = $('#medCategory option:selected').val();
        var eCategoryText = $('#medCategory option:selected').text();
        var eFaskes1 = $("#medFaskes1").is(":checked") ? 1 : 0;
        var eFaskes2 = $("#medFaskes2").is(":checked") ? 1 : 0;
        var eFaskes3 = $("#medFaskes3").is(":checked") ? 1 : 0;
        $.ajax({
            type:'POST',
            url:'{{ route("medicines.saveData") }}',
            data:{'_token': '<?php echo csrf_token() ?>',
                    'id':id,
                    'generic_name':eName,
                    'form':eForm,
                    'restriction_formula':eRestrictionFormula,
                    'price':ePrice,
                    'description':eDescription,
                    'category_id':eCategory,
                    'faskes1':eFaskes1,
                    'faskes2':eFaskes2,
                    'faskes3':eFaskes3
                },
            success: function(data) {
                if(data.status==200){
                    $('#td_name_'+id).html(eName);
                    $('#td_form_'+id).html(eForm);
                    $('#td_restriction_formula_'+id).html(eRestrictionFormula);
                    $('#td_price_'+id).html(ePrice);
                    $('#td_description_'+id).html(eDescription);
                    $('#desceye_'+id).html(eDescription);
                    $('#td_category_'+id).html(eCategoryText);

                    if(eFaskes1 == 0){
                        $('#td_faskes1_'+id).html('');
                    }
                    else if(eFaskes1 == 1){
                        $('#td_faskes1_'+id).html(`
                        <div style="text-align: center;">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>`);
                    }

                    if(eFaskes2 == 0){
                        $('#td_faskes2_'+id).html('');
                    }
                    else if(eFaskes2 == 1){
                        $('#td_faskes2_'+id).html(`
                        <div style="text-align: center;">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>`);
                    }

                    if(eFaskes3 == 0){
                        $('#td_faskes3_'+id).html('');
                    }
                    else if(eFaskes3 == 1){
                        $('#td_faskes3_'+id).html(`
                        <div style="text-align: center;">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>`);
                    }

                    $('#pesan').show();
                    $('#pesan').html(data.msg);
                    setTimeout(function() {
                        $("#pesan").hide();
                    }, 5000);

                    $('body').removeClass('modal-open');
                    $('#modalEdit').modal('hide');
                }
                else {
                    $('#error').show();
                    $('#error').html(data.msg);

                    setTimeout(function() {
                        $("#error").hide();
                    }, 5000);
                }
                clearError("modalEdit");
                $('body').removeClass('modal-open');
                $('#modalEdit').modal('hide');
            },
            error: function(xhr){
                if (xhr.status == 422){
                    data = JSON.parse(xhr.responseText);
                    clearError("modalEdit");
                    for (var k in data.errors){
                        $("#modalEdit .alert ul").append(`<li>`+data.errors[k][0]+`</li>`);
                    }
                    $("#modalEdit .alert").show();
                    const element = document.getElementById("modalEdit").getElementsByClassName("alert")[0];
                    element.scrollIntoView();
                }else{
                    data = JSON.parse(xhr.responseText);
                    $('#error').show();
                    $('#error').html(data.msg);
                    setTimeout(function() {
                        $("#error").hide();
                    }, 5000);
                    $('body').removeClass('modal-open');
                }
            }
        });
    }

    function deleteData(id) {
      $.ajax({
          type:'POST',
          url:'{{ route("medicines.deleteData") }}',
          data:'_token= <?php echo csrf_token() ?> &id='+id,
          success:function(data) {
              if(data.status=='oke'){
                $('#tr_'+id).remove();

                $('#pesan').show();
                $('#pesan').html(data.msg);
              }
              else{
                $('#error').show();
                $('#error').html(data.msg);
                setTimeout(function() {
                        $("#error").hide();
                }, 5000);
              }
          }
      });
    }

    function changeImage(id){
        var formEl = $('#modalChange_'+id+' #changeImageForm').get(0);;
        var formData = new FormData(formEl);
        $.ajax({
            type:'POST',
            url:'{{ route("medicines.changeImage") }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                if (data.status==200){
                    var newData = "";
                    if (data.image) {
                        newData += `<img src="{{ asset('img/medicine-images/`+data.image+`') }}" alt="`+formData.get('name')+`" style="height: 70px">`;
                    } else {
                        newData += '<b>(No image)</b>';
                    }
                    newData += `
                        <div class="modal fade" id="modalChange_`+id+`" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" id="changeImageForm" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Change Image</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger" style="display: none">
                                                <ul>
                                                </ul>
                                            </div>
                                            @csrf
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" id="image" name="image">
                                                <input type="hidden" name="id" id="id" value="`+id+`">
                                                <input type="hidden" name="oldImage" value="`+data.image+`">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" onclick="changeImage(`+id+`)">Change</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clearError('modalChange_`+data.id+`')">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <span>
                            <a href="#modalChange_`+id+`" data-toggle="modal" class="btn btn-xs btn-default">Change</a>
                        </span>`;
                    $("#td_image_"+id).html(newData);

                    var newImg = `<img id="imgeye_`+data.id+`" src="{{ asset('img/medicine-images/`+data.image+`') }}" height='200px'>`
                    $("#diveye_"+id).html(newImg);

                }
                clearError("modalChange_"+id);
                $('#pesan').show();
                $('#pesan').html(data.msg);
                setTimeout(function() {
                    $("#pesan").hide();
                }, 5000);

                $('body').removeClass('modal-open');
                $('#modalChange_'+id).modal('hide');
            },
            error: function(xhr){
                if (xhr.status == 422){

                    data = JSON.parse(xhr.responseText);
                    clearError("modalChange_"+id);

                    for (var k in data.errors){
                        $("#modalChange_"+id+" .alert ul").append(`<li>`+data.errors[k][0]+`</li>`);
                    }
                    $("#modalChange_"+id+" .alert").show();
                    console.log("#modalChange_"+id);
                    const element = document.getElementById("modalChange_"+id).getElementsByClassName("alert")[0];
                    element.scrollIntoView();
                }else{
                    data = JSON.parse(xhr.responseText);
                    $('#error').show();
                    $('#error').html(data.msg);
                    setTimeout(function() {
                        $("#error").hide();
                    }, 5000);
                    $('body').removeClass('modal-open');
                    $('#modalChange_'+formData.get("id")).modal('hide');
                }
            }
        });
    }
</script>
@endsection
