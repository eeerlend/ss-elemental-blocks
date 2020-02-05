<section class="section $ClassName.ShortName section-$Style section-$Alignment">
    <div class="container">
        <% if ShowTitle %><h1>$Title</h1><% end_if %>
        <div class="row">
            <% loop CallToActions %>
                <% include eeerlend/ElementCallToAction %>
            <% end_loop %>
        </div>
    </div>
</section>
