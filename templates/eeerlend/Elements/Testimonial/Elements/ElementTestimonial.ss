<div class="testimonial-element__container">
    <div class="testimonial-element__content-row">
        <% if Image %>
            <div class="testimonial-element__content-image">
                <img src="$Image.FocusFill(300,300).URL" alt="$Image.Title">
            </div>
        <% end_if %>

        <blockquote class="testimonial-element__content-blockquote">
            <% if ShowTitle %><h2 class="testimonial-element__content-title">$Title</h2><% end_if %>
            $Content
            <% if $Source %>
                <footer class="testimonial-element__content-footer">
                    <cite title="Source Title">$Source</cite>
                </footer>
            <% end_if %>
        </blockquote>
    </div>
</div>
