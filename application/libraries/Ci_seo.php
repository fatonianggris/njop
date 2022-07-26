<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CI_Seo {

    private $CI;

    function __construct() {
        $this->CI = get_instance();
        $this->CI->load->helper('url');
        $this->CI->config->load('ci_seo');
    }

    public function set_tags($title = "", $description = "", $keywords = "", $copyright = "", $image = "", $tweet = "", $fb_page = "", $fb_id = "", $robot = null, $boosting = null, $canonical = "") {
        $current_url = current_url();
        echo "<meta property='og:url' content='$current_url' />\n";

        $this->set_titletags($title, $image);
        $this->set_descriptiontags($description);
        $this->set_keywords($keywords);
        $this->set_copyright($copyright);
        $this->set_imagetags($image);
        $this->set_twtags($tweet);
        $this->set_fbtags($fb_page, $fb_id);
        $this->set_robots($robot);
        $this->set_boosting($boosting);
        $this->set_canonical($canonical);
    }

    private function set_titletags($title, $images) {
        if ($title != "") {
            echo "<meta http-equiv='X-UA-Compatible' content='IE=edge'/>\n";
            echo "<title>$title</title>\n";
            echo "<meta property='og:title' content='$title' />\n";
            echo "<meta property='og:type' content='article'>";
            echo "<meta name='twitter:title' content='$title' />\n";
            echo "<h1 class='header_seo'>$title<img src='" . base_url($images) . "' width='0' height='0' alt='$title' style='visibility: hidden;'></h1>";
        } elseif ($this->CI->config->item('site_title') != "") {
            echo "<title>" . $this->CI->config->item('site_title') . "</title>\n";
            echo "<meta property='og:title' content='" . $this->CI->config->item('site_title') . "' />\n";
            echo "<meta property='og:site_name' content='" . $this->CI->config->item('site_title') . "' />\n";
            echo "<meta name='twitter:title' content='" . $this->CI->config->item('site_title') . "' />\n";
        }
    }

    private function set_keywords($key) {

        if ($key != "") {
            echo "<meta name='keywords' content='$key'/>\n";
        } else {
            echo "<meta name='keywords' content='null'/>\n";
        }
    }

    private function set_copyright($copy) {
        if ($copy != "") {
            echo "<meta name='copyright' content='$copy'/>\n";
        } else {
            echo "<meta name='copyright' content='null'/>\n";
        }
    }

    private function set_robots($bool) {

        if ($bool == 1) {
            echo "<meta name='robots' content='index,follow'/>\n";
            echo "<meta name='googlebot' content='index,follow'/>\n";
            echo "<meta name='msnbot' content='index,follow'>\n";
        } else {
            echo "<meta name='robots' content='noindex,follow'/>\n";
        }
    }

    private function set_boosting($bool) {

        if ($bool == 1) {
            echo "<meta name='language' content='in,en' />\n";
            echo "<meta name='distribution' content='Global' />\n";
            echo "<meta name='rating' content='General' />\n";
            echo "<meta name='revisit-after' content='10 minutes' />\n";
            echo "<meta name='expires' content='never' />\n";
        }
    }

    private function set_descriptiontags($description) {
        if ($description != "") {
            echo "<meta name='description' content='$description'/>\n";
            echo "<meta property='og:description' content='$description' />\n";
            echo "<meta name='twitter:description' content='$description' />\n";
        } elseif ($this->CI->config->item('site_description') != "") {
            echo "<meta name='description' content='" . $this->CI->config->item('site_description') . "'/>\n";
            echo "<meta property='og:description' content='" . $this->CI->config->item('site_description') . "' />\n";
            echo "<meta name='twitter:description' content='" . $this->CI->config->item('site_description') . "' />\n";
        }
    }

    private function set_imagetags($image) {
        $image_path = null;

        if ($image != "") {
            $image_path = $this->format_imagetag($image);
        } elseif ($this->CI->config->item('site_image') != "") {
            $image_path = $this->format_imagetag($this->CI->config->item('site_image'));
        }

        if ($image_path) {
            list($width, $height) = getimagesize($image_path);
            echo "<meta property='og:image' content='$image_path' />\n";
            echo "<meta property='og:image:secure_url' content='$image_path' />\n";
            echo "<meta name='twitter:image' content='$image_path' />\n";
            echo "<meta name='twitter:card' content='summary_large_image' />\n";
            echo "<meta property='og:image:width' content='$width' />\n<meta property='og:image:height' content='$height' />\n";
        }
    }

    private function set_twtags($tweet) {
        if ($this->CI->config->item('twitter_user') != "") {
            echo "<meta name='twitter:site' content='" . $this->CI->config->item('twitter_user') . "' />\n";
        } elseif ($tweet != "") {
            echo "<meta name='twitter:site' content='" . $tweet . "' />\n";
        }
    }

    private function set_fbtags($fb_page, $fb_id) {
        if ($this->CI->config->item('fb_page_id') != "") {
            echo "<meta property='fb:pages' content='" . $this->CI->config->item('fb_page_id') . "' />\n";
            echo "<meta property='fb:app_id' content='" . $this->CI->config->item('fb_app_id') . "' />\n";
        } elseif ($fb_id != "") {
            echo "<meta property='fb:app_id' content='" . $fb_id . "' />\n";
        } elseif ($fb_page != "") {
            echo "<meta property='fb:pages' content='" . $fb_page . "' />\n";
        }
    }

    private function set_canonical($canonical) {
        if ($this->CI->config->item('canonical_url') != "") {
            echo "<link rel='canonical' href='" . $this->CI->config->item('canonical_url') . "' />\n";
        } elseif ($canonical != "") {
            echo "<link rel='canonical' href='" . $canonical . "' />\n";
        }
    }

    private function format_imagetag($image_path) {
        return base_url($image_path);
    }

}
