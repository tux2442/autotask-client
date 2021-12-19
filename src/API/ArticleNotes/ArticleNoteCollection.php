<?php

namespace Anteris\Autotask\API\ArticleNotes;

use GuzzleHttp\Psr7\Response;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Contains a collection of ArticleNote entities.
 * @see ArticleNoteEntity
 */
class ArticleNoteCollection extends DataTransferObjectCollection
{
    /**
     * Sets the proper return type for IDE completion.
     */
    public function current(): ArticleNoteEntity
    {
        return parent::current();
    }

    /**
     * Sets the proper return type for IDE completion.
     */
    public function offsetGet($offset): ArticleNoteEntity
    {
        return parent::offsetGet($offset);
    }

    /**
     * Creates an instance of this class from an Http response.
     *
     * @param  Response  $response  Http response.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public static function fromResponse(Response $response): ArticleNoteCollection
    {
        $array = json_decode($response->getBody(), true);

        if (isset($array['items']) === false) {
            throw new \Exception('Missing items key in response.');
        }

        return new static(
            ArticleNoteEntity::arrayOf($array['items'])
        );
    }
}
