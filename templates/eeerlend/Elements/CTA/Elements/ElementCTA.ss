<% include eeerlend/ElementCallToAction %>
<section class="section $ClassName.ShortName section-$Style section-$Alignment">
    <div class="container">
        <% if $Image %>
            Show $Image.URL as background <br />
        <% end_if %>

        <% if $Icon %>
            <img src="$Icon.URL" alt="$Image.Title" />
        <% end_if %>
    </div>
</section>
