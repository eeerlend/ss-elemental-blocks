<div class="persons-element__container">
    <% if ShowTitle %><h2 class="persons-element__content-title">$Title</h2><% end_if %>

    <div class="persons-element__persons-container">
    <% loop $Persons %>
        <div class="persons-element__person">
            <% if $Image %><img class="persons-element__person-image" src="$Image.FocusFillMax(200,200).URL" alt="$Image.Title" /><% end_if %>
            <h3 class="persons-element__person-title">$Title</h3>
            <ul class="persons-element__person-attributes">
                <% if $Role %><li>$Role</li><% end_if %>
                <% if $Company %><li>$Company</li><% end_if %>
                <% if $Email %><li>$CloackedEmailAddress.RAW</li><% end_if %>
                <% if $Phone %><li>$Phone</li><% end_if %>
                <% if $Content %><li>$Content</li><% end_if %>
            </ul>
        </div>
    <% end_loop %>
    </div>
</div>
