Identity forgotten
==================

Installation
------------

```sh
$ composer require geniv/nette-identity-forgotten
```
or
```json
"geniv/nette-identity-forgotten": ">=1.0.0"
```

require:
```json
"php": ">=7.0.0",
"nette/nette": ">=2.4.0",
"geniv/nette-general-form": ">=1.0.0"
```

Include in application
----------------------

neon configure:
```neon
# identity forgotten
identityForgotten:
#   autowired: true
#   formContainerStep1: Identity\Registration\FormContainerStep1
#   formContainerStep2: Identity\Registration\FormContainerStep2
    eventsStep1:
        - Identity\Events\ForgottenStep1Event(+1 hour, //Forgotten:reset)       # generate forgotten link
        - Identity\Events\ForgottenEmailNotifyEvent                             # email for user
    eventsStep2:
        - Identity\Events\ForgottenStep2Event
```

neon configure extension:
```neon
extensions:
    identityForgotten: Identity\Forgotten\Bridges\Nette\Extension
```

presenter usage:
```php
protected function createComponentIdentityForgottenStep1(ForgottenFormStep1 $forgottenFormStep1, ForgottenEmailNotifyEvent $emailNotifyEvent): ForgottenFormStep1
{
    $forgottenFormStep1->onSuccess[] = function (array $values) {
        $this->flashMessage('Step1!', 'info');
        $this->redirect('this');
    };
    $forgottenFormStep1->onException[] = function (EventException $e) {
        $this->flashMessage('Step1 exception! ' . $e->getMessage(), 'danger');
        $this->redirect('this');
    };
    return $forgottenFormStep1;
}

protected function createComponentIdentityForgottenStep2(ForgottenFormStep2 $forgottenFormStep2): ForgottenFormStep2
{
    $forgottenFormStep2->onSuccess[] = function (array $values) {
        $this->flashMessage('Step2!', 'info');
        $this->redirect('Login:');
    };
    $forgottenFormStep2->onException[] = function (EventException $e) {
        $this->flashMessage('Step2 exception! ' . $e->getMessage(), 'danger');
        $this->redirect('this');
    };
    return $forgottenFormStep2;
}
```

latte usage:
```latte
{control identityForgottenStep1}

{control identityForgottenStep2}
```
