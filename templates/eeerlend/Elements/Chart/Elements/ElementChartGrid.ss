<div class="chart-grid-element__container">
    <div class="chart-grid-element__content">

        <% if ShowTitle %><h2 class="chart-grid-element__content-title">$Title</h2><% end_if %>
        <div class="chart-grid-element__content-text">$Content</div>
        <div class="chart-grid-element__charts">
            <% loop Charts %>
                $forTemplate
            <% end_loop %>
        </div>
    </div>
</div>
