{!! Html::style('website/ItemSlider/Islider.css') !!}
{!! Html::script('website/ItemSlider/Islider.js') !!}

<!------ Include the above in your HEAD tag ---------->

<div id="mycarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @while( $building_images_count >0 )
        <li data-target="#mycarousel" data-slide-to="{{ $building_images_count = $building_images_count -1 }}" class="active"></li>
        @endwhile
    </ol>




    <!-- Wrapper for slides -->

    <div class="carousel-inner" role="listbox" style="max-height: 400px">
        <div class="item">
            <img src="{{  checkIfImageIsExist($buInfo->image) }}" class="img-responsive"  ><br>
            <div class="carousel-caption">
            </div>
        </div>
        @foreach($building_images as $photo )
        <div class="item">
            <img src="{{ checkIfImageIsExist($photo->photo_name,'/public/website/Buildings_images/','/website/Buildings_images/') }}" style="width: 786px; height: 400px;"  ><br>
            <div class="carousel-caption">

            </div>
        </div>
        @endforeach

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
        <span class="  " aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control " href="#mycarousel" role="button" data-slide="next">
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="clearfix"><br><br></div>
<script>
    var $item = $('.carousel .item');
    var $wHeight = $(window).height();
    $item.eq(0).addClass('active');
    $item.height(400);
    $item.addClass('full-screen');

    $('.carousel img').each(function() {
        var $src = $(this).attr('src');
        var $color = $(this).attr('data-color');
        $(this).parent().css({
            'background-image' : 'url(' + $src + ')',
            'background-color' : $color
        });
        $(this).remove();
    });

    $(window).on('resize', function (){
        $wHeight = $(window).height();
        $item.height($wHeight);
    });

    $('.carousel').carousel({
        interval: 6000,
        pause: "false"
    });
</script>
