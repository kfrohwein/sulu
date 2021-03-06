<?php

/*
 * This file is part of Sulu.
 *
 * (c) Sulu GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\MediaBundle\Media\FormatCache;

/**
 * Defines the operations of the FormatCache
 * The FormatCache is a interface to cache different Image Formats.
 */
interface FormatCacheInterface
{
    /**
     * Save image and return the url to the image.
     *
     * @param string $content
     * @param int $id
     * @param string $fileName
     * @param string $format
     *
     * @return bool
     */
    public function save($content, $id, $fileName, $format);

    /**
     * Delete the image by the given parameters.
     *
     * @param int $id
     * @param string $fileName
     * @param string $format
     *
     * @return bool
     */
    public function purge($id, $fileName, $format);

    /**
     * Return the url to an specific format of an media.
     *
     * @param int $id
     * @param string $fileName
     * @param string $format
     * @param int $version
     * @param int $subVersion
     *
     * @return string
     */
    public function getMediaUrl($id, $fileName, $format, $version, $subVersion);

    /**
     * Return the id and the format of a media.
     *
     * @param string $url
     *
     * @return array ($id, $format)
     */
    public function analyzedMediaUrl($url);

    /**
     * Clears the format cache.
     */
    public function clear();
}
