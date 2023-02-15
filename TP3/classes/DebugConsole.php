<?php

class DebugConsole {

    public static function debug_to_console($val, $text) {
        if ($val) {
            echo '<script>console.log("' . $text . '");</script>';
        }
    }

    public static function debug_register($val, $text) {
        if ($val == 0) {
            echo '<script>console.log("' . $text . '");</script>';
        }
    }
    
    public static function show_text_console($text) {
        echo '<script>console.log("' . $text . '");</script>';
    }

}
