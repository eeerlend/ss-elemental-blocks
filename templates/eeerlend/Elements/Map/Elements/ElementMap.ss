<div class="map-element__container">
    <div class="map-element__content">
        <% if ShowTitle %><h2 class="map-element__content-title">$Title</h2><% end_if %>
        <div class="map-element__content-text">$Content</div>
    </div>

    <% if $Latitude > 0 %><% if $Longitude > 0 %>
        <div class="map-element__map<% if MapSize %> $MapSize<% end_if %>" id="map-element__map-$ID"></div>

        $JavascriptBlock
    <% end_if %><% end_if %>
</div>
