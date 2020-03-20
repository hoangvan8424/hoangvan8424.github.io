<div class="single-sidebar">
    <div class="sidebar-title">
        <h4 class="closed">Thương hiệu</h4>
        <span class="extend-button">+</span>
    </div>
        <ul>
            @if(isset($brand))
                @foreach($brand as $brands)
                    <li><a href="#">{{ $brands->brand_name }}</a></li>
                 @endforeach
            @endif
        </ul>

</div>
<div class="single-sidebar">
    <div class="sidebar-title">
        <h4>Giá</h4>
        <span class="extend-button">+</span>
    </div>
    <ul>
        <li>
            <a href="?price=1" title="Dưới 5 triệu">
                <label><input type="checkbox"><span>Dưới 5 triệu</span></label>
            </a>
        </li>
        <li>
            <a href="?price=5">
                <label>
                    <input type="checkbox" value=""><span>Từ 5.000.000 - 7.000.000đ</span>
                </label>
            </a>
        </li>
        <li>
            <a href="?price=7">
                <label>
                    <input type="checkbox" value=""><span>Từ 7.000.000 - 10.000.000đ</span>
                </label>
            </a>
        </li>
        <li>
            <a href="?price=10">
                <label>
                    <input type="checkbox" value=""><span>Trên 10.000.000đ</span>
                </label>
            </a>
        </li>
    </ul>
</div>
<div class="single-sidebar">
    <div class="sidebar-title">
        <h4>Size</h4>
        <span class="extend-button">+</span>
    </div>
    <div class="size-wrap">
        <a href="#">s</a>
        <a href="#">m</a>
        <a href="#">l</a>
        <a href="#">xl</a>
        <a href="#">xxl</a>
    </div>
</div>


