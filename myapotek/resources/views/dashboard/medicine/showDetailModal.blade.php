<div class="portlet">
    <div class="portlet-title">
        <b>Medicine ID: {{ $medicine->id }}</b>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="{{ asset('img/'.$medicine->image) }}">
                    <div class="caption">
                        <p align="center"><b>{{ $medicine->generic_name }}</b></p>
                        <hr>
                        <p>Category: {{ $medicine->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
