<div class="chart-element__container">
    <div class="chart-element__content">

        <% if ShowTitle %><h2 class="chart-element__content-title">$Title</h2><% end_if %>
        <div class="chart-element__content-text">$Content</div>

        <canvas class="chart-element__chart" id="chart-element__chart-$ID"></canvas>
        $JavascriptBlock
    </div>
</div>
