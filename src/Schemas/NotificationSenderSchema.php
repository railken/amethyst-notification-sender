<?php

namespace Amethyst\Schemas;

use Amethyst\Managers\DataBuilderManager;
use Railken\Lem\Attributes;
use Railken\Lem\Schema;

class NotificationSenderSchema extends Schema
{
    /**
     * Get all the attributes.
     *
     * @var array
     */
    public function getAttributes()
    {
        return [
            Attributes\IdAttribute::make(),
            Attributes\TextAttribute::make('name')
                ->setRequired(true)
                ->setUnique(true),
            Attributes\LongTextAttribute::make('description'),
            Attributes\TextAttribute::make('title'),
            Attributes\LongTextAttribute::make('message'),
            Attributes\YamlAttribute::make('targets')
                ->setRequired(true),
            Attributes\YamlAttribute::make('options'),
            Attributes\BelongsToAttribute::make('data_builder_id')
                ->setRelationName('data_builder')
                ->setRelationManager(DataBuilderManager::class),
            Attributes\CreatedAtAttribute::make(),
            Attributes\UpdatedAtAttribute::make(),
            Attributes\DeletedAtAttribute::make(),
        ];
    }
}
