<ul class="list-group">
    <?php foreach ($categories as $category) {?>
    <li class="list-group-item"><a href="<?=url('gallery',$category->name);?>"><?=  ucfirst($category->name);?></a></li>
    <?php } ?>
</ul>