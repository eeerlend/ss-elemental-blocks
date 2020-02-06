<section class="section $ClassName.ShortName section-$Style section-$Alignment">
    <div class="container">
        <% if ShowTitle %><h2>$Title</h2><% end_if %>
        <% loop $Persons %>
            <h3>$Title</h3>
            <ul>
                <% if $Role %><li>$Role</li><% end_if %>
                <% if $Company %><li>$Company</li><% end_if %>
                <% if $Email %><li>$Email</li><% end_if %>
                <% if $Phone %><li>$Phone</li><% end_if %>
                <% if $Content %><li>$Content</li><% end_if %>
            </ul>
        <% end_loop %>
    </div>
</section>
