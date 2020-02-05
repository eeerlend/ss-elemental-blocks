<div class="call-to-action-item">
    <% if $ImageStyle == 'icon' %>
        <div class="cta-icon">
            <% if $Image %>
                <img class="img-fluid $ImageStyle mx-auto d-block" src="$Image.FocusFill(100,100).URL" alt="$Image.Title" />
            <% else %>
                <i class="fab fa-accessible-icon"></i>
            <% end_if %>
        </div>
    <% else_if $Image %>
        <div class="cta-image">
            <img class="img-fluid $ImageStyle mx-auto d-block" src="$Image.FocusFill(100,100).URL" alt="$Image.Title" />
        </div>
    <% end_if %>

    <% if ShowTitle %><h3>$Title</h3><% end_if %>
    $Content

    <% if $PageLink %>
        <a href="$PageLink.Link" class="btn btn-md mt-3" href="#"><% if $ButtonText %>$ButtonText<% else %>Read more<% end_if %></a>
    <% end_if %>
</div>
