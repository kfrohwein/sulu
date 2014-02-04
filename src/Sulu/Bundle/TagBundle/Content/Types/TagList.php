<?php
/*
 * This file is part of the Sulu CMS.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\TagBundle\Content\Types;

use PHPCR\NodeInterface;
use Sulu\Bundle\TagBundle\Tag\TagManagerInterface;
use Sulu\Component\Content\ComplexContentType;
use Sulu\Component\Content\ContentTypeInterface;
use Sulu\Component\Content\PropertyInterface;

/**
 * Content Type for the TagList, uses the TagManager-Service and the AutoCompleteList from Husky
 * @package Sulu\Bundle\TagBundle\Content\Types
 */
class TagList extends ComplexContentType
{
    /**
     * Responsible for saving the tags in the database
     * @var TagManagerInterface
     */
    private $tagManager;

    /**
     * Holds the template for rendering this content type in the admin
     * @var string
     */
    private $template;

    public function __construct(TagManagerInterface $tagManager, $template)
    {
        $this->tagManager = $tagManager;
        $this->template = $template;
    }

    /**
     * returns type of ContentType
     * PRE_SAVE or POST_SAVE
     * @return int
     */
    public function getType()
    {
        return ContentTypeInterface::PRE_SAVE;
    }

    /**
     * reads the value for given property from the node + sets the value of the property
     * @param NodeInterface $node
     * @param PropertyInterface $property
     * @param string $webspaceKey
     * @return mixed
     */
    public function get(NodeInterface $node, PropertyInterface $property, $webspaceKey)
    {
        $tags = array();

        if ($node->hasProperty($property->getName())) {
            $tagIds = $node->getPropertyValue($property->getName());
            foreach ($tagIds as $tagId) {
                $tags[] = $this->tagManager->findById($tagId)->getName();
            }
        }

        $property->setValue($tags);
    }

    /**
     * save the value from given property
     * @param NodeInterface $node
     * @param PropertyInterface $property
     * @param string $webspaceKey
     * @return mixed
     */
    public function set(NodeInterface $node, PropertyInterface $property, $webspaceKey)
    {
        $tagIds = array();

        foreach ($property->getValue() as $tag) {
            $tagIds[] = $this->tagManager->findOrCreateByName($tag)->getId();
        }

        $node->setProperty($property->getName(), $tagIds);
    }

    /**
     * remove property from given node
     * @param NodeInterface $node
     * @param PropertyInterface $property
     */
    public function remove(NodeInterface $node, PropertyInterface $property)
    {
        // TODO: Implement remove() method.
    }

    /**
     * returns a template to render a form
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }
}
