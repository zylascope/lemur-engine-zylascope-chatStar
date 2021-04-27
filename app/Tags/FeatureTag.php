<?php
/**
 * Created by PhpStorm.
 * User: maczilla
 * Date: 08/04/16
 * Time: 17:06
 *
 * When a random tag is encounted it is assumed that it will contain <li>options</li> inside
 * This class will create a randomly named array upon option
 * store the encounted <li>values</li>
 * and select an item when closed
 *
 *
 *
 */
namespace App\Tags;

use App\Classes\LemurLog;
use App\Classes\LemurStr;
use ProgramO\V3\DB;
use Illuminate\Support\Facades\Log;
use App\Tags\AimlTag;
use App\Models\Conversation;

class FeatureTag extends AimlTag
{
    protected $tagName = "Feature";

    /**
     * FeatureTag Constructor.
     * @param Conversation $conversation
     * @param $attributes
     */
    public function __construct(Conversation $conversation, $attributes = [])
    {
        parent::__construct($conversation, $attributes);
    }


    /**
     */
    public function closeTag()
    {


        LemurLog::debug(
            __FUNCTION__,
            [
                'conversation_id'=>$this->conversation->id,
                'turn_id'=>$this->conversation->currentTurnId(),
                'tag_id'=>$this->getTagId(),
                'attributes'=>$this->getAttributes()
            ]
        );

        $contents = $this->getCurrentTagContents(true);

        if ($this->hasAttribute('NAME')) {
            $name = $this->getAttribute('NAME');
            $this->conversation->setFeature($name, $contents);
        }
    }
}
