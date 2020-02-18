<div class="contactform-element__container">
    <div class="contactform-element__content">
        <div class="contactform-element__form-row">

            <div class="contactform-element__contactinfo">
                <% if ShowTitle %><h2 class="contactform-element__contactinfo-title">$Title</h2><% end_if %>
                <div class="contactform-element__contactinfo-content">$Content</div>
            </div>

            <div class="contactform-element__form">
                <div class="contactform-element__form-message"></div>

                <form id="contactform-element__form-$ID" class="contactform-element__form-form" method="post" data-element="$ID" action="/forms/submit">
                    <div class="contactform-element__form-group">
                        <label for="input-name">Name *</label>
                        <input name="input[name]" type="text" id="input-name" placeholder="Enter name" required="required">
                    </div>

                    <div class="contactform-element__form-group">
                        <label for="input-email">E-mail *</label>
                        <input name="input[email]" type="email" id="input-email" aria-describedby="input-email-help" placeholder="Enter email" required="required">
                        <small id="input-email-help" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="contactform-element__form-group">
                        <label for="input-phone">Phone</label>
                        <input name="input[phone]" type="text" id="input-phone" placeholder="Enter phone">
                    </div>

                    <input name="input[fjerndenne]" type="text" class="fjerndette-$ID" placeholder="leave empty">

                    <div class="contactform-element__form-group">
                        <label for="input-message">Message</label>
                        <textarea name="input[message]" id="input-message" rows="3"></textarea>
                    </div>

                    <div class="contactform-element__form-check">
                        <input name="input[accept-terms]" type="checkbox" id="input-accept-terms">
                        <label class="form-check-label" for="input-accept-terms">I accept</label>
                    </div>

                    <input name="input[element]" type="hidden" value="$ID" />
                    <input name="input[datetime]" type="hidden" value="$DateTime" />

                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
