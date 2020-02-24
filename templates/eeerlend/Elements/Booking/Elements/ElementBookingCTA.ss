<div class="bookingcta-element__container">
    <div class="bookingcta-element__row">
        <div class="bookingcta-element__content">
            <% if $ImageStyle == 'icon' %>
                <div class="cta-element__content-icon">
                    <% if $IconClass %>
                        <i class="$IconClass"></i>
                    <% else_if $Image %>
                        <img class="$ImageStyle" src="$Image.FocusFill(100,100).URL" alt="$Image.Title" />
                    <% else %>
                        <i class="fas fa-exclamation"></i>
                    <% end_if %>
                </div>
            <% end_if %>

            <% if ShowTitle %><h2 class="bookingcta-element__content-title">$Title</h2><% end_if %>

            <div class="bookingcta-element__content-text">$Content</div>

            <% if $PageLink %>

            <% end_if %>

            <div class="bookingcta-element__button">
                <% if $TrekksoftActivityID %>
                    <button id="bookingcta-element__trekksoft-$ID"><% if $ButtonText %>$ButtonText<% else %>Read more<% end_if %></button>
                <% else_if $PageLink %>
                    <a href="$PageLink.Link"><% if $ButtonText %>$ButtonText<% else %>Read more<% end_if %></a>
                <% end_if %>
            </div>
        </div>
    </div>
</div>
