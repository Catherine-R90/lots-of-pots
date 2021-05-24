<form method="POST" action="/contact">
@csrf
    
    <div class="contact-label">
        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name" placeholder="Full Name" required>
    </div>

    <div class="contact-label">
        <label for="email">Email Address:</label>
        <input type="text" name="emailAddress" id="emailAddress" placeholder="Email Address" required>
    </div>

    <div class="contact-label">
        <label for="phone">Telephone Number (optionl):</label>
        <input type="tel" name="phone" id="phone" placeholder="0000 000000">
    </div>

    <div class="contact-label">
        <label for="mobile">Mobile Number (optionl):</label>
        <input type="tel" name="mobile" id="mobile" placeholder="0000 000000">
    </div>

    <div class="contact-label">
        <label for="orderReceiptNumber">Order/Receipt Number (optional):</label>
        <input type="text" name="orderReceiptNumber" id="orderReceiptNumber" placeholder="lop000000">
    </div>  

    <div class="contact-label">
        <label for="subject">Subject:</label>
        <input type="text" name="subject" id="subject" placeholder="Subject" required>
    </div>


    <div class="contact-label">
        <label for="message">Message:</label>
        <textarea type="text" name="message" id="message" placeholder="Your message here" required></textarea>
    </div>

    <div class="grey-link">
        <button>Send</button>
    </div>

</form>