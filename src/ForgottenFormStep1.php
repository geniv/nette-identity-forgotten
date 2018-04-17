<?php declare(strict_types=1);

namespace Identity\Forgotten;

use GeneralForm\GeneralControl;
use GeneralForm\IFormContainer;
use Nette\Localization\ITranslator;


/**
 * Class ForgottenFormStep1
 *
 * @author  geniv
 * @package Identity\Forgotten
 */
class ForgottenFormStep1 extends GeneralControl
{

    /**
     * ForgottenFormStep1 constructor.
     *
     * @param IFormContainer   $formContainer
     * @param array            $events
     * @param ITranslator|null $translator
     */
    public function __construct(IFormContainer $formContainer, array $events, ITranslator $translator = null)
    {
        parent::__construct($formContainer, $events, $translator);

        $this->templatePath = __DIR__ . '/ForgottenFormStep1.latte';    // set path
    }
}
