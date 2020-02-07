<div class="photo-gallery-element__container">
    <% if $ShowTitle %>
        <h2 class="photo-gallery-element__title">$Title</h2>
    <% end_if %>
    <% loop Images %>
        <a class="photo-gallery-element__image-link" href="$Image.FitMax(1200,500).URL">
            <img class="photo-gallery-element__image" src="$Image.FillMax(560,300).URL">
        </a>
    <% end_loop %>
</div>
