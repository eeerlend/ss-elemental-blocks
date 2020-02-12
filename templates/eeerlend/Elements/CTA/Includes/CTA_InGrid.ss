<div class="cta-element__content">
    <% if $Style != 'imagebackground' %>
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
        <% else_if $Image %>
            <div class="cta-element__content-image">
                <img class="$ImageStyle" src="$Image.FocusFill(100,100).URL" alt="$Image.Title" />
            </div>
        <% end_if %>
    <% end_if %>

    <% if ShowTitle %><h3 class="cta-element__content-title">$Title</h3><% end_if %>

    <div class="cta-element__content-text">$Content</div>

    <% if $PageLink %>
        <a href="$PageLink.Link" class="cta-element__content-link"><% if $ButtonText %>$ButtonText<% else %>Read more<% end_if %></a>
    <% end_if %>
</div>
