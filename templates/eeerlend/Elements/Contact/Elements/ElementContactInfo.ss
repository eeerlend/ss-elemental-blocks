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

        <% if $TwitterURL %>
            <div class="contactinfo-element__content-twitter">
                <a href="$TwitterURL" target="_blank">Follow us on Twitter</a>
            </div>
        <% end_if %>

        <% if $FacebookURL %>
            <div class="contactinfo-element__content-facebook">
                <a href="$FacebookURL" target="_blank">Follow us on Facebook</a>
            </div>
        <% end_if %>

        <% if $InstagramURL %>
            <div class="contactinfo-element__content-instagram">
                <a href="$InstagramURL" target="_blank">Follow us on Instagram</a>
            </div>
        <% end_if %>

        <% if $LinkedinURL %>
            <div class="contactinfo-element__content-linkedin">
                <a href="$LinkedinURL" target="_blank">Follow us on LinkedIn</a>
            </div>
        <% end_if %>
    </div>
</div>
