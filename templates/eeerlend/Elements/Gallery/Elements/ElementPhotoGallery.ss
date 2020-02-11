<div class="photo-gallery-element__container">
    <% if $ShowTitle %>
        <h2 class="photo-gallery-element__title">$Title</h2>
    <% end_if %>
    <div class="photo-gallery-element__content">$Content</div>
    <div class="photo-gallery-element__images">
        <% loop Images %>
            <div class="photo-gallery-element__image">
                <a class="photo-gallery-element__image-link" href="$Image.FitMax(1200,800).URL">
                    <img class="photo-gallery-element__image-thumb" src="$Image.FillMax(1200,800).URL">
                    <div class="photo-gallery-element__image-caption">
                        <div class="photo-gallery-element__image-caption-title">
                            $Title
                        </div>
                    </div>
                </a>
            </div>
        <% end_loop %>
    </div>
</div>
