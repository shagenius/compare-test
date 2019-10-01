@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts/menu')
        </div>
        <div class="col-md-8">
            <div class="cad">
                <div class="card-">
                    <div id="flick-img">
                        <div class="row">
                            <?php
                                $counter = 0;
                                foreach($images['photo'] as $photo) { 
                                     echo '<div class="col-lg-3 col-md-4 col-6">';
                                     echo '<a class="d-block mb-4 h-100 w-100" href="'.url('photo',array($photo["id"],$category)).'"><img class="img-thumbnail" src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg" width="150" height="150"></a>'; ;
                                     echo '</div>';
                                     $counter++;
//                                     if($counter==4) {
//                                         echo '</div>';
//                                         echo '<div class="row">';
//                                         $counter=0;
//                                     }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection