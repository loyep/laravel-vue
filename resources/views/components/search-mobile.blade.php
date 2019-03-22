<div class="mobile-search">
    <form role="search" method="get" class="mobile-search-form" action="{{ route('search') }}">
        <div class="input-group mb-3">
            <input type="search" name="q" id="s" class="form-control" placeholder="输入搜索关键词">
            <div class="input-group-append">
                <button type="submit" class="btn btn-light form-search-submit text-secondary px-3">
                    <i class="fal fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
