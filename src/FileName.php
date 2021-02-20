<?php

namespace Salmanbe\FileName;

use Config;
use Str;
use File;

class FileName {

    /**
     * Function to store file name config options
     * @var array
     */
    private static $config;

    /**
     * Function to store file name options
     * @var array
     */
    private static $options;

    /**
     * Function initializes the file name generation process
     * @param string $filename
     * @param array $options
     * @return string
     */
    public static function get($filename, $options = []) {

        self::$config = Config::get('filename');
        self::$options = $options;

        $extention = '.' . File::extension($filename);

        $filename = Str::of($filename)->replace($extention, '');
        $filename = self::limit($filename);
        $filename .= self::timestamp();
        $filename = self::slugify($filename);
        $filename = self::separator($filename);
        $filename .= Str::lower($extention);
        $filename = self::uppercase($filename);

        return $filename;
    }

    /**
     * Function limits number of characters in file name
     * @param string $filename
     * @return string $filename
     */
    private static function limit($filename) {

        if (!isset(self::$config['limit']) && !isset(self::$options['limit'])) {
            return Str::limit($filename, 240);
        }

        if (isset(self::$options['limit'])) {
            return Str::limit($filename, self::$options['limit']);
        }

        if (isset(self::$config['limit'])) {
            return Str::limit($filename, self::$config['limit']);
        }

        return $filename;
    }

    /**
     * Function sets time stamp at the end of file name
     * @param boolean $timestamp
     * @return string
     */
    private static function timestamp() {

        if (!isset(self::$config['timestamp']) && !isset(self::$options['timestamp'])) {
            return ' ' . date('YmdHis');
        }

        if (isset(self::$options['timestamp'])) {
            return ' ' . date(self::$options['timestamp']);
        }

        if (isset(self::$config['timestamp'])) {

            if (self::$config['timestamp']) {
                return ' ' . date(self::$config['timestamp']);
            }
        }

        return null;
    }

    /**
     * Function slugify the file name
     * @param string $filename
     * @return string $filename
     */
    private static function slugify($filename) {

        if (!isset(self::$config['slugify']) && !isset(self::$options['slugify'])) {
            return Str::slug($filename);
        }

        if (isset(self::$options['slugify'])) {
            return Str::slug($filename);
        }

        if (isset(self::$config['slugify'])) {
            return self::$config['slugify'] ? Str::slug($filename) : $filename;
        }

        return $filename;
    }

    /**
     * Function adds separator between file name words
     * @param string $filename
     * @return string $filename
     */
    private static function separator($filename) {

        if (!isset(self::$config['separator']) && !isset(self::$options['separator'])) {
            return $filename;
        }

        if (isset(self::$options['separator'])) {
            return Str::of($filename)->replace('-', self::$options['separator']);
        }

        if (isset(self::$config['separator'])) {
            return Str::of($filename)->replace('-', self::$config['separator']);
        }

        return $filename;
    }

    /**
     * Function converts file name into upper case
     * @param string $filename
     * @return string $filename
     */
    private static function uppercase($filename) {

        if (!isset(self::$config['uppercase']) && !isset(self::$options['uppercase'])) {
            return $filename;
        }

        if (isset(self::$options['uppercase'])) {
            return Str::upper($filename);
        }

        if (isset(self::$config['uppercase'])) {
            return self::$config['uppercase'] ? Str::upper($filename) : $filename;
        }

        return $filename;
    }

}
