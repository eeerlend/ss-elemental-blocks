<div class="cta-element__background-image"
    style="background-image:url('$Image.Link'); background-position: $Image.PercentageX% $Image.PercentageY%;">

    <div class="cta-element__background-overlay"></div>

    <div class="cta-element__container">
        <div class="cta-element__row">
            <div class="cta-element__content">
                <% if ShowTitle %><h2 class="cta-element__content-title">$Title</h2><% end_if %>

                <div class="cta-element__content-text">$Content</div>

                <% if $PageLink %>
                    <a href="$PageLink.Link" class="cta-element__content-link" href="#"><% if $ButtonText %>$ButtonText<% else %>Read more<% end_if %></a>
                <% end_if %>
            </div>
        </div>
    </div>
</div>
