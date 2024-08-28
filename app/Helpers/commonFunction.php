<?php
if (!function_exists('getYoutubeEmbedUrl')) {
    function getYoutubeEmbedUrl($url)
    {
        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
        $videoId = $matches[1] ?? null;
        if ($videoId) {
            return "https://www.youtube.com/embed/$videoId";
        }
        return null;
    }
}

if (! function_exists('getImageUrl')) {
    function getImageUrl($image)
    {
        if (!$image) return null;
        $storage = app('firebase.storage');
        $defaultBucket = $storage->getBucket();
        return $defaultBucket->object($image)->signedUrl(now()->addHours(5));
    }
}
