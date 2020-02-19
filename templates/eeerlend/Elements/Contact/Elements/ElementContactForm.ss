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
                        <label for="input-name-$ID">Name *</label>
                        <input name="input[name]" type="text" id="input-name-$ID" placeholder="Enter name" required="required">
                    </div>

                    <div class="contactform-element__form-group">
                        <label for="input-email-$ID">E-mail *</label>
                        <input name="input[email]" type="email" id="input-email-$ID" aria-describedby="input-email-help-$ID" placeholder="Enter email" required="required">
                        <small id="input-email-help-$ID" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="contactform-element__form-group">
                        <label for="input-phone-$ID">Phone</label>
                        <input name="input[phone]" type="text" id="input-phone-$ID" placeholder="Enter phone">
                    </div>

                    <input name="input[fjerndenne]" type="text" class="fjerndette-$ID" placeholder="leave empty">

                    <div class="contactform-element__form-group">
                        <label for="input-message-$ID">Message</label>
                        <textarea name="input[message]" id="input-message-$ID" rows="3"></textarea>
                    </div>

                    <% if $NewsletterMessage %>
                    <div class="contactform-element__form-check">
                        <input name="input[signup-newsletter]" type="checkbox" id="input-signup-newsletter-$ID">
                        <label for="input-signup-newsletter-$ID">$NewsletterMessage</label>
                    </div>
                    <% end_if %>

                    <div class="contactform-element__form-check">
                        <input name="input[accept-terms]" type="checkbox" id="input-accept-terms-$ID" required>
                        <label for="input-accept-terms-$ID"><p>I have read and accept the
                        <% if $PageLink %>
                            <a href="$PageLink.Link" class="contactform-element__policy-link" target="_blank">Privacy Policy</a>
                        <% else %>Privacy Policy<% end_if %></p></label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>

                    <input name="input[element]" type="hidden" value="$ID" />
                    <input name="input[datetime]" type="hidden" value="$DateTime" />

                    <button class="contactform-element__submit" id="contactform-element__submit-$ID" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>
