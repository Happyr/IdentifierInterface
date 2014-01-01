# HappyR Identifier Interface

This "library" is not much. It is just one interface. The interface makes sure you have a public function called
''getId()''.

Say that you are writing AcmeMessageBundle with a Message entity. Each Message should have a relation to a User. You
could write something like this:

````php

class Message
{
  private $user;

  /* ... */

  public function setUser(IdentifierInterface $user)
  {
    $this->user = $user;
  }

  /* ... */
}

class MessageSenderService
{
  /* ... */
  public function send(Message $message, IdentifierInterface $recipient)
  {
     if ($message->getUser()->getId() == $recipient->getId()) {
        throw new \Exception("You can not send a message to yourself.");
     }

     /* ... */
  }
}

````

You could of course ship your own IdentifierInterface with your AcmeMessageBundle but after a while you will notice that
your User entity implements too many interfaces...

````php
class User implements SymfonyUserInterface, AcmeMessageBundleIdInterface, OtherBundleInterface, AcmeDemoBundleUserInterface, CompanyBundleIdentifierInterface, MyIndentifierInterface
{
  /* ... */
}
````

When we create ''Symfony2'' bundles we will always use the HappyR Identifier Interface for both public and interal work.