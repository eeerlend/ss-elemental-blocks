<section class="section $ClassName.ShortName section-$Style section-$Alignment">
    <div class="container">
        <blockquote class="blockquote text-center">
            <% if ShowTitle %><h2>$Title</h2><% end_if %>
            $Content
            <% if $Source %><footer class="blockquote-footer"><cite title="Source Title">$Source</cite></footer><% end_if %>
        </blockquote>
    </div>
</section>
