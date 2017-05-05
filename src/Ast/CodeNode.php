<?php
/**
 * This file is part of Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Karma\Platform\Ast;

/**
 * Class CodeNode
 * @package Karma\Platform\Ast
 */
class CodeNode extends TextNode
{
    /**
     * Language is not defined
     */
    protected const LANGUAGE_GENERIC = 'generic';

    /**
     * @var string
     */
    private $language;

    /**
     * CodeNode constructor.
     * @param string $body
     * @param null|string $language
     */
    public function __construct(string $body, ?string $language)
    {
        $this->language = $language ?: static::LANGUAGE_GENERIC;

        parent::__construct($body);
    }

    /**
     * @return bool
     */
    public function isGeneric(): bool
    {
        return $this->language === static::LANGUAGE_GENERIC;
    }
}
