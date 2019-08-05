<?php 

// add security headers
add_action('send_headers', function(){
    // Enforce the use of HTTPS
	header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
	// Referrer Policy
    header("Referrer-Policy: no-referrer-when-downgrade");
    // Access Control Allow Headers
    header("Access-Control-Allow-Headers: X-WP-Nonce");
    // Content Security Policy
    header("Content-Security-Policy: script-src http: https:");
    // Feature Policy
    header("Feature-Policy: geolocation none;midi none;notifications none;push none;sync-xhr none;microphone none;camera none;magnetometer none;gyroscope none;speaker self;vibrate none;fullscreen self;payment none;");
    // Expect CT Upcoming Headers | if env not available use static website address
    header("Expect-CT: max-age=0, report-uri='". $_ENV["WP_HOME"] ."'");
}, 1);

?>