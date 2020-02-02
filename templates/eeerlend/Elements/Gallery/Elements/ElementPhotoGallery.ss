<section class="section<% if $Style %> $StyleVariant<% end_if %>">
    <% if $ShowTitle %>
        <h2 class="content-element__title">$Title</h2>
    <% end_if %>
    <% loop Images %>
        <a class="portfolio-box" href="$Image.FitMax(1200,500).URL">
            <img class="img-fluid" src="$Image.FillMax(560,300).URL">
        </a>
    <% end_loop %>
</section>
