<section class="section $ClassName.ShortName section-$Style section-$Alignment">
    <div class="container">
        <% if ShowTitle %><h2>$Title</h2><% end_if %>
        <% loop $Offices %>
            <h3>$Title</h3>
            <ul>
                <% if $Latitude %><li>Position: $Latitude / $Longitude</li><% end_if %>
                <% if $Content %><li>$Content</li><% end_if %>
            </ul>
        <% end_loop %>
    </div>
</section>
