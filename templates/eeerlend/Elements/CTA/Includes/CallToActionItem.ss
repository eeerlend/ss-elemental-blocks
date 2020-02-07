<div class="call-to-action-item__content">
    <% if $Style != 'imagebackground' %>
        <% if $ImageStyle == 'icon' %>
            <div class="call-to-action-item__icon">
                <% if $Image %>
                    <img class="$ImageStyle" src="$Image.FocusFill(100,100).URL" alt="$Image.Title" />
                <% end_if %>
            </div>
        <% else_if $Image %>
            <div class="call-to-action-item__image">
                <img class="$ImageStyle" src="$Image.FocusFill(100,100).URL" alt="$Image.Title" />
            </div>
        <% end_if %>
    <% end_if %>

    <% if ShowTitle %><h3 class="call-to-action-item__title">$Title</h3><% end_if %>

    <div class="call-to-action-item__content-text">$Content</div>

    <% if $PageLink %>
        <a href="$PageLink.Link" class="call-to-action-item__link" href="#"><% if $ButtonText %>$ButtonText<% else %>Read more<% end_if %></a>
    <% end_if %>
</div>
