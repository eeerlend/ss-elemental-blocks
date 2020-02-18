<div class="logos-element__container">
    <% if ShowTitle %><h2 class="logos-element__title">$Title</h2><% end_if %>

    <div class="logos-element__logogrid">
        <% loop $Logos.Sort('LogoSort asc') %>
            <div class="logos-element__logo">
                <a href="$Link" alt="$Title logo" target="_blank">$Image.ScaleMaxHeight(100)</a>
            </div>
        <% end_loop %>
    </div>
</div>
