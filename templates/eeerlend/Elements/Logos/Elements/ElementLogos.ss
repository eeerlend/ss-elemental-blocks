<section class="section $ClassName.ShortName section-$Style section-$Alignment">
    <div class="container">
        <div class="row">
            <div class="col-sm mb-3 text-center">
                <h3>$Title</h3>
            </div>
        </div>
        <div class="row mb-3">
            <% loop $Logos %>
                <div class="col-sm p-3 text-center">
                    <a href="$Link" alt="$Title logo" target="_blank">$Image.ScaleMaxHeight(100)</a>
                </div>
            <% end_loop %>
        </div>
    </div>
</section>
