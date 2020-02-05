<section class="section $ClassName.ShortName section-$Style section-center">
    <div class="container">
        <% if ShowTitle %><h2 class="mb-5">$Title</h2><% end_if %>
        <% loop CallToActions %>
            <% if $Up.ImageStyle %>
                <% include eeerlend/Elements/CTA/Includes/CallToActionItem ImageStyle=$Up.ImageStyle %>
            <% else %>
                <% include eeerlend/Elements/CTA/Includes/CallToActionItem %>
            <% end_if %>
        <% end_loop %>
    </div>
</section>
