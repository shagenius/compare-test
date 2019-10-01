@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts/menu')
        </div>
        <div class="col-md-9">
            <div class="media">
                <?php
                    echo '<img class="img-rounded mr-3" src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg">';
                ?>
               <div class="media-body">
                   <h3 class="mt-0"><?php echo $photo['title']['_content'];?></h3><a class="right-align" href="<?=url('gallery',$category);?>"><</a>
                   <?php echo $photo['description']['_content'];?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection