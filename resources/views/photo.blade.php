@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts/menu')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div id="flick-img">
                        <?php
                            foreach($images['photo'] as $photo) { 
                                 echo '<img class="img-thumbnail" src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg" width="100" height="100">'; ;
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection