<div class="banner-element__overlay"></div>

<% if $File %>
    <video class="banner-element__video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="$File.URL" type="video/mp4">
    </video>
<% else_if $Image %>
    <img class="banner-element__image" src="$Image.ScaleHeight(700).URL" />
<% end_if %>

<div class="banner-element__content-container">
    <div class="banner-element__content-wrapper">
        <div class="banner-element__content">
            <% if $IconFile %>
                <img class="banner-element__content-icon" src="$IconFile.ScaleHeight(120).URL" alt="Icon" />
            <% end_if %>

            <h1 class="banner-element__content-title">$Title</h1>
            <div class="banner-element__content-text">$Content</div>

            <% if $PageLink %>
                <a href="$PageLink.Link" class="banner-element__content-link"><% if $ButtonText %>$ButtonText<% else %>Read more<% end_if %></a>
            <% else %>
                <a href="#main-start" class="js-scroll-trigger banner-element__content-link"><% if $ButtonText %>$ButtonText<% else %>Read more<% end_if %></a>
            <% end_if %>
        </div>
    </div>
</div>
