<div class="banner-element__container">
    <div class="banner-element__overlay"></div>

    <% if $File %>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="$File.URL" type="video/mp4">
        </video>
    <% end_if %>

    <div class="container h-100">
        <div class="d-flex text-center h-100">
            <div class="my-auto w-100">
                <% if $IconFile %>
                    <img class="" src="$IconFile.ScaleHeight(120).URL" alt="Icon" />
                <% end_if %>

                <h1>$Title</h1>
                <h2>$Content</h2>

                <% if $PageLink %>
                    <a href="$PageLink.Link" class="btn btn-primary mt-3"><% if $ButtonText %>$ButtonText<% else %>Read more<% end_if %></a>
                <% end_if %>
            </div>
        </div>
    </div>
</div>
