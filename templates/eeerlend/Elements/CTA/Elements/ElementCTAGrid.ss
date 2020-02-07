<div class="cta-grid-element__container">
    <% if ShowTitle %><h2 class="cta-grid-element__title">$Title</h2><% end_if %>

    <div class="cta-grid-element__row">
        <% loop CallToActions %>
            <% include eeerlend/Elements/CTA/Includes/CTA_InGrid %>
        <% end_loop %>
    </div>
</div>
