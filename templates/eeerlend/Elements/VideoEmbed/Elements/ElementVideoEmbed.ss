<div class="video-embed-element__container">
    <% if $ShowTitle %>
        <h2 class="video-embed-element__title">$Title</h2>
    <% end_if %>

    <div class="video-embed-element__content">$Content</div>

    <% if ExternalVideoTag %>
        <div class="video-embed-element__video-wrapper">
            <% if Provider == 'youtube' %>
                <iframe class="video-embed-element__iframe-youtube" width="560" height="315" src="https://www.youtube.com/embed/{$ExternalVideoTag}"
                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <% else_if Provider == 'vimeo' %>
                <iframe class="video-embed-element__iframe-vimeo" title="vimeo-player" src="https://player.vimeo.com/video/{$ExternalVideoTag}"
                width="640" height="360" frameborder="0" allowfullscreen></iframe>
            <% else %>
                No provider specified
            <% end_if %>
        </div>
    <% end_if %>
</div>
