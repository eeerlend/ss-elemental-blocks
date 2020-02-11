<div class="contactinfo-element__container">
    <div class="contactinfo-element__content">

        <% if ShowTitle %><h2 class="contactinfo-element__content-title">$Title</h2><% end_if %>
        <div class="contactinfo-element__content-text">$Content</div>

        <% if $Phone %>
            <div class="contactinfo-element__content-phone">$Phone</div>
        <% end_if %>

        <% if $Email %>
            <div class="contactinfo-element__content-email">
                <a href="mailto:$Email">$Email</a>
            </div>
        <% end_if %>
    </div>
</div>
