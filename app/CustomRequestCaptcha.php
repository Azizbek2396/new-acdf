<?php
namespace App;

use ReCaptcha\RequestMethod\Post;

class CustomRequestCaptcha {
    public function captcha()
    {
        return new Post();
    }
}
