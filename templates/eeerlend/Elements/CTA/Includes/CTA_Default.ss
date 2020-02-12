<div class="cta-element__container">
    <div class="cta-element__row">
        <div class="cta-element__content-image">
            <img class="$ImageStyle" src="$Image.FocusFill(600,600).URL" alt="$Image.Title" />
        </div>

        <div class="cta-element__content">
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

            <% if ShowTitle %><h2 class="cta-element__content-title">$Title</h2><% end_if %>

            <div class="cta-element__content-text">$Content</div>

            <% if $PageLink %>
                <a href="$PageLink.Link" class="cta-element__content-link"><% if $ButtonText %>$ButtonText<% else %>Read more<% end_if %></a>
            <% end_if %>
        </div>
    </div>
</div>
