<div class="row no-gutters">
    @include('components.magazine.left')
    <div class="items items-right col-12 col-md-6 mt-2 mt-md-0">
        <div class="row no-gutters flex-nowrap flex-md-wrap">
            @each('components.magazine.right', [1,2,3,4], 'post')
        </div>
    </div>
</div>
