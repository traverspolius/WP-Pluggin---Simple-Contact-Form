<?php
/**
 * Plugin Name: Simple Contact Form
 * Description: A simple contact form plugin with Name, Email, and Message fields.
 * Version: 1.0
 * Author: Travers Polius
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Simple_Contact_Form {

    public function __construct() {
        add_shortcode( 'simple_contact_form', [ $this, 'render_form' ] );
        add_action( 'init', [ $this, 'handle_form_submission' ] );
    }

    public function render_form() {
        ob_start();

        if ( isset( $_POST['scf_submit'] ) ) {
            $this->handle_form_submission();
        }

        ?>
        <form method="post" class="scf-form" style="max-width:500px;margin:auto;">
            <label>Your Name</label>
            <input type="text" name="scf_name" required style="width:100%;margin-bottom:10px;padding:8px;border-radius:5px;border:1px solid #ccc;">
            
            <label>Your Email</label>
            <input type="email" name="scf_email" required style="width:100%;margin-bottom:10px;padding:8px;border-radius:5px;border:1px solid #ccc;">
            
            <label>Message</label>
            <textarea name="scf_message" required rows="5" style="width:100%;margin-bottom:10px;padding:8px;border-radius:5px;border:1px solid #ccc;"></textarea>

            <button type="submit" name="scf_submit" style="background:#1abc9c;color:#fff;padding:10px 20px;border:none;border-radius:10px;cursor:pointer;">
                Send Message
            </button>
        </form>
        <?php

        return ob_get_clean();
    }

    public function handle_form_submission() {
        if ( ! isset( $_POST['scf_submit'] ) ) return;

        $name    = sanitize_text_field( $_POST['scf_name'] );
        $email   = sanitize_email( $_POST['scf_email'] );
        $message = sanitize_textarea_field( $_POST['scf_message'] );

        if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
            echo '<p style="color:red;">Please fill in all fields.</p>';
            return;
        }

        $to      = get_option( 'admin_email' );
        $subject = "New message from $name";
        $body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: $email" ];

        if ( wp_mail( $to, $subject, $body, $headers ) ) {
            echo '<p style="color:green;">Thank you! Your message has been sent.</p>';
        } else {
            echo '<p style="color:red;">Something went wrong. Please try again.</p>';
        }
    }
}

new Simple_Contact_Form();
